console.log("Js");

_id("note-tab2").addEventListener("click", () => {
  _id("note-page").hidden = false;
  _id("love-page").hidden = true;
  _id("now-page").hidden = true;
});

_id("love-tab2").addEventListener("click", () => {
  _id("note-page").hidden = true;
  _id("now-page").hidden = true;
  _id("love-page").hidden = false;
});

_id("now-tab2").addEventListener("click", () => {
  _id("note-page").hidden = true;
  _id("now-page").hidden = false;
  _id("love-page").hidden = true;
});

// _id("btn-them").addEventListener("click", () => {
//   var ithem = _id("exampleColorInput").value;
//   $.documentElement.style.setProperty("--var-them", ithem);
// });
