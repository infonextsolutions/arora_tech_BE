this.polyfill = this.polyfill || {};
(function () {
	'use strict';

	var commonjsGlobal = typeof window !== 'undefined' ? window : typeof global !== 'undefined' ? global : typeof self !== 'undefined' ? self : {};

	function createCommonjsModule(fn, module) {
		return module = { exports: {} }, fn(module, module.exports), module.exports;
	}

	var focusVisible = createCommonjsModule(function (module, exports) {
	  (function (global, factory) {
	    factory();
	  })(commonjsGlobal, function () {

	    /**
	     * https://github.com/WICG/focus-visible
	     */

	    function init() {
	      var hadKeyboardEvent = true;
	      var hadFocusVisibleRecently = false;
	      var hadFocusVisibleRecentlyTimeout = null;

	      var inputTypesWhitelist = {
	        text: true,
	        search: true,
	        url: true,
	        tel: true,
	        email: true,
	        password: true,
	        number: true,
	        date: true,
	        month: true,
	        week: true,
	        time: true,
	        datetime: true,
	        'datetime-local': true
	      };

	      /**
	       * Helper function for legacy browsers and iframes which sometimes focus
	       * elements like document, body, and non-interactive SVG.
	       * @param {Element} el
	       */
	      function isValidFocusTarget(el) {
	        if (el && el !== document && el.nodeName !== 'HTML' && el.nodeName !== 'BODY' && 'classList' in el && 'contains' in el.classList) {
	          return true;
	        }
	        return false;
	      }

	      /**
	       * Computes whether the given element should automatically trigger the
	       * `focus-visible` class being added, i.e. whether it should always match
	       * `:focus-visible` when focused.
	       * @param {Element} el
	       * @return {boolean}
	       */
	      function focusTriggersKeyboardModality(el) {
	        var type = el.type;
	        var tagName = el.tagName;

	        if (tagName == 'INPUT' && inputTypesWhitelist[type] && !el.readOnly) {
	          return true;
	        }

	        if (tagName == 'TEXTAREA' && !el.readOnly) {
	          return true;
	        }

	        if (el.isContentEditable) {
	          return true;
	        }

	        return false;
	      }

	      /**
	       * Add the `focus-visible` class to the given element if it was not added by
	       * the author.
	       * @param {Element} el
	       */
	      function addFocusVisibleClass(el) {
	        if (el.classList.contains('focus-visible')) {
	          return;
	        }
	        el.classList.add('focus-visible');
	        el.setAttribute('data-focus-visible-added', '');
	      }

	      /**
	       * Remove the `focus-visible` class from the given element if it was not
	       * originally added by the author.
	       * @param {Element} el
	       */
	      function removeFocusVisibleClass(el) {
	        if (!el.hasAttribute('data-focus-visible-added')) {
	          return;
	        }
	        el.classList.remove('focus-visible');
	        el.removeAttribute('data-focus-visible-added');
	      }

	      /**
	       * Treat `keydown` as a signal that the user is in keyboard modality.
	       * Apply `focus-visible` to any current active element and keep track
	       * of our keyboard modality state with `hadKeyboardEvent`.
	       * @param {Event} e
	       */
	      function onKeyDown(e) {
	        if (isValidFocusTarget(document.activeElement)) {
	          addFocusVisibleClass(document.activeElement);
	        }

	        hadKeyboardEvent = true;
	      }

	      /**
	       * If at any point a user clicks with a pointing device, ensure that we change
	       * the modality away from keyboard.
	       * This avoids the situation where a user presses a key on an already focused
	       * element, and then clicks on a different element, focusing it with a
	       * pointing device, while we still think we're in keyboard modality.
	       * @param {Event} e
	       */
	      function onPointerDown(e) {
	        hadKeyboardEvent = false;
	      }

	      /**
	       * On `focus`, add the `focus-visible` class to the target if:
	       * - the target received focus as a result of keyboard navigation, or
	       * - the event target is an element that will likely require interaction
	       *   via the keyboard (e.g. a text box)
	       * @param {Event} e
	       */
	      function onFocus(e) {
	        // Prevent IE from focusing the document or HTML element.
	        if (!isValidFocusTarget(e.target)) {
	          return;
	        }

	        if (hadKeyboardEvent || focusTriggersKeyboardModality(e.target)) {
	          addFocusVisibleClass(e.target);
	        }
	      }

	      /**
	       * On `blur`, remove the `focus-visible` class from the target.
	       * @param {Event} e
	       */
	      function onBlur(e) {
	        if (!isValidFocusTarget(e.target)) {
	          return;
	        }

	        if (e.target.classList.contains('focus-visible') || e.target.hasAttribute('data-focus-visible-added')) {
	          // To detect a tab/window switch, we look for a blur event followed
	          // rapidly by a visibility change.
	          // If we don't see a visibility change within 100ms, it's probably a
	          // regular focus change.
	          hadFocusVisibleRecently = true;
	          window.clearTimeout(hadFocusVisibleRecentlyTimeout);
	          hadFocusVisibleRecentlyTimeout = window.setTimeout(function () {
	            hadFocusVisibleRecently = false;
	            window.clearTimeout(hadFocusVisibleRecentlyTimeout);
	          }, 100);
	          removeFocusVisibleClass(e.target);
	        }
	      }

	      /**
	       * If the user changes tabs, keep track of whether or not the previously
	       * focused element had .focus-visible.
	       * @param {Event} e
	       */
	      function onVisibilityChange(e) {
	        if (document.visibilityState == 'hidden') {
	          // If the tab becomes active again, the browser will handle calling focus
	          // on the element (Safari actually calls it twice).
	          // If this tab change caused a blur on an element with focus-visible,
	          // re-apply the class when the user switches back to the tab.
	          if (hadFocusVisibleRecently) {
	            hadKeyboardEvent = true;
	          }
	          addInitialPointerMoveListeners();
	        }
	      }

	      /**
	       * Add a group of listeners to detect usage of any pointing devices.
	       * These listeners will be added when the polyfill first loads, and anytime
	       * the window is blurred, so that they are active when the window regains
	       * focus.
	       */
	      function addInitialPointerMoveListeners() {
	        document.addEventListener('mousemove', onInitialPointerMove);
	        document.addEventListener('mousedown', onInitialPointerMove);
	        document.addEventListener('mouseup', onInitialPointerMove);
	        document.addEventListener('pointermove', onInitialPointerMove);
	        document.addEventListener('pointerdown', onInitialPointerMove);
	        document.addEventListener('pointerup', onInitialPointerMove);
	        document.addEventListener('touchmove', onInitialPointerMove);
	        document.addEventListener('touchstart', onInitialPointerMove);
	        document.addEventListener('touchend', onInitialPointerMove);
	      }

	      function removeInitialPointerMoveListeners() {
	        document.removeEventListener('mousemove', onInitialPointerMove);
	        document.removeEventListener('mousedown', onInitialPointerMove);
	        document.removeEventListener('mouseup', onInitialPointerMove);
	        document.removeEventListener('pointermove', onInitialPointerMove);
	        document.removeEventListener('pointerdown', onInitialPointerMove);
	        document.removeEventListener('pointerup', onInitialPointerMove);
	        document.removeEventListener('touchmove', onInitialPointerMove);
	        document.removeEventListener('touchstart', onInitialPointerMove);
	        document.removeEventListener('touchend', onInitialPointerMove);
	      }

	      /**
	       * When the polfyill first loads, assume the user is in keyboard modality.
	       * If any event is received from a pointing device (e.g. mouse, pointer,
	       * touch), turn off keyboard modality.
	       * This accounts for situations where focus enters the page from the URL bar.
	       * @param {Event} e
	       */
	      function onInitialPointerMove(e) {
	        // Work around a Safari quirk that fires a mousemove on <html> whenever the
	        // window blurs, even if you're tabbing out of the page. ¯\_(ツ)_/¯
	        if (e.target.nodeName.toLowerCase() === 'html') {
	          return;
	        }

	        hadKeyboardEvent = false;
	        removeInitialPointerMoveListeners();
	      }

	      document.addEventListener('keydown', onKeyDown, true);
	      document.addEventListener('mousedown', onPointerDown, true);
	      document.addEventListener('pointerdown', onPointerDown, true);
	      document.addEventListener('touchstart', onPointerDown, true);
	      document.addEventListener('focus', onFocus, true);
	      document.addEventListener('blur', onBlur, true);
	      document.addEventListener('visibilitychange', onVisibilityChange, true);
	      addInitialPointerMoveListeners();

	      document.body.classList.add('js-focus-visible');
	    }

	    /**
	     * Subscription when the DOM is ready
	     * @param {Function} callback
	     */
	    function onDOMReady(callback) {
	      var loaded;

	      /**
	       * Callback wrapper for check loaded state
	       */
	      function load() {
	        if (!loaded) {
	          loaded = true;

	          callback();
	        }
	      }

	      if (['interactive', 'complete'].indexOf(document.readyState) >= 0) {
	        callback();
	      } else {
	        loaded = false;
	        document.addEventListener('DOMContentLoaded', load, false);
	        window.addEventListener('load', load, false);
	      }
	    }

	    if (typeof document !== 'undefined') {
	      onDOMReady(init);
	    }
	  });
	});

	var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) {
	  return typeof obj;
	} : function (obj) {
	  return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
	};

	!function () {
	  if ("undefined" != typeof window) {
	    var t = window.navigator.userAgent.match(/Edge\/(\d{2})\./),
	        n = !!t && 16 <= parseInt(t[1], 10);if (!("objectFit" in document.documentElement.style != !1) || n) {
	      var o = function o(t, e, i) {
	        var n, o, l, a, d;if ((i = i.split(" ")).length < 2 && (i[1] = i[0]), "x" === t) n = i[0], o = i[1], l = "left", a = "right", d = e.clientWidth;else {
	          if ("y" !== t) return;n = i[1], o = i[0], l = "top", a = "bottom", d = e.clientHeight;
	        }if (n !== l && o !== l) {
	          if (n !== a && o !== a) return "center" === n || "50%" === n ? (e.style[l] = "50%", void (e.style["margin-" + l] = d / -2 + "px")) : void (0 <= n.indexOf("%") ? (n = parseInt(n)) < 50 ? (e.style[l] = n + "%", e.style["margin-" + l] = d * (n / -100) + "px") : (n = 100 - n, e.style[a] = n + "%", e.style["margin-" + a] = d * (n / -100) + "px") : e.style[l] = n);e.style[a] = "0";
	        } else e.style[l] = "0";
	      },
	          l = function l(t) {
	        var e = t.dataset ? t.dataset.objectFit : t.getAttribute("data-object-fit"),
	            i = t.dataset ? t.dataset.objectPosition : t.getAttribute("data-object-position");e = e || "cover", i = i || "50% 50%";var n = t.parentNode;return function (t) {
	          var e = window.getComputedStyle(t, null),
	              i = e.getPropertyValue("position"),
	              n = e.getPropertyValue("overflow"),
	              o = e.getPropertyValue("display");i && "static" !== i || (t.style.position = "relative"), "hidden" !== n && (t.style.overflow = "hidden"), o && "inline" !== o || (t.style.display = "block"), 0 === t.clientHeight && (t.style.height = "100%"), -1 === t.className.indexOf("object-fit-polyfill") && (t.className = t.className + " object-fit-polyfill");
	        }(n), function (t) {
	          var e = window.getComputedStyle(t, null),
	              i = { "max-width": "none", "max-height": "none", "min-width": "0px", "min-height": "0px", top: "auto", right: "auto", bottom: "auto", left: "auto", "margin-top": "0px", "margin-right": "0px", "margin-bottom": "0px", "margin-left": "0px" };for (var n in i) {
	            e.getPropertyValue(n) !== i[n] && (t.style[n] = i[n]);
	          }
	        }(t), t.style.position = "absolute", t.style.width = "auto", t.style.height = "auto", "scale-down" === e && (e = t.clientWidth < n.clientWidth && t.clientHeight < n.clientHeight ? "none" : "contain"), "none" === e ? (o("x", t, i), void o("y", t, i)) : "fill" === e ? (t.style.width = "100%", t.style.height = "100%", o("x", t, i), void o("y", t, i)) : (t.style.height = "100%", void ("cover" === e && t.clientWidth > n.clientWidth || "contain" === e && t.clientWidth < n.clientWidth ? (t.style.top = "0", t.style.marginTop = "0", o("x", t, i)) : (t.style.width = "100%", t.style.height = "auto", t.style.left = "0", t.style.marginLeft = "0", o("y", t, i))));
	      },
	          e = function e(t) {
	        if (void 0 === t || t instanceof Event) t = document.querySelectorAll("[data-object-fit]");else if (t && t.nodeName) t = [t];else {
	          if ("object" != (typeof t === "undefined" ? "undefined" : _typeof(t)) || !t.length || !t[0].nodeName) return !1;t = t;
	        }for (var e = 0; e < t.length; e++) {
	          if (t[e].nodeName) {
	            var i = t[e].nodeName.toLowerCase();if ("img" === i) {
	              if (n) continue;t[e].complete ? l(t[e]) : t[e].addEventListener("load", function () {
	                l(this);
	              });
	            } else "video" === i ? 0 < t[e].readyState ? l(t[e]) : t[e].addEventListener("loadedmetadata", function () {
	              l(this);
	            }) : l(t[e]);
	          }
	        }return !0;
	      };"loading" === document.readyState ? document.addEventListener("DOMContentLoaded", e) : e(), window.addEventListener("resize", e), window.objectFitPolyfill = e;
	    } else window.objectFitPolyfill = function () {
	      return !1;
	    };
	  }
	}();

	window.NodeList && !NodeList.prototype.forEach && (NodeList.prototype.forEach = function (o, t) {
	  t = t || window;for (var i = 0; i < this.length; i++) {
	    o.call(t, this[i], i, this);
	  }
	});

	!function () {
	  function t() {
	    var e = Array.prototype.slice.call(arguments),
	        n = document.createDocumentFragment();e.forEach(function (e) {
	      var t = e instanceof Node;n.appendChild(t ? e : document.createTextNode(String(e)));
	    }), this.insertBefore(n, this.firstChild);
	  }[Element.prototype, Document.prototype, DocumentFragment.prototype].forEach(function (e) {
	    e.hasOwnProperty("prepend") || Object.defineProperty(e, "prepend", { configurable: !0, enumerable: !0, writable: !0, value: t });
	  });
	}();

	!function () {
	  function t() {
	    var e = Array.prototype.slice.call(arguments),
	        n = document.createDocumentFragment();e.forEach(function (e) {
	      var t = e instanceof Node;n.appendChild(t ? e : document.createTextNode(String(e)));
	    }), this.appendChild(n);
	  }[Element.prototype, Document.prototype, DocumentFragment.prototype].forEach(function (e) {
	    e.hasOwnProperty("append") || Object.defineProperty(e, "append", { configurable: !0, enumerable: !0, writable: !0, value: t });
	  });
	}();

	Element.prototype.matches || (Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector), window.Element && !Element.prototype.closest && (Element.prototype.closest = function (e) {
	  var t = this;do {
	    if (t.matches(e)) return t;t = t.parentElement || t.parentNode;
	  } while (null !== t && 1 === t.nodeType);return null;
	});

	Element.prototype.matches || (Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector);

	String.prototype.includes || (String.prototype.includes = function (t, n) {
	  return "number" != typeof n && (n = 0), !(n + t.length > this.length) && -1 !== this.indexOf(t, n);
	});

	/**
	 * @file Component Polyfills.
	 */

}());

//# sourceMappingURL=polyfill.js.map
