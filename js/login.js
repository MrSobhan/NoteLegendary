const emailRegEX = /^[a-z0-9\.]+@[a-z]+\.[a-z]{2,3}$/;
let formIsValid = true;
// Check if all inputs are filled
console.log("It's linked successfully:)");
// Set oninput event on every inputs in the form except checkboxes and radio buttons
// $("form input:not([type='checkbox'] , [type='radio'])").on(
//   "input",
//   function (e) {
//     console.log(e.currentTarget);
//   }
// );
$("form").submit(function (e) {
  e.preventDefault();
  if (e.currentTarget.action.value == "signup") {
    if ($("input[name='fullname']").val().trim().length >= 3) {
      if (emailRegEX.test($("form input[name='email']").val().trim().toLowerCase())) {
        // Email is valid
        formIsValid = true;
        console.log("Email is valid ✔️");
      } else {
        // Email isn't valid
        formIsValid = false;
        console.log("Email is not valid");
        Swal.fire({
          title: "ایمیل ورود اشتباه است",
          icon: "error",
          confirmButtonText: "ثبت نام",
        });
      }
    } else {
      // Fullname is too short
      formIsValid = false;
      Swal.fire({
        title: "نام و نام خانوادگی خود را اصلاح کنید",
        icon: "error",
        confirmButtonText: "ثبت نام",
      });
    }
  }

  if ($("input[name='username']").val().trim().length >= 3) {
    if ($("input[name='password']").val().trim().length >= 8) {
      if (formIsValid) {
        let frmd = new FormData(document.querySelector("form"));
        frmd.set("action" , $("form button[type='submit']").attr("value"));
        $.ajax({
          type: "POST",
          url: location.origin.concat(location.pathname),
          data: frmd,
          processData: false,
          contentType: false,
          cache: false,
          success: function (response) {
            
            console.log(response);
            if (Boolean(response)) {
              Swal.fire({
                title: "با موفقیت وارد حساب شدید",
                icon: "success",
                confirmButtonText: "صفحه اصلی",
              }).then(() => location.replace("/"));
            } else {
              Swal.fire({
                title: "مشکلی در هنگام ورود به حساب پیش آمد",
                icon: "error",
                confirmButtonText: "تلاش مجدد",
              });
            }
          }
        });
      }
    } else {
      // Password is too short
      formIsValid = false;
      Swal.fire({
        title: "رمز عبور نمیتواند کمتر از 8 حرف باشد",
        icon: "error",
        confirmButtonText: "ورود",
      });
    }
  } else {
    // Username is too short
    formIsValid = false;
    Swal.fire({
      title: "نام کاربری خود را اصلاح کنید",
      icon: "error",
      confirmButtonText: "ورود",
    });
  }
});
