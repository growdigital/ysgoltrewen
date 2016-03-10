// Basic ajax from Jon Duckett JavaScript & JQuery
var xhr = new XMLHttpRequest();
xhr.onload = function() {
  if(xhr.status === 200) {
    document.getElementById('svg').innerHTML = xhr.responseText;
  }
};
xhr.open('GET', '/app/themes/cornerstone/dist/assets/img/symbols.svg', true);
xhr.send(null);
