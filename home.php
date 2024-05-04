<?php
require_once("./configurations/conn.php");

$page_type = 'home';
include_once("./includes/header.php");
?>

<body>
  <section>

    <?php include_once('./includes/Navbar.php'); ?>

    <!-- صفحه اصلی -->

    <section>
      <div class="relative isolate px-6 pt-14 lg:px-8">
        <div class="absolute inset-x-0 top-20 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
          <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-2xl pb-28">
          <img src="./images/features/Notes-bro.png" alt="" class=" mb-12 mx-auto h-48 scale-125">
          <div class="text-center">
            <h1 id="app" class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl moraba">یادداشت افسانه ای</h1>
            <p class="my-6 text-lg leading-8 text-gray-600">يادداشت هاي زيبا و محيطي امن با قابليت هاي فراوان!</p>
            <a href="#pageFirst" class="rounded-lg px-8 py-3 text-md font-semibold text-zinc-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><i class="bi bi-arrow-down-circle me-2"></i> بزن بريم!</a>
          </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
          <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
      </div>
      <div class="bg-white">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
              <dt class="text-base leading-7 text-gray-600">یادداشت های نوشته شده</dt>
              <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">46,000</dd>
            </div>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
              <dt class="text-base leading-7 text-gray-600">نفر کاربر فعال</dt>
              <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">46,000</dd>
            </div>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
              <dt class="text-base leading-7 text-gray-600">دقیقه زمان حضور ما</dt>
              <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">46,000</dd>
            </div>
          </dl>
        </div>
      </div>
    </section>


    <!-- چی شد که ما امدیم؟-->


    <section id="pageFirst">
      <div class="overflow-hidden bg-white pt-24 sm:pt-32">
        <h1 class="text-3xl text-indigo-900 mb-10 moraba text__header relative max-w-max mx-auto z-1">چی شد که ما امدیم؟</h1>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
            <div class="lg:pr-8 lg:pt-4">
              <div class="lg:max-w-lg">
                <h2 class="text-base font-semibold leading-7 text-indigo-600">لحظه زیبای ماندگار</h2>
                <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-4xl moraba">ماجرای دفترچه یادداشت افسانه ای ...</p>
                <p class="mt-6 text-lg leading-8 text-gray-600">این وبسایت یا بهتر بگوییم دفترچه یادداشت افسانه ای با هدف کمک به محیط زیست و همچنین طبیعتی ماندگاه با کاهش میزان استفاده از کاغذ طراحی و ایجاد شد تا ما بتوانیم شکرگزار ذره ای از لطف بیکران خداوند و زحمات شما مردمان عزیز و گران قدر باشیم.</p>
                <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 lg:max-w-none">
                  <div class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900">
                      <svg class="absolute right-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm3.75-2.75a.75.75 0 001.5 0V9.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0l-3.25 3.5a.75.75 0 101.1 1.02l1.95-2.1v4.59z" clip-rule="evenodd" />
                      </svg>
                    </dt>
                    <dd class="inline ms-10">کاهش میزان خسارات به محیط زیست</dd>
                  </div>
                  <div class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900">
                      <svg class="absolute right-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                      </svg>
                    </dt>
                    <dd class="inline ms-10">کاهش مصرف کاغذ و استفاده بی رویه از آن</dd>
                  </div>
                  <div class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900">
                      <svg class="absolute right-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M4.632 3.533A2 2 0 016.577 2h6.846a2 2 0 011.945 1.533l1.976 8.234A3.489 3.489 0 0016 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234z" />
                        <path fill-rule="evenodd" d="M4 13a2 2 0 100 4h12a2 2 0 100-4H4zm11.24 2a.75.75 0 01.75-.75H16a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75h-.01a.75.75 0 01-.75-.75V15zm-2.25-.75a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75h-.01z" clip-rule="evenodd" />
                      </svg>
                    </dt>
                    <dd class="inline ms-10">کاهش الودگی زیستی</dd>
                  </div>
                </dl>
              </div>
            </div>
            <img src="./images/features/Add notes-bro.png" alt="Product screenshot" class="w-auto">
          </div>
        </div>
      </div>

    </section>

    <!-- ویژگی ها  -->


    <section>
      <div class="bg-white py-16 sm:py-32">
        <h1 class="text-3xl text-indigo-900 mb-10 moraba text__header relative max-w-max mx-auto z-1"> ویژگی ها</h1>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl lg:text-center">
            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl moraba">تلاشی برای زندگی بهتر!</p>
            <p class="mt-6 text-lg leading-8 text-gray-600">و اندک جایی سبز ، برایِ تنفسِ ذهن .️ </p>
          </div>
          <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
            <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">

              <div class="relative pr-16">
                <dt class="text-base font-semibold leading-7 text-gray-900">
                  <div class="absolute right-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                    </svg>
                  </div>
                  <p class="text-indigo-800">ذخیره نامحدود اطلاعات و یادداشت های زیبای شما</p>
                </dt>
                <dd class="mt-2 text-base dana leading-7 text-gray-600">ما سعی کردیم با ایجاد بستری بزرگ و نامحدود باعث ذخیره دائمی یادداشت های شما با هر تعداد باشیم و تا زمانی که با ما همراه باشید خیالتان از تک تک یادداشت های شخصی راحت است.</dd>
              </div>

              <div class="relative pr-16">
                <dt class="text-base font-semibold leading-7 text-gray-900">
                  <div class="absolute right-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                    <i class="bi bi-file-lock text-xl text-white mt-2"></i>
                  </div>
                  <p class="text-indigo-800">امنیت بسیار بالا با رمزگذاری داده هایتان</p>
                </dt>
                <dd class="mt-2 text-base dana leading-7 text-gray-600">ما با رمز گذاری داده های شما در هر سطحی از زمان عضویت تا ایجاد اولین یادداشت باعث بالارفتن امنیت تمامی یادداشت های شما عزیزان شده ایم.</dd>
              </div>

              <div class="relative pr-16">
                <dt class="text-base font-semibold leading-7 text-gray-900">
                  <div class="absolute right-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                    <i class="bi bi-alarm text-xl text-white mt-2"></i>
                  </div>
                  <p class="text-indigo-800">قابل دسترس در هر کجا و هر زمان</p>
                </dt>
                <dd class="mt-2 text-base dana leading-7 text-gray-600">شما با استفاده از این دفترچه یادداشت هوشمند کامل بدون نیاز به هزینه اضافی برای کاغذ و .... می توانید در هر زمان و مکان دلخواه خودتان به راحتی در کمترین زمان ممکن به این وبسایت دسترسی داشته باشید.</dd>
              </div>

              <div class="relative pr-16">
                <dt class="text-base font-semibold leading-7 text-gray-900">
                  <div class="absolute right-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                    <i class="bi bi-pen text-xl text-white mt-2"></i>
                  </div>
                  <p class="text-indigo-800">ادیتوری هوشمند با قابلیت های فراوان</p>
                </dt>
                <dd class="mt-2 text-base dana leading-7 text-gray-600">این وبسایت با بهره گیری از یک ادیتوری هوشمند و کامل توانسته تا حد زیادی نیاز شما عزیزان را بر طرف کند و باعث سهولت استفاده شما شود.</dd>
              </div>

            </dl>
          </div>
        </div>
      </div>

    </section>

    <!-- سوالات متداول  -->



    <section class="mx-auto max-w-7xl px-6 lg:px-8">
      <h1 class="text-3xl text-indigo-900 mb-12 moraba text__header relative max-w-max mx-auto z-1">سوالات متداول </h1>
      <div id="accordion-collapse" data-accordion="collapse">
        <h2 id="accordion-collapse-heading-1">
          <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-indigo-800 border border-indigo-200 rounded-xl mb-3 focus:ring-4 focus:ring-indigo-200 hover:bg-indigo-100 gap-3" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
            <span>یادداشت افسانه ای چیست و چه کاربردی داره؟</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
            </svg>
          </button>
        </h2>
        <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
          <div class="w-full p-5 font-medium rtl:text-right text-indigo-800 border border-indigo-200 shadow-md rounded-xl mb-3">
            <p class="mb-2 text-indigo-500">این وبسایت یا بهتر بگوییم دفترچه یادداشت افسانه ای با هدف کمک به محیط زیست و همچنین طبیعتی ماندگاه با کاهش میزان استفاده از کاغذ طراحی و ایجاد شد تا ما بتوانیم شکرگزار ذره ای از لطف بیکران خداوند و زحمات شما مردمان عزیز و گران قدر باشیم.</p>
          </div>
        </div>
        <h2 id="accordion-collapse-heading-2">
          <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-indigo-800 border border-indigo-200 rounded-xl mb-3 focus:ring-4 focus:ring-indigo-200 hover:bg-indigo-100 gap-3" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
            <span>چگونه می تونیم ازش استفاده کنیم؟</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
            </svg>
          </button>
        </h2>
        <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
          <div class="w-full p-5 font-medium rtl:text-right text-indigo-800 border border-indigo-200 shadow-md rounded-xl mb-3">
            <p class="mb-2 text-indigo-500">شما می توانید به راحتی و در کمترین زمان ممکن و فقط با اتصال به اینترنت و عضویت در وبسایت ما از تمامی خدمات بهره مند شوید.</p>
          </div>
        </div>
        <h2 id="accordion-collapse-heading-3">
          <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-indigo-800 border border-indigo-200 rounded-xl mb-3 focus:ring-4 focus:ring-indigo-200 hover:bg-indigo-100 gap-3" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
            <span>در نسخه جدید چه قابلیت های جدیدی به آن اضافه شده است؟</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
            </svg>
          </button>
        </h2>
        <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
          <div class="w-full p-5 font-medium rtl:text-right text-indigo-800 border border-indigo-200 shadow-md rounded-xl mb-3">
            <p class="mb-2 text-indigo-500">ما سعی کردیم در نسخه جدید با ارائه وبسایت زیبا تر با امنیت بیشتر و همچنین کاربردی همه روزه خدمت گذار شما عزیزان باشیم.</p>
          </div>
        </div>
      </div>
    </section>


    <?php include_once('./includes/comments.php'); ?>
    <?php include_once('./includes/footer.php'); ?>

  </section>
  <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="./js/main.js"></script>
  <script src="./js/home.js"></script>
</body>

</html>