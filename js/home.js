var app = $.getElementById("app");

var typewriter = new Typewriter(app, {
  loop: true,
  delay: 75,
});

typewriter
  .pauseFor(2500)
  .typeString("نوشته")
  .pauseFor(300)
  .deleteChars(10)
  .typeString("يادداشت")
  .deleteChars(17)
  .typeString("يادداشت هاي افسانه اي")
  .pauseFor(1000)
  .start();

setInterval(() => {
  if ($.documentElement.scrollTop <= 12) {
    $.getElementById("nav").style.position = "relative";
  } else {
    $.getElementById("nav").style.position = "fixed";
    $.getElementById("nav").style.top = "0px";
  }
});

$.addEventListener("DOMContentLoaded", () => {
  $.getElementById("page00").hidden = true;
  $.getElementById("page01").hidden = false;
});


AOS.init();
