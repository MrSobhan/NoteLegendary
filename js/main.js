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

$.addEventListener('scroll' , () => {
  if ($.documentElement.scrollTop <= 8) {
   _id("navbar").style.position = "relative";
   _id("navbar").classList.remove('bg-white')
   _id("navbar").classList.remove('shadow')
   _qs('.btnTop').classList.add('hidden')
  } else {
    _id("navbar").style.position = "fixed";
    _id("navbar").style.top = "0px";
    _id("navbar").classList.add('bg-white')
    _id("navbar").classList.add('shadow')
    _qs('.btnTop').classList.remove('hidden')
  }
})

_qs('.btnTop').addEventListener('click' , $.documentElement.scrollTop = 0)
console.log("Hello World :))");
