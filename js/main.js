const $ = document,
  _id = (id) => $.getElementById(id),
  _qs = (qs) => $.querySelector(qs);

// $.addEventListener('contextmenu', (event) => {
//     event.preventDefault()
// })

ClassicEditor.create(document.querySelector("#editor")).catch((error) => {
  console.error(error);
});


_qs('.nav-open').addEventListener('click', ()=>{
  let status = _qs('.mobile-menu').getAttribute('open')


  if(status == 'false'){
    _qs('.mobile-menu').classList.remove('hidden')
    _qs('.menu').classList.add('hidden')
    _qs('.exit').classList.remove('hidden')
    _qs('.mobile-menu').setAttribute('open' , 'true')
  }else{
    _qs('.mobile-menu').classList.add('hidden')
    _qs('.menu').classList.remove('hidden')
    _qs('.exit').classList.add('hidden')
    _qs('.mobile-menu').setAttribute('open' , 'false')
  }
})

console.log("Hello World :))");
