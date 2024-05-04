<!-- نظرات  -->


<section>
    <div class="relative mx-auto max-w-7xl px-6 lg:px-8" id="p3">
        <div class="absolute inset-x-0 top-20 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <h1 class="text-3xl text-indigo-900 my-10 moraba text__header relative max-w-max mx-auto z-1">نظرات و پیشنهادات</h1>
        <div class="grid md:grid-cols-2 sm:grid-cols-1 gap-12">
            <div class="flex__center">
                <?php
                if (!$isLogin) {
                ?>
                    <center>
                        <h1 class="text-indigo-800 moraba text-5xl mb-8 hidden">نظرات</h1>
                        <img class="mx-auto h-40 w-auto" src="./images/NoteLegendary.png" alt="Your Company">
                        <p class="text-xl my-4">ابتدا براي ثبت نظر بايد وارد شويد.</p>
                        <button class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 px-7 py-2.5 rounded-lg text-sm"><a href=<?= href('login.php') ?> class="text-light" style="text-decoration: none;"><i class="bi bi-person-fill"></i> ورود</a></button>
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
            <div class="sm:p-0 md:p-16">
                <img src="./images/features/Taking notes-amico.png" alt="Not Dwon">
            </div>

        </div>
    </div>
</section>

<!-- نظرات کاربران  -->

<section class="mx-auto max-w-7xl px-6 lg:px-8">
    <h1 class="text-3xl text-indigo-900 my-12 moraba text__header relative max-w-max mx-auto z-1">نظرات کاربران</h1>
    <div class="mt-5 mb-3">
        <div class="w-10/12 mx-auto">
            <?php
            while ($rowChats = $chats->fetch_assoc()) {
                if ($rowChats['status'] == '1') {
            ?>

                    <div class="flex items-center justify-between my-2 flex-wrap">
                        <h5 class="text-lg font-bold tracking-tight text-indigo-800"><i class="bi bi-person-circle text-xl"></i> <?= $rowChats['email']; ?></h5>
                        <p class="font-normal text-indigo-900 my-4"><?= $rowChats['chat']; ?></p>
                        <p class="font-normal text-indigo-900 text-xs">تاریخ : <?= $rowChats['createdAt']; ?></p>
                    </div>
                    <hr>
            <?php
                }
            }
            ?>
        </div>
    </div>

</section>