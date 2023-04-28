var toggle = document.getElementById('kss-offscreen-toggle');
var backdrop = document.getElementById('kss-offscreen-item-backdrop');

var desktopWidth = 769;
var toggleOpen = true;

var toggleMenu = function () {
  if (toggleOpen) {
    closeMenu();
  }
  else {
    openMenu();
  }
  toggleOpen = !toggleOpen;
};

var openMenu = function () {
  document.body.classList.add('is-moved');
  toggle.classList.add('is-active');
  toggle.setAttribute('aria-expanded', 'true');
};

var closeMenu = function () {
  document.body.classList.remove('is-moved');
  toggle.classList.remove('is-active');
  toggle.setAttribute('aria-expanded', 'false');
};

if (window.innerWidth <= desktopWidth) {
  toggleOpen = true;
  toggleMenu();
}

toggle.addEventListener('click', function () {
  toggleMenu();
});

backdrop.addEventListener('click', function () {
  toggleMenu();
});
