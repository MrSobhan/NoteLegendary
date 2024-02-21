<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    function noteCard($note , $ID)
    {
    ?>
        <div class="col-lg-4">
            <div class="card shadow" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title" style="color: var(--var-them);"><?= substr($note['title'], 0, 22) ?></h5>
                    <p class="card-text"><?= substr($note['text'], 0, 100) ?>...</p>
                    <a href="<?= href('notes.php?id=' . $ID . '&remove=' . $note['id']) ?>" class="btn btn-outline-danger">حذف</a>
                    <a href="<?= href('note-update.php?id=' . $note['id']) ?>" class="btn btn-outline-primary">ويرايش</a>
                    <div class="div-card-h1"></div>
                    <div class="row mt-4 align-items-center">
                        <div class="col-6">
                            <h6 style="font-family: 'Kdam Thmor Pro', sans-serif; font-size: 13px;"><?= $note['updateAt'] ?></h6>
                        </div>
                        <div class="col-6">
                            <a href="<?= href('notes.php?id=' . $ID . '&heart=' . $note['id']) ?>"><button class="btn-heart"><i class="bi bi-heart-fill <?= $note['status'] == 'false' ? 'text-secondary-emphasis' : 'text-danger' ?>"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>


</body>

</html>