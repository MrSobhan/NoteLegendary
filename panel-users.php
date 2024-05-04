<?php

require_once("./configurations/conn.php");

if (!$isLogin) {
  home();
  exit;
}




// ? Get All user for Admin panel

$queryGetAllUsers = "SELECT * FROM users";

$allUsers = mysqli_query($conn, $queryGetAllUsers);


$queryGetAllChats = "SELECT * FROM chats";

$allChats = mysqli_query($conn, $queryGetAllChats);

// ? Get user 

$ID = get_id_header('id');

// if ($ID) {

//   $queryGetUser = "SELECT * FROM `users` WHERE `id` = $ID";

//   $users = mysqli_query($conn, $queryGetUser);

//   $user = $users->fetch_assoc();
// }

function refresh()
{
  global $ID;
  Locatoin('panel-users.php?id=' . $ID);
}


// ? End All Query db 

// ? Start Actoin Query





if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submitUser'])) {
    global $conn;

    $name = valid($_POST['name']);
    $email = valid($_POST['email']);
    $phone = valid($_POST['phone']);


    set_session('uname', $name);

    $queryUpdateUser = "UPDATE `users` SET `username`='$name',`email`='$email', `phonenumber`='$phone' WHERE `id`= '$ID' ";

    $result = mysqli_query($conn, $queryUpdateUser);

    if ($result) {
      if ($isLogin) {
        refresh();
      }
    }
  }
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {
  //for btn remove chats
  if (isset($_GET['deletechats']) != null) {

    $id_remove = get_id_header('deletechats');
    $queryRemoveChats = "DELETE FROM chats WHERE `id`='$id_remove'";

    $resultRemoveChats = mysqli_query($conn, $queryRemoveChats);

    if ($resultRemoveChats) {
      refresh();
    }
  }

  //for btn ok status chats
  if (isset($_GET['changestatus']) != null) {

    $id_update = get_id_header('changestatus');
    $queryChangeStatus = "UPDATE `chats` SET `status`='1' WHERE id= '$id_update'";

    $resultChangeStatus = mysqli_query($conn, $queryChangeStatus);

    if ($resultChangeStatus) {
      refresh();
    }
  }
}

$page_type = 'panel';
include_once("./includes/header.php");
?>



<body>

  <?php include_once('./includes/Navbar.php'); ?>

  <div class="absolute inset-x-0 top-20 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
    <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
  </div>

  <section class="mx-auto max-w-7xl px-6 lg:px-8">
    <h1 class="moraba  text-2xl text-indigo-800 my-10"><?= get_session('uname'); ?> به پنل کاربری خوش آمدید <img src="https://raw.githubusercontent.com/Tarikul-Islam-Anik/Animated-Fluent-Emojis/master/Emojis/Hand%20gestures/Waving%20Hand%20Light%20Skin%20Tone.png" class="w-auto h-8 inline" alt=""></h1>
    <div class="container mt-5">
      <form action="" method="post">
        <?php
        while ($user = $allUsers->fetch_assoc()) {
          if ($ID == $user['id']) {
            $TypeUser = $user['type'];
        ?>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">نام شما:</label>
              <input type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2" id="exampleFormControlInput1" placeholder="سبحان" value="<?= $user['username'] ?>" name="name">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">ايميل شما:</label>
              <input type="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2" id="exampleFormControlInput1" placeholder="Sobhan@gmail.com" value="<?= $user['email'] ?>" name="email">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">شماره تلفن شما:</label>
              <input type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2" id="exampleFormControlInput1" placeholder="09128422739" value="<?= $user['phonenumber'] ?>" name="phone">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">نوع کاربری</label>
              <input type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2" id="exampleFormControlInput1" value="<?= $user['type'] == 'user' ? 'کاربر عادی' : 'کاربر ادمین' ?>" name="type" disabled>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">تاریخ عضویت</label>
              <input type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2" id="exampleFormControlInput1" value="<?= $user['createdAt']  ?>" name="dateCreate" disabled>
            </div>

            <div class="mt-4">
              <button class="flex w-[250px] mx-auto justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" name="submitUser"><i class="bi bi-pen"></i> ويراش</button>
            </div>
        <?php
          }
        }
        ?>
      </form>
    </div>
  </section>

  <section class="mx-auto max-w-7xl px-6 lg:px-8 mb-20">
    <?php
    if ($TypeUser == 'admin') {
    ?>
    <h1 class="moraba  text-2xl text-indigo-800 my-10">به پنل مدیریت خوش آمدید <img src="https://github.com/Tarikul-Islam-Anik/tarikul-islam-anik/raw/main/assets/images/Bar%20Chart.png" class="w-auto h-8 inline" alt=""></h1>
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">
                Id
              </th>
              <th scope="col" class="px-6 py-3">
                ايميل
              </th>
              <th scope="col" class="px-6 py-3">
                گفت و گو
              </th>
              <th scope="col" class="px-6 py-3">
                زمان انتشار
              </th>
              <th scope="col" class="px-6 py-3">
                وضعيت
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($chat = $allChats->fetch_assoc()) {
              if ($chat['status'] == 0) {
            ?>
                <tr class="bg-white border-b hover:bg-gray-50">
                  <td class="px-6 py-4"><?= $chat['id'] ?></td>
                  <td class="px-6 py-4"><?= $chat['email'] ?></td>
                  <td><?= $chat['chat'] ?></td>
                  <td class="px-6 py-4"><?= $chat['createdAt'] ?></td>
                  <td class="px-6 py-4">
                    <a href="<?= href('panel-users.php?id=' . $ID . '&deletechats=' . $chat['id']) ?>"><button class="text-indigo-800 text-xl"><i class="bi bi-x-circle"></i></button></a>
                    <a href="<?= href('panel-users.php?id=' . $ID . '&changestatus=' . $chat['id']) ?>"><button class="text-indigo-800 text-xl"><i class="bi bi-bookmark-check"></i></button></a>
                  </td>
                </tr>

            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    <?php
    }
    ?>

  </section>

  <?php include_once('./includes/footer.php'); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="./js/main.js"></script>
</body>

</html>