<?php

require_once("./configurations/conn.php");


$quryGetChats = "SELECT * FROM chats";

$chats = mysqli_query($conn, $quryGetChats);

$page_type = 'home';
include_once("./includes/header.php");
?>



<body>
  <section id="page00" hidden>
    <div class="all">
      <div class="div1 for"></div>
      <div class="div2 for"></div>
      <div class="div2 for"></div>
      <div class="div2 for"></div>
    </div>
  </section>



  <section id="page01">

    <?php include_once('./includes/Navbar.php'); ?>

    <!-- صفحه اصلی -->

    <section class="hidden">
      <div class="container-fluid sec-1" style="margin-top: 100px;margin-bottom:150px;">
        <div class="row justify-content-center align-items-start">
          <div class="col-lg-6">
            <center>
              <h1 id="app" class="text-primary">يادداشت آنلاين</h1>
              <h3 class="mt-3 h5 text-muted">يادداشت هاي زيبا و محيطي امن با قابليت هاي فراوان!</h3>
              <form action="" method="post"><button class="btn btn-lg btn-primary mt-5" name="go">بزن بريم!</button></form>
              <div class="mt-4"><i class="bi bi-arrow-down-circle-fill fs-2 text-light d-lg-block d-none"></i></div>
            </center>
          </div>
          <div class="col-lg-6">
            <center><img src="https://raman01.ir/wp-content/uploads/2020/08/raman01.ir_-1.png" alt="" class="img-fluid"></center>
          </div>
        </div>
      </div>
    </section>

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
            <a href="#" class="rounded-lg px-8 py-3 text-md font-semibold text-zinc-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><i class="bi bi-arrow-down-circle me-2"></i> بزن بريم!</a>
          </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
          <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
      </div>
      <div class="bg-white py-6">
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

    <section data-aos="flip-down" class="hidden">
      <div class="container mt-5 mb-5" id="p1">
        <div class="row justify-content-center align-items-center g-0">
          <div class="col-lg-6 p-5" style="background: rgba(186, 226, 245, 0.432);">
            <h3 class="text-primary"><i class="bi bi-card-checklist"></i> دفترچه ي يادداشت هوشمند</h3>
            <h6 class="text-muted mt-4" style="line-height: 25px;">هميشه تو زندگيمون به اين موضوع بر خورديم كه مثلا به دليل مشغله هاي كاري در طول روز پيش مياد كه بخواهيم چيزي رو يادداشت كنيم و ممكنه در اون لحظه قلم كاغذي كه بتوانيم با آن بنويسيم نداشته باشيم . امروزه با پيشرفت روز افزون تكنولوژي در عرصه هاي مختلف همه ي ماها حداقل يك تلفن همراه را داريم كه با كمك آن كار هاي روز مره خود را انجام ميدهيم حال با كمك اين وبسايت به صورت كاملا رايگان و با داشتن تلفن هوشمند ديگر نيازي به استفاده از قلم و كاغذ نيست!</h6>
          </div>
          <div class="col-lg-6">
            <img src="https://files.virgool.io/upload/users/298113/posts/alwxkye1k5vf/6airntzpplo0.jpeg" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="overflow-hidden bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
            <div class="lg:pr-8 lg:pt-4">
              <div class="lg:max-w-lg">
                <h2 class="text-base font-semibold leading-7 text-indigo-600">Deploy faster</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">A better workflow</p>
                <p class="mt-6 text-lg leading-8 text-gray-600">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.</p>
                <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 lg:max-w-none">
                  <div class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900">
                      <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm3.75-2.75a.75.75 0 001.5 0V9.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0l-3.25 3.5a.75.75 0 101.1 1.02l1.95-2.1v4.59z" clip-rule="evenodd" />
                      </svg>
                      Push to deploy.
                    </dt>
                    <dd class="inline">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.</dd>
                  </div>
                  <div class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900">
                      <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                      </svg>
                      SSL certificates.
                    </dt>
                    <dd class="inline">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.</dd>
                  </div>
                  <div class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900">
                      <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M4.632 3.533A2 2 0 016.577 2h6.846a2 2 0 011.945 1.533l1.976 8.234A3.489 3.489 0 0016 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234z" />
                        <path fill-rule="evenodd" d="M4 13a2 2 0 100 4h12a2 2 0 100-4H4zm11.24 2a.75.75 0 01.75-.75H16a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75h-.01a.75.75 0 01-.75-.75V15zm-2.25-.75a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75h-.01z" clip-rule="evenodd" />
                      </svg>
                      Database backups.
                    </dt>
                    <dd class="inline">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.</dd>
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

    <div data-aos="zoom-in" class="hidden">
      <div style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
          <path d="M0.00,49.99 C263.82,205.76 349.20,-49.99 500.00,49.99 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgba(186, 226, 245, 0.432);"></path>
        </svg></div>
      <section>
        <div class="container-fluid sec-card mt-4">
          <center>
            <div class="row g-4">
              <div class="col-lg-4 mt-5">
                <div class="card shadow card-sec1" style="width: 18rem;">
                  <img src="https://techfars.com/wp-content/uploads/2022/12/tech-gh-pg.jpg" class="card-img-top" alt="...">
                  <div class="card-body text center">
                    <h5 class="card-title text-primary">اديتور هوشمند</h5>
                    <p class="card-text text-muted">اين وبسايت با بهره گيري از تكنولوژي روز دنيا يك اديتور كامل و جذاب را براي نوشته هاي شما فراهم مي كند.</p>
                    <div class="hr-card bg-primary"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mt-5">
                <div class="card shadow card-sec1" style="width: 18rem;">
                  <img src="https://www.iraniancyber.com/wp-content/uploads/2022/01/%D8%A2%D9%85%D9%88%D8%B2%D8%B4-%D8%B1%D8%A7%DB%8C%DA%AF%D8%A7%D9%86-%D8%A8%D8%B1%D9%86%D8%A7%D9%85%D9%87-%D9%86%D9%88%DB%8C%D8%B3%DB%8C-%D8%A7%D8%B2-%D8%B5%D9%81%D8%B1.jpg" class="card-img-top" alt="...">
                  <div class="card-body text center">
                    <h5 class="card-title text-primary">امنيت كامل</h5>
                    <p class="card-text text-muted">در اينجا تمامي اطلاعات شما محفوظ است و نوشته هاي شما امنيتي كامل را در اختيار دارد.</p>
                    <div class="hr-card bg-primary"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mt-5">
                <div class="card shadow card-sec1" style="width: 18rem;">
                  <img src="https://files.virgool.io/upload/users/1462351/posts/wg9rklqv3xes/b24q1fcdupkd.png" class="card-img-top" alt="...">
                  <div class="card-body text center">
                    <h5 class="card-title text-primary">دسترسي راحت در لحظه</h5>
                    <p class="card-text text-muted">در اين وبسايت شما دسترسي كامل رايگان در هر زمان و مكاني به نوشته هايتان داريد.</p>
                    <div class="hr-card bg-primary"></div>
                  </div>
                </div>
              </div>
            </div>
          </center>
        </div>
      </section>
      <div style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
          <path d="M0.00,49.99 C191.59,193.92 271.49,-49.99 500.00,49.99 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: rgba(186, 226, 245, 0.432);"></path>
        </svg></div>
    </div>

    <section data-aos="zoom-in-up" class="hidden">
      <div class="container mt-5">
        <center>
          <div class="row g-4">
            <div class="col-lg-4">

              <div class="card shadow sec-card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title text-center"><i class="bi bi-check2-square"></i> امنيت قوي</h5>
                </div>
              </div>

            </div>
            <div class="col-lg-4">

              <div class="card shadow sec-card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title text-center"><i class="bi bi-clipboard2-data"></i> دسترسي آسان</h5>
                </div>
              </div>

            </div>
            <div class="col-lg-4">

              <div class="card shadow sec-card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title text-center"><i class="bi bi-alarm-fill"></i> نامحدود و رايگان</h5>
                </div>
              </div>

            </div>
          </div>
        </center>
      </div>
    </section>


    <section>
      <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl lg:text-center">
            <h2 class="text-base font-semibold leading-7 text-indigo-600">Deploy faster</h2>
            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Everything you need to deploy your app</p>
            <p class="mt-6 text-lg leading-8 text-gray-600">Quis tellus eget adipiscing convallis sit sit eget aliquet quis. Suspendisse eget egestas a elementum pulvinar et feugiat blandit at. In mi viverra elit nunc.</p>
          </div>
          <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
            <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
              <div class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-gray-900">
                  <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                    </svg>
                  </div>
                  Push to deploy
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-600">Morbi viverra dui mi arcu sed. Tellus semper adipiscing suspendisse semper morbi. Odio urna massa nunc massa.</dd>
              </div>
              <div class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-gray-900">
                  <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                  </div>
                  SSL certificates
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-600">Sit quis amet rutrum tellus ullamcorper ultricies libero dolor eget. Sem sodales gravida quam turpis enim lacus amet.</dd>
              </div>
              <div class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-gray-900">
                  <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                  </div>
                  Simple queues
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-600">Quisque est vel vulputate cursus. Risus proin diam nunc commodo. Lobortis auctor congue commodo diam neque.</dd>
              </div>
              <div class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-gray-900">
                  <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                    </svg>
                  </div>
                  Advanced security
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-600">Arcu egestas dolor vel iaculis in ipsum mauris. Tincidunt mattis aliquet hac quis. Id hac maecenas ac donec pharetra eget.</dd>
              </div>
            </dl>
          </div>
        </div>
      </div>

    </section>





    <!-- سوالات متداول  -->

    <section data-aos="zoom-in-down" class="hidden">
      <div class="container mt-5 p-5" id="p2">
        <div class="accordion" id="accordionPanelsStayOpenExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="collapseOne">
                هدف از خلق اين وبسايت چه بود؟
              </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
              <div class="accordion-body px-5">
                ما توانستيم بعد از سال ها تلاش كوشش وبا تشخيص نياز برخي مردم يك وبسايتي را براي شما عزيزان به نمايش بگذاريم كه نيازي حقيقي شما را برطرف كند و بتواند راه كار خوبي براي استفاده نكردن از كاغذ و دسترسي راحت تر نسبت به آن باشد تا مردم بتوانند با خيال راحت تر و به صورت كاملا رايگان نوشته ها و يادداشت هاي خود را بنويسند و از اين وبسايت استفاده كنند.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                آيا نوشته هاي ما از امنيت كامل برخوردار است؟
              </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
              <div class="accordion-body px-5">
                براي پاسخ به اين سوال بايد بگوييم بله! اين وبسايت با بهره گيري كامل و دقيق از تكنولوژي روز دنيا در صنعت برنامه نويسي توانسته اعتماد تعداد زيادي از كاربران خود را جلب كند و هدف اصلي يادداشت افسانه اي بالا بردن امنيت اطلاعات و يادداشت هاي كاربرانش بوده و خواهد بود همچنين در اين راستا تلاش هاي بسيار زيادي نموده .
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                اين وبسايت چه برتري نسبت به رقبا دارد؟
              </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
              <div class="accordion-body px-5">
                اين وبسايت با وجود امنيت كامل طبق هدفش و همچنين دسترسي كامل و رايگان در تمامي ساعات شبانه روز و مجهز بودن به اديتور نوشته توانسته اعتماد بيشتر كاربرانش را جلب كند.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-heading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse" aria-expanded="false" aria-controls="panelsStayOpen-collapse">
                آيا امكان ارتباط با سازندگان سايت وجود دارد؟
              </button>
            </h2>
            <div id="panelsStayOpen-collapse" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading">
              <div class="accordion-body px-5">
                شما در اين وبسايت با وجود امكانات زياد ميتوانيد پس از ورود در آن نظرات و مشكلات خود را با ما مطرح كنيد همچنين با وجود راه هاي ارتباطي نيز ميتوانيد با ما در ارتباط باشيد منتظر نظرات شما عزيزان هستيم!
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <section class="mx-auto max-w-7xl px-6 lg:px-8">

      <div id="accordion-collapse" data-accordion="collapse">
        <h2 id="accordion-collapse-heading-1">
          <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-indigo-800 border border-indigo-200 rounded-xl mb-3 focus:ring-4 focus:ring-indigo-200 hover:bg-indigo-100 gap-3" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
            <span>What is Flowbite?</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
            </svg>
          </button>
        </h2>
        <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
          <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
            <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
          </div>
        </div>
        <h2 id="accordion-collapse-heading-2">
          <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-indigo-800 border border-indigo-200 rounded-xl mb-3 focus:ring-4 focus:ring-indigo-200 hover:bg-indigo-100 gap-3" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
            <span>Is there a Figma file available?</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
            </svg>
          </button>
        </h2>
        <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
          <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
            <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
          </div>
        </div>
        <h2 id="accordion-collapse-heading-3">
          <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-indigo-800 border border-indigo-200 rounded-xl mb-3 focus:ring-4 focus:ring-indigo-200 hover:bg-indigo-100 gap-3" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
            <span>What are the differences between Flowbite and Tailwind UI?</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
            </svg>
          </button>
        </h2>
        <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
          <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
            <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product. Another difference is that Flowbite relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>
            <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
            <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
            <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
              <li><a href="https://flowbite.com/pro/" class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
              <li><a href="https://tailwindui.com/" rel="nofollow" class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- نظرات  -->


    <section data-aos="zoom-out-up">
      <div class="relative mx-auto max-w-7xl px-6 lg:px-8" id="p3">
        <div class="absolute inset-x-0 top-20 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
          <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="grid md:grid-cols-2 sm:grid-cols-1 gap-12">
          <div class="sm:p-0 md:p-16">
            <img src="./images/features/Taking notes-amico.png" alt="Not Dwon">
          </div>
          <div class="flex__center">
            <?php
            if (!$isLogin) {
            ?>
              <center>
                <h1 class="text-primary fs-2">نظرات</h1>
                <h4 class="fs-5 text-danger">ابتدا براي ثبت نظر بايد وارد شويد.</h4>
                <button class="btn btn-primary btn-lg"><a href="http://localhost/php/Notes/login.php" class="text-light" style="text-decoration: none;"><i class="bi bi-person-fill"></i> ورود</a></button>
              </center>
            <?php
            } else {
            ?>


              <form action="" class="form w-full" method="post">
                <div class="mb-6">
                  <label for="email" class="block mb-2 text-sm font-medium text-indigo-800">ایمیل : </label>
                  <input type="email" name="emailChat" id="email" class="bg-gray-50 border border-indigo-300 text-indigo-800 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="sobhan.dev@company.com" />
                </div>
                <div class="mb-6">
                  <label for="first_name" class="block mb-2 text-sm font-medium text-indigo-800">نظرات : </label>
                  <textarea type="text" name="chat" id="first_name" class="bg-gray-50 border border-indigo-300 text-indigo-800 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="پیشنهاد من ..."></textarea>
                </div>

                <button type="submit" name="sub-chat" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-7 py-2.5 text-center">ارسال</button>
              </form>


            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </section>


    <!-- <section data-aos="zoom-in">
      <div class="container mt-5 mb-3">
        <div class="row g-4">
          <?php
          while ($rowChat = $chats->fetch_assoc()) {
            if ($rowChat['status'] == 1) {
          ?>
              <div class="col-12">
                <div class="card col-chats w-100 shadow">
                  <div class="card-body">
                    <h5 class="card-title text-primary"><i class="bi bi-person-circle"></i> <?php echo $rowChat['email']; ?></h5>
                    <p class="card-text text-muted mt-3"><?php echo $rowChat['chat']; ?></p>
                  </div>
                </div>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </section> -->


    <?php include_once('./includes/footer.php'); ?>

  </section>
  <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="./js/main.js"></script>
  <script src="./js/home.js"></script>
</body>

</html>