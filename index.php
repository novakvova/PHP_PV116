<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Головна сторінка</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/site.css">
</head>
<body>
<div class="container">
    <?php include("_header.php"); ?>

    <h1 class="text-center">Категорії</h1>
    <?php
    $n=2;
    $list = array();
    $list[0] = [
        "id"=>1,
        "name"=>"Піжами",
        "image"=>"https://content1.rozetka.com.ua/goods/images/big/377606241.jpg"
    ];
    $list[1] = [
        "id"=>2,
        "name"=>"Шорти",
        "image"=>"https://content1.rozetka.com.ua/goods/images/big/318293701.jpg"
    ];
    ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Фото</th>
            <th scope="col">Назва</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php for($i=0;$i<$n;$i++) { ?>
        <tr>
            <th scope="row"><?php echo $list[$i]["id"]; ?></th>
            <td>
                <img src="<?php echo $list[$i]["image"]; ?>"
                     height="75"
                     alt="Фото">
            </td>
            <td>
                <?php echo $list[$i]["name"]; ?>
            </td>
            <td>
                <a href="#" class="btn btn-info">Переглянути</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
