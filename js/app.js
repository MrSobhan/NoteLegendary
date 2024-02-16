$(document).ready(function () {
  const emailRegEX = /^[a-z0-9\.]+@[a-z]+\.[a-z]{2,3}$/;
  let formIsValid = true;
  // Swiper
  try {
    let swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });

    let urlMenuActice = ["profile", "user", "ticket", "comments", "editSite"]; //....
    let activeMenu = false;
    urlMenuActice.forEach((e) => {
      if (location.pathname.includes(e)) {
        console.log("Welcome To Page " + e + " :)");
        $(".active").removeClass("active");
        $("." + e).addClass("active");
        activeMenu = true;
      }
    });

    if (!activeMenu) {
      $(".active").removeClass("active");
      $(".dashboard").addClass("active");
    }
  } catch (err) {
    console.log(err.message);
  }
  // Logout button
  $("button[name$='exit']").click(function () {
    Swal.fire({
      title: "آیا از حساب خود خارج میشوید؟",
      icon: "warning",
      confirmButtonText: "بله",
      cancelButtonText: "خیر",
    }).then(function (res) {
      if (res.isConfirmed) {
        $.ajax({
          type: "GET",
          url: "/configurations/conn.php",
          data: "action=exit",
          success: function (response) {
            if (response) {
              Swal.fire({
                title: "از حساب خارج شدید",
                icon: "success",
              }).then(() => location.reload());
            }
          },
        });
      }
    });
  });

  // Preview profile image when user choose one
  $("input#profile[type='file']").change(function (e) {
    e.preventDefault();
    $("img#preview").attr("src", URL.createObjectURL(e.currentTarget.files[0]));
  });
  // Upload profile picture
  $("form#upload-profile").submit(function (e) {
    e.preventDefault();
    let profilePicture = $("input#profile[type='file']")[0].files[0],
      allowedTypes = ["jpg", "jpeg", "png", "webp"];
    // Check if uploaded at least 1 file
    if (profilePicture) {
      // Check if file type is correct
      let profilePictureType = profilePicture.type.split("/");
      if (
        profilePictureType[0] == "image" &&
        allowedTypes.includes(profilePictureType[1])
      ) {
        // Check if picture size is equal or less than 2 MB
        if (profilePicture.size <= 2e6) {
          const frmdata = new FormData(e.currentTarget);
          // frmdata.append("pfp" , profilePicture[0]);
          $.ajax({
            type: "POST",
            url: "/cms/panel/profile.php",
            data: frmdata,
            contentType: false,
            cache: false,
            processData: false,
            xhr: function () {
              var xhr = new window.XMLHttpRequest();

              // Progress event listener to update the progress bar
              xhr.upload.addEventListener("progress", function (e) {
                if (e.lengthComputable) {
                  var percent = Math.round((e.loaded / e.total) * 100);
                  $("#progress-bar").val(percent);
                  $("#status").html(percent + "% uploaded");
                }
              });

              return xhr;
            },
            success: function (response) {
              if (Boolean(response)) {
                // Profile upload & updated successfully ✔️
                Swal.fire({
                  title: "پروفایل آپلود شد",
                  confirmButtonText: "حله",
                }).then(() => location.reload());
              }
            },
          });
        }
      }
    }
  });
  // Delete Profile
  $("button[name='delete-profile']").click(function () {
    Swal.fire({
      title: "پروفایل را حذف میکنید؟",
      icon: "question",
      confirmButtonText: "بله",
      cancelButtonText: "خیر",
      showCancelButton: true,
    }).then(function (res) {
      if (res.isConfirmed) {
        // Delete profile
        $.ajax({
          type: "GET",
          url: "/cms/panel/profile.php",
          data: "action=delete-profile",
          success: function (response) {
            if (Boolean(response)) {
              Swal.fire({
                title: "پروفایل حدف شد",
                icon: "success",
              }).then(() => location.reload());
            }
          },
        });
      }
    });
  });

  $("#profile").change(() => {
    $(".change_profile").removeAttr("disabled");
  });

  $("form.FormProfile").submit(function (e) {
    e.preventDefault();
    if ($("input[name='username']").val().trim().length >= 3) {
      if ($("input[name='fullname']").val().trim().length >= 3) {
        if (formIsValid) {
          let frmd = new FormData(document.querySelector("form.FormProfile"));
          frmd.set("action", $("form button[type='submit']").attr("value"));
          $.ajax({
            type: "POST",
            url: "/cms/panel/profile.php",
            data: frmd,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
              console.log(response);
              if (Boolean(response)) {
                Swal.fire({
                  title: "با موفقیت اطلاعات شما تغییر یافت",
                  icon: "success",
                  confirmButtonText: "صفحه اصلی",
                }).then(() => location.replace("/cms/panel/profile.php"));
              } else {
                Swal.fire({
                  title: "مشکلی در هنگام تغییر پیش آمد",
                  icon: "error",
                  confirmButtonText: "تلاش مجدد",
                });
              }
            },
          });
        }
      } else {
        // Username is too short
        formIsValid = false;
        Swal.fire({
          title: "نام خود را اصلاح کنید",
          icon: "error",
          confirmButtonText: "تغییر اطلاعات",
        });
      }
    } else {
      // Username is too short
      formIsValid = false;
      Swal.fire({
        title: "نام کاربری خود را اصلاح کنید",
        icon: "error",
        confirmButtonText: "تغییر اطلاعات",
      });
    }
  });
});
