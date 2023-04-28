this.navigation = this.navigation || {};
this.navigation.js = (function () {
  'use strict';

  var classCallCheck = function (instance, Constructor) {
    if (!(instance instanceof Constructor)) {
      throw new TypeError("Cannot call a class as a function");
    }
  };

  var createClass = function () {
    function defineProperties(target, props) {
      for (var i = 0; i < props.length; i++) {
        var descriptor = props[i];
        descriptor.enumerable = descriptor.enumerable || false;
        descriptor.configurable = true;
        if ("value" in descriptor) descriptor.writable = true;
        Object.defineProperty(target, descriptor.key, descriptor);
      }
    }

    return function (Constructor, protoProps, staticProps) {
      if (protoProps) defineProperties(Constructor.prototype, protoProps);
      if (staticProps) defineProperties(Constructor, staticProps);
      return Constructor;
    };
  }();

  /**
   * Navigation
   * @file Drop down navigation handler.
   */

  var Navigation = function () {
    function Navigation(nav, navClass) {
      classCallCheck(this, Navigation);

      this.nav = nav;
      this.navClass = navClass;
      this.openModifier = this.navClass + '--open';
      this.levelOpenModifier = this.navClass + '-level--open';
      this.level2Class = this.navClass + '-level-2';
      this.level2ClassRev = this.navClass + '-level-2--reverse';
      this.level3Class = this.navClass + '-level-3';
      this.level3ClassRev = this.navClass + '-level-3--reverse';
      this.subNavClass = this.navClass + '-has-subnav';
      this.subToggleClass = this.navClass + '-sub-toggle';
      this.activeClass = 'is-active-menu';

      this.init = this.init.bind(this);
      this.handleToggle = this.handleToggle.bind(this);
      this.setOrientation = this.setOrientation.bind(this);
      this.handleKeyPress = this.handleKeyPress.bind(this);
    }

    createClass(Navigation, [{
      key: 'init',
      value: function init() {
        var _this = this;

        var subNavItems = this.nav.querySelectorAll('.' + this.subNavClass);
        var subNavLinks = this.nav.querySelectorAll('.' + this.subNavClass + ' > a');
        var navLinks = this.nav.querySelectorAll('li > a');
        var subNavToggles = this.nav.querySelectorAll('.' + this.subToggleClass);
        var activeMenu = this.nav.querySelectorAll('.' + this.activeClass);

        subNavItems.forEach(function (item) {
          if (_this.navClass !== 'nav-sidebar') {
            if (window.innerWidth >= 768) {
              item.addEventListener('mouseenter', _this.handleToggle);
              item.addEventListener('mouseleave', _this.handleToggle);
            }
            _this.setOrientation(item);
          }
        });

        subNavLinks.forEach(function (item) {
          if (_this.navClass !== 'nav-sidebar') {
            item.addEventListener('touchend', _this.handleToggle);
          }
        });

        navLinks.forEach(function (item) {
          item.addEventListener('keydown', _this.handleKeyPress);
        });

        subNavToggles.forEach(function (item) {
          item.addEventListener('click', _this.handleToggle);
        });

        if (this.navClass === 'nav-sidebar') {
          activeMenu.forEach(function (item) {
            var submenu = item.querySelector('ul');
            if (submenu) {
              _this.openLevel(submenu, item);
            }
          });
        }
      }
    }, {
      key: 'handleToggle',
      value: function handleToggle(event) {
        var menuItem = event.target;
        if (menuItem.tagName !== 'LI') {
          menuItem = menuItem.parentElement;
        }
        var subNav = menuItem.querySelector('ul');

        if (subNav.classList.contains(this.openModifier)) {
          this.closeLevel(subNav, menuItem);
        } else {
          if (event.type === 'touchend') {
            event.preventDefault();
          }
          this.openLevel(subNav, menuItem);
        }
      }
    }, {
      key: 'openLevel',
      value: function openLevel(subNav, menuItem) {
        subNav.classList.add(this.openModifier);
        menuItem.classList.add(this.levelOpenModifier);
        if (this.navClass === 'nav-sidebar') {
          menuItem.querySelector('button').setAttribute('aria-expanded', 'true');
        } else {
          menuItem.querySelector('a').setAttribute('aria-expanded', 'true');
        }
      }
    }, {
      key: 'closeLevel',
      value: function closeLevel(subNav, menuItem) {
        subNav.classList.remove(this.openModifier);
        this.setOrientation(menuItem);
        menuItem.classList.remove(this.levelOpenModifier);
        if (this.navClass === 'nav-sidebar') {
          menuItem.querySelector('button').setAttribute('aria-expanded', 'false');
        } else {
          menuItem.querySelector('a').setAttribute('aria-expanded', 'false');
        }
      }
    }, {
      key: 'setOrientation',
      value: function setOrientation(item) {
        var subNav = item.querySelector('.' + this.level2Class);
        var reverseClass = this.level2ClassRev;
        if (!subNav) {
          subNav = item.querySelector('.' + this.level3Class);
          reverseClass = this.level3ClassRev;
        }
        var subNavRight = subNav.getBoundingClientRect().right;
        if (window.innerWidth < subNavRight) {
          subNav.classList.add(reverseClass);
        }
      }
    }, {
      key: 'handleKeyPress',
      value: function handleKeyPress(event) {
        var parent = event.currentTarget.parentNode;
        var nav = parent.parentNode;

        if (parent === nav.firstElementChild) {
          // If we shift tab past the first child, toggle this level.
          if (event.key === 'Tab' && event.shiftKey === true) {
            this.closeLevel(nav, nav.parentNode);
          }
        } else if (parent === nav.lastElementChild) {
          // If we tab past the last child, toggle this level.
          if (event.key === 'Tab' && event.shiftKey === false) {
            this.closeLevel(nav, nav.parentNode);
          }
        }

        // Toggle nav on Space (32) or any Arrow key (37-40).
        switch (event.keyCode) {
          case 32:
          case 37:
          case 38:
          case 39:
          case 40:
            event.preventDefault();
            this.handleToggle(event);
            break;
          default:
            break;
        }
      }
    }]);
    return Navigation;
  }();

  /**
   * Initialise for default classes.
   */


  document.addEventListener('DOMContentLoaded', function () {
    // Activate the main navigation.
    document.querySelectorAll('.nav-main').forEach(function (obj) {
      var mainNavigation = new Navigation(obj, 'nav-main');
      mainNavigation.init();
    });

    // Activate the sidebar navigation.
    document.querySelectorAll('.nav-sidebar').forEach(function (obj) {
      var sidebarNavigation = new Navigation(obj, 'nav-sidebar');
      sidebarNavigation.init();
    });
  });

  return Navigation;

}());

//# sourceMappingURL=navigation.js.map
