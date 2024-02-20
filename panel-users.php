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
    $queryRemoveChats = "DELETE FROM chats WHERE id=$id_remove";

    $resultRemoveChats = mysqli_query($conn, $queryRemoveChats);

    if ($resultRemoveChats) {
      refresh();
    }
  }

  //for btn ok status chats
  if (isset($_GET['changestatus']) != null) {

    $id_update = get_id_header('changestatus');
    $queryChangeStatus = "UPDATE `chats` SET `status`='1' WHERE id= $id_update";

    $resultChangeStatus = mysqli_query($conn, $queryChangeStatus);

    if ($resultChangeStatus) {
      refresh();
    }
  }
}
?>


<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./css/panel-user.css">
  <title>Panel / <?= get_session('uname') ?></title>
</head>

<body>

  <?php include_once('./includes/Navbar.php'); ?>

  <section>
    <div class="container mt-5">
      <form action="" method="post">
        <?php
        while ($user = $allUsers->fetch_assoc()) {
          if ($ID == $user['id']) {
            $TypeUser = $user['type'];
        ?>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">نام شما:</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="سبحان" value="<?= $user['username'] ?>" name="name">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">ايميل شما:</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Sobhan@gmail.com" value="<?= $user['email'] ?>" name="email">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">شماره تلفن شما:</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="09128422739" value="<?= $user['phonenumber'] ?>" name="phone">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">نوع کاربری</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $user['type'] == 'user' ? 'کاربر عادی' : 'کاربر ادمین' ?>" name="type" disabled>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">تاریخ عضویت</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $user['createdAt']  ?>" name="dateCreate" disabled>
            </div>

            <div class="row align-items-center mt-4">
              <div class="col">
                <a href="<?= href('home.php'); ?>"><button class="btn btn-lg btn-outline-danger" type="button"><i class="bi bi-x-circle"></i> لغو</button></a>
                <button class="btn btn-lg btn-outline-primary" name="submitUser"><i class="bi bi-pen"></i> ويراش</button>
              </div>
          <?php
          }
        }
          ?>
      </form>
    </div>
  </section>

  <section>
    <?php
    if ($TypeUser != 'user') {
    ?>
      <h1 class="text-center text-primary mt-5">:) Hello Admin</h1>
      <div class="container-fluid mt-5">
        <table class="table table-responsiv border table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>ايميل</th>
              <th>گفت و گو</th>
              <th>زمان انتشار</th>
              <th>وضعيت</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($chat = $allChats->fetch_assoc()) {
              if ($chat['status'] == 0) {
            ?>
                <tr>
                  <td><?= $chat['id'] ?></td>
                  <td><?= $chat['email'] ?></td>
                  <td><?= $chat['chat'] ?></td>
                  <td><?= $chat['createdAt'] ?></td>
                  <td>
                    <a href="<?= href('panel-users.php?id=' . $ID . '&deletechats=' . $chat['id']) ?>"><button class="btn btn-outline-danger fs-5 "><i class="bi bi-x-circle"></i></button></a>
                    <a href="<?= href('panel-users.php?id=' . $ID . '&changestatus=' . $chat['id']) ?>"><button class="btn btn-outline-success  fs-5 "><i class="bi bi-bookmark-check"></i></button></a>
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