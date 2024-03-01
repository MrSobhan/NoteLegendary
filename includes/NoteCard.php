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
    function noteCard($note, $ID)
    {
    ?>
        <div class="max-w-sm mx-auto p-6 text-start bg-white rounded-lg shadow-lg mt-4 hover:scale-95 transition ease-in-out delay-150">
            <div class="flex justify-between items-center">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-indigo-800"><?= substr($note['title'], 0, 22) ?></h5>
                </a>
                <div class="flex justify-between items-center">
                    <a href=<?= href('notes-update.php?id=' . $note['id']) ?>><i class="bi bi-pencil-square text-indigo-600 cursor-pointer" title="ويرايش"></i></a>
                    <a href=<?=  href('notes.php?id=' . $ID . '&remove=' . $note['id']) ?> ><i class="bi bi-eraser-fill text-red-600 cursor-pointer ms-2" title="حذف"></i></a>

                    
                </div>
            </div>
            <p class="mb-3 font-normal"><?= substr($note['text'], 0, 150) ?>...</p>
            <div class="flex justify-between items-center mt-4">
                <a href="<?= href('notes.php?id=' . $ID . '&heart=' . $note['id']) ?>"><button><i class="bi bi-heart-fill <?= $note['status'] == 'false' ? 'text-indigo-800' : 'text-red-600' ?>"></i></button></a>
                <p class="text-gray-500"><?= $note['updateAt'] ?></p>
            </div>
        </div>

    <?php
    }
    ?>


</body>

</html>