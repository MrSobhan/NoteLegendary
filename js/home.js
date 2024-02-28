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


_id("accordion-collapse-heading-1").addEventListener("click", () => {
  if (_id("accordion-collapse-body-1").className.includes("hidden")) {
    _id("accordion-collapse-body-1").classList.remove("hidden");
  } else {
    _id("accordion-collapse-body-1").classList.add("hidden");
  }
});
_id("accordion-collapse-heading-2").addEventListener("click", () => {
  if (_id("accordion-collapse-body-2").className.includes("hidden")) {
    _id("accordion-collapse-body-2").classList.remove("hidden");
  } else {
    _id("accordion-collapse-body-2").classList.add("hidden");
  }
});
_id("accordion-collapse-heading-3").addEventListener("click", () => {
  if (_id("accordion-collapse-body-3").className.includes("hidden")) {
    _id("accordion-collapse-body-3").classList.remove("hidden");
  } else {
    _id("accordion-collapse-body-3").classList.add("hidden");
  }
});


AOS.init();
