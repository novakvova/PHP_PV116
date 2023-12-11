<?php include $_SERVER["DOCUMENT_ROOT"]."/edit_post.php"; ?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Додати</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/site.css">
</head>
<body>
<div class="container py-3">
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/_header.php";
    ?>

    <h1 class="text-center">Змінить категорію</h1>

    <form class="col-md-6 offset-md-3" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id; ?>" name="id"/>
        <div class="mb-3">
            <label for="name" class="form-label">Назва</label>
            <input type="text" class="form-control" name="name" id="name"
                   value="<?php echo $name ?>">
        </div>

        <div class="row">
            <div class="col-md-4">
                <img src="/images/<?php echo $image; ?>"
                     alt="Обране фото" width="100%">
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="image" class="form-label">Оберіть фото</label>
                    <input class="form-control" type="file" id="image" name="krot_image" accept="image/*">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Опис</label>
            <textarea class="form-control" name="description" id="description"><?php echo $description; ?></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Зберегти</button>
    </form>

</div>
<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>