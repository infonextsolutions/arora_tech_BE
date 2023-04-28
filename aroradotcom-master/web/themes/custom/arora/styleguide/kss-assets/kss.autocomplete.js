new autoComplete({
  selector: 'input[name="search"]',
  menuClass: 'kss-autocomplete__menu kss-style',
  minChars: 1,
  offsetTop: -1,
  source: function(term, suggest) {
    var choices = [];
    var items = document.getElementById('kss-toc').getElementsByTagName('li');
    Array.prototype.forEach.call(items, function(element, index) {
      var text = element.getAttribute('data-name');
      var href = element.getAttribute('data-url');
      choices.push([text, href]);
    });
    var matches = [];
    for (var i=0; i<choices.length; i++) {
      if (~choices[i][0].toLowerCase().indexOf(term)) matches.push(choices[i]);
    }
    suggest(matches);
  },
  renderItem: function (item, search) {
    search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
    var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
    return '<div class="autocomplete-suggestion kss-autocomplete__item"><a href="' + item[1] + '">' + item[0].replace(re, "<b>$1</b>") + '</a></div>';
  },
  onSelect: function (event, term, item) {
    document.querySelector('.autocomplete-suggestions').style.display = 'none';
    window.location.assign(item.firstChild.getAttribute('href'));
  }
});
