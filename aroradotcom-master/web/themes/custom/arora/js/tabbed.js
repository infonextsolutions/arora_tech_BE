this.tabbed = this.tabbed || {};
this.tabbed.js = (function () {
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
   * Tabbed Component
   * @file ES6 component to handle vertical tabs component.
   */

  var Tabbed = function () {
    function Tabbed(el) {
      classCallCheck(this, Tabbed);

      this.element = el;
      this.tabList = this.element.querySelectorAll('.tabbed-menu ul li a');
      this.panels = this.element.querySelectorAll('.tabbed-item');
      this.menuClass = 'tabbed-menu';
      this.toggleClass = 'tabbed-toggle';
      this.activeClass = 'active';

      this.handleClick = this.handleClick.bind(this);
      this.handleToggle = this.handleToggle.bind(this);
      this.handleKeypress = this.handleKeypress.bind(this);
    }

    createClass(Tabbed, [{
      key: 'handleClick',
      value: function handleClick(e) {
        e.preventDefault();
        // Get the id from the href
        var id = e.currentTarget.getAttribute('href');
        // set the location
        window.location.hash = id;
        // Show the panel
        this.hidePanels();
        this.showPanel(id.replace('#', ''));
        // Set the active tab
        this.setAllInactiveTabs();
        this.setActiveTab(id);
        // Close mobile menu
        this.handleToggle();
      }
    }, {
      key: 'setTabListeners',
      value: function setTabListeners() {
        var _this = this;

        this.tabList.forEach(function (item) {
          item.addEventListener('click', _this.handleClick, false);
        });
      }
    }, {
      key: 'hidePanels',
      value: function hidePanels() {
        var _this2 = this;

        this.panels.forEach(function (panel) {
          panel.classList.remove(_this2.activeClass);
        });
      }
    }, {
      key: 'showPanel',
      value: function showPanel(id) {
        var panel = document.getElementById(id);
        panel.classList.add(this.activeClass);
      }
    }, {
      key: 'setActiveTab',
      value: function setActiveTab(id) {
        var tab = this.element.querySelector('[href="' + id + '"]');
        tab.classList.add(this.activeClass);
        this.toggle.innerText = tab.innerText;
      }
    }, {
      key: 'setAllInactiveTabs',
      value: function setAllInactiveTabs() {
        var _this3 = this;

        this.tabList.forEach(function (tab) {
          tab.classList.remove(_this3.activeClass);
        });
      }
    }, {
      key: 'createToggle',
      value: function createToggle() {
        this.toggle = document.createElement('button');
        this.toggle.setAttribute('class', this.toggleClass);
        this.toggle.innerText = this.tabList[0].innerText;
        this.element.appendChild(this.toggle);
        this.addToggleEvents();
        return this.toggle;
      }
    }, {
      key: 'handleToggle',
      value: function handleToggle() {
        var menu = this.element.querySelector('.' + this.menuClass);
        if (menu.classList.contains(this.activeClass)) {
          menu.classList.remove(this.activeClass);
        } else {
          menu.classList.add(this.activeClass);
        }
      }
    }, {
      key: 'handleKeypress',
      value: function handleKeypress(e) {
        switch (e.code) {
          case 'Tab':
            this.tabList[0].focus();
            break;
          default:
            break;
        }
      }
    }, {
      key: 'addToggleEvents',
      value: function addToggleEvents() {
        this.toggle.addEventListener('click', this.handleToggle);
        this.toggle.addEventListener('keydown', this.handleKeypress);
      }
    }, {
      key: 'init',
      value: function init() {
        this.setTabListeners();
        this.createToggle();
      }
    }]);
    return Tabbed;
  }();

  /**
   * Initialise for default class.
   */


  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.tabbed').forEach(function (obj) {
      var tabbedComponent = new Tabbed(obj);
      tabbedComponent.init();
    });
  });

  return Tabbed;

}());

//# sourceMappingURL=tabbed.js.map
