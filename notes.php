<?php

require_once("./configurations/conn.php");

if (!$isLogin) {
  home();
  exit;
}

// ? Get user 

$ID = get_id_header('id');

if ($ID) {
  $queryGetAllNotes = "SELECT * FROM note WHERE `uid` = '$ID' ";

  $allNotes = mysqli_query($conn, $queryGetAllNotes);

  if (!$allNotes) {
    # code...
    home();
    exit;
  }

  $queryGetCount = "SELECT COUNT(*) as `count` FROM note";

  $countAllNotes = mysqli_query($conn, $queryGetCount)->fetch_assoc();
}


function refresh()
{
  Locatoin('notes.php?id=' . get_session('id'));
}



// ? Start Actoin Query

if ($_SERVER["REQUEST_METHOD"] == "GET") {

  if (isset($_GET['remove']) != '') {

    $id_Remove = get_id_header('remove');

    $queryRemoveNote = "DELETE FROM note WHERE `id`='$id_Remove'";

    $resultNewNote = mysqli_query($conn, $queryRemoveNote);

    if ($resultNewNote) {
      refresh();
    }
  }

  //hearts

  if (isset($_GET['heart']) != '') {

    $id_Heart = get_id_header('heart');
    $statusNote = 'true';

    while ($note = $allNotes->fetch_assoc()) {
      if ($id_Heart == $note['id']) {
        $statusNote = ($note['status'] == 'false') ? 'true' : 'false';
      }
    }

    $queryChangeStatus = "UPDATE `note` SET `status`='$statusNote' WHERE `id`='$id_Heart' ";

    $resultStatus = mysqli_query($conn, $queryChangeStatus);


    if ($resultStatus) {
      refresh();
    }
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['delete-all'])) {
    $queryDeleteAllNotes = "DELETE FROM note WHERE `uid`='$ID'";

    $result = mysqli_query($conn, $queryDeleteAllNotes);

    if ($result) {
      refresh();
    }
  }

  if (isset($_POST['delete'])) {
    home();
  }
}

$countLovePage = 0;
$countNowPage = 0;
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link rel="stylesheet" href="./css/notes.css">
  <title>Hello / <?= get_session('uname') ?></title>
</head>

<body>
  <?php include_once('./includes/Navbar.php'); ?>
  <?php include_once('./includes/NoteCard.php'); ?>

  <center>
    <ul class="nav nav-pills nav-fill gap-2 p-1 small rounded-5 shadow bg-primary mt-5" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white); width:350px;">
      <li class="nav-item" role="presentation">
        <button class="nav-link rounded-5" id="love-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">علاقهمندي</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link active rounded-5" id="note-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">يادداشت</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link rounded-5" id="now-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">يادداشت امروز</button>
      </li>
    </ul>
  </center>


  <div class="container mt-5" id="note-page">
    <center>
      <div class="row g-4">
        <?php
        while ($note = $allNotes->fetch_assoc()) {
          noteCard($note, $ID);
        }
        ?>
      </div>
    </center>


    <?php
    if ($countAllNotes['count'] != '0') {
      counterNotes($countAllNotes['count']);
    } else {
    ?>
      <div class="alert alert-danger" role="alert">
        يادداشتي وجود ندارد.
      </div>
    <?php
    }
    ?>
  </div>

  <div class="container mt-5" id="love-page" hidden>
    <center>
      <div class="row g-4">
        <?php
        while ($note = $allNotes->fetch_assoc()) {
          if ($note['status'] == 'true') {

            noteCard($note, $ID);
            $countLovePage++;
          }
        }
        ?>
      </div>
    </center>
    <?php
    if ($countLovePage != 0) {
      counterNotes($countLovePage);
    } else {
    ?>
      <div class="alert alert-danger" role="alert">
        يادداشتي وجود ندارد.
      </div>
    <?php
    }
    ?>
  </div>

  <div class="container mt-5" id="now-page" hidden>
    <center>

      <div class="row g-4">
        <?php
        while ($note = $allNotes->fetch_assoc()) {
          if (substr($note['updateAt'], 0, 10) == $Today) {


            noteCard($note, $ID);
            $countNowPage++;
          }
        }
        ?>
      </div>

    </center>
    <?php
    if ($countNowPage != 0) {
      counterNotes($countNowPage);
    } else {
    ?>
      <div class="alert alert-primary" role="alert">
        امروز يادداشتي نداشتيد.
      </div>
    <?php
    }
    ?>
  </div>

  <div class="container mt-5">
    <div class="row align-items-center g-4">
      <div class="col-lg-6">
        <center><img src="https://img.freepik.com/premium-vector/programmer-working-concept-isolated-creation-development-software-programs-people-scene-flat-cartoon-design-vector-illustration-blogging-website-mobile-app-promotional-materials_9209-6543.jpg" alt="" class="img-fluid"></center>
      </div>
      <div class="col-lg-6 text-center">
        <center><input type="color" class="form-control form-control-color bg-light shadow" id="exampleColorInput" value="#563d7c" title="Choose your color"></center>
        <button class="btn btn-outline-info mt-4" id="btn-them"><i class="bi bi-brush-fill"></i> اعمال تم </button>
      </div>
    </div>
  </div>

  <section>
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 p-4">
          <form action="" class="form" method="post">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">ايميل:</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="emailChat">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">توضيحات:</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="chat"></textarea>
            </div>
            <button class="btn btn-lg btn-primary" name="sub-chat">ارسال <i class="bi bi-send-fill"></i></button>
          </form>
        </div>
        <div class="col-lg-6">
          <img src="https://img.freepik.com/free-vector/programmer-concept-illustration_114360-2417.jpg" alt="Not Dwon" class="img-fluid w-100" style="border-radius: 20px; height: 400px;">
          <div class="row">
            <div class="col-lg-6">
              <center>
                <div class="card shadow bg-light mt-4" style="width: 15rem;">
                  <div class="card-body" style="border: none;">
                    <h5 class="card-title text-primary"><i class="bi bi-telephone-fill"></i> تماس با ما</h5>
                    <p class="card-text text-muted">98-92223111258+</p>
                  </div>
                </div>
              </center>
            </div>
            <div class="col-lg-6">
              <center>
                <div class="card shadow bg-light mt-4" style="width: 18rem;">
                  <div class="card-body" style="border: none;">
                    <h5 class="card-title text-primary"><i class="bi bi-envelope-fill"></i> ايميل</h5>
                    <p class="card-text text-muted">sobhanmosazadeh85@yahoo.com</p>
                  </div>
                </div>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <?php include_once('./includes/footer.php'); ?>

  <a href="<?= href('notes-add.php');?>"><button class="btn btn-add btn-primary"><i class="bi bi-pencil-square"></i></button></a>
  <a href="<?= href('home.php');?>"><span class="badge bg-danger text-light fs-5 btn-exit"><i class="bi bi-house-fill" style="margin-right: -2px;"></i></span></a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="./js/main.js"></script>
  <script src="./js/notes.js"></script>

</body>

</html>