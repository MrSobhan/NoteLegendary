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

$page_type = 'notes';
include_once("./includes/header.php");
?>


<body>
  <?php include_once('./includes/Navbar.php'); ?>
  <?php include_once('./includes/NoteCard.php'); ?>


  <ul class="bg-indigo-800 rounded-full mx-auto h-10 text-white p-1 grid grid-cols-3 justify-evenly w-[340px] text-xs my-10">
    <li class="nav-item flex__center rounded-full">
      <button class="nav-link" page="love-page">علاقهمندي</button>
    </li>
    <li class="nav-item flex__center active-link rounded-full">
      <button class="nav-link" page="note-page">يادداشت</button>
    </li>
    <li class="nav-item flex__center rounded-full">
      <button class="nav-link" page="now-page">يادداشت امروز</button>
    </li>
  </ul>

  <section class="mx-auto max-w-7xl px-6 lg:px-8">

    <div class="container content-note mt-5" id="note-page">
      <center>
        <div class="row g-4">
          <?php
          while ($note = $allNotes->fetch_assoc()) {
            noteCard($note, $ID);
          }
          $allNotes->data_seek(0);
          ?>
        </div>
      </center>


      <?php
      if ($countAllNotes['count'] != '0') {
        counterNotes($countAllNotes['count']);
      } else {
        alertNotNotes();
      }
      ?>
    </div>

    <div class="container content-note mt-5" id="love-page" hidden>
      <center>
        <div class="row g-4">
          <?php
          while ($note = $allNotes->fetch_assoc()) {
            if ($note['status'] == 'true') {

              noteCard($note, $ID);
              $countLovePage++;
            }
          }
          $allNotes->data_seek(0);
          ?>
        </div>
      </center>
      <?php
      if ($countLovePage != 0) {
        counterNotes($countLovePage);
      } else {
        alertNotNotes();
      }
      ?>
    </div>

    <div class="container content-note mt-5" id="now-page" hidden>
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
        alertNotNotes();
      }
      ?>
    </div>

  </section>

  <?php include_once('./includes/comments.php'); ?>
  <?php include_once('./includes/footer.php'); ?>

  <!-- <a href="<?= href('notes-add.php'); ?>"><button class="btn btn-add btn-primary"><i class="bi bi-pencil-square"></i></button></a>
  <a href="<?= href('home.php'); ?>"><span class="badge bg-danger text-light fs-5 btn-exit"><i class="bi bi-house-fill" style="margin-right: -2px;"></i></span></a> -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="./js/main.js"></script>
  <script src="./js/notes.js"></script>

</body>

</html>