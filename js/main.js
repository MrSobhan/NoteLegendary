const $ = document,
  _id = (id) => $.getElementById(id),
  _qs = (qs) => $.querySelector(qs);

// $.addEventListener('contextmenu', (event) => {
//     event.preventDefault()
// })


if(_qs("#editor")){

  ClassicEditor.create(_qs("#editor")).catch((error) => {
    console.error(error);
  });
}


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

if(_qs('#user-menu-button')){
  _qs('#user-menu-button').addEventListener('click', ()=>{
    let status = _qs('.dropdown-profile').getAttribute('open')
  
  
    if(status == 'false'){
      _qs('.dropdown-profile').classList.remove('hidden')
      _qs('.dropdown-profile').setAttribute('open' , 'true')
    }else{
      _qs('.dropdown-profile').classList.add('hidden')
      _qs('.dropdown-profile').setAttribute('open' , 'false')
    }
  })
}

// setInterval(() => {
//   if ($.documentElement.scrollTop <= 12) {
//     $.getElementById("nav").style.position = "relative";
//   } else {
//     $.getElementById("nav").style.position = "fixed";
//     $.getElementById("nav").style.top = "0px";
//   }
// });

// $.addEventListener("DOMContentLoaded", () => {
//   $.getElementById("page00").hidden = true;
//   $.getElementById("page01").hidden = false;
// });

console.log("Hello World :))");
