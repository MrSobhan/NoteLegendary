const $ = document,
  _id = (id) => $.getElementById(id);

// $.addEventListener('contextmenu', (event) => {
//     event.preventDefault()
// })

// setInterval(() => {
//   if ($.documentElement.scrollTop <= 12) {
//     _id("nav").style.position = "relative";
//   } else {
//     _id("nav").style.position = "fixed";
//     _id("nav").style.top = "0px";
//   }
// });

ClassicEditor.create(document.querySelector("#editor")).catch((error) => {
  console.error(error);
});

console.log("Hello World :)))");
