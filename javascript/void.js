window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("nav").style.height = "120px";
    document.getElementById("nav").style.background = "#000";
    document.getElementById("logo").style.width = "120px";
  } else {
    document.getElementById("nav").style.marginBottom = "15px";
    document.getElementById("nav").style.height = "90px";
    document.getElementById("nav").style.background = "#2c2f33";
    document.getElementById("logo").style.width = "40%";
  }
}


function equalize(sel) {

  var els = Array.prototype.slice.call(document.querySelectorAll(sel));  
  var row = [];
  var max;
  var top;
  
  function setHeights() {
    row.forEach(function(e) {
      e.style.height = max + 'px';
    });
  }

  for (var i=0; i < els.length; i++) {
    var el = els[i];
    el.style.height = 'auto';
    if (el.offsetTop !== top) {
      // new row detected
      setHeights();
      top = el.offsetTop;      
      max = 0;
      row = [];
    }
    row.push(el);
    max = Math.max(max, el.offsetHeight);
  }
  setHeights(); // last row
}

// you might want to use addEventListener instead!
window.onload = window.onresize = function() {
  equalize('.card-container > *');
};