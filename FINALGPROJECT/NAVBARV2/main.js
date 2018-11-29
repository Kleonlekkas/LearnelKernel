function menuHider() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
        x.className = x.className + " responsive";
    } else {
        x.className = "topnav";
  }
}

// changes image
function change(el, img) {
	el.src = img;
}

