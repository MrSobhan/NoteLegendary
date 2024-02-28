_qsA(".nav-link").forEach((element) => {
  element.addEventListener("click", (btn) => {
    
    if(btn.target.className.includes('nav-link')){
      let OverPage = btn.target.getAttribute("page")
      _qsA('.content-note').forEach(e =>{
        e.hidden = true
      })
      console.log(OverPage);
      _qs('.active-link').classList.remove('active-link')
      btn.target.parentElement.classList.add('active-link')
      _id(OverPage).hidden = false
    }
  });
});
