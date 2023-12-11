<?php global $pdo; ?>
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
    <?php include("_header.php");
    include $_SERVER['DOCUMENT_ROOT'] . "/config/connection_database.php";
    ?>

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
        <?php
        // Select query
        $sql = "SELECT id, name, image, description FROM categories";
        $stmt = $pdo->query($sql);

        // Fetch the results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Output the results
        foreach ($results as $row) {

        ?>
        <tr>
            <th scope="row"><?php echo $row["id"]; ?></th>
            <td>
                <img src="/images/<?php echo $row["image"]; ?>"
                     height="75"
                     alt="Фото">
            </td>
            <td>
                <?php echo $row["name"]; ?>
            </td>
            <td>
                <a href="#" class="btn btn-info" data-delete="<?php echo $row["id"]; ?>">Видалить</a>
                <a href="/edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-dark">Змінить</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="modalDelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ви дійсно впевнені?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ви бажаєте видалить запис</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Скасувать</button>
                <button type="button" class="btn btn-danger" id="btnDeleteConfirm">Видалить</button>
                <!-- Additional buttons if needed -->
            </div>
        </div>
    </div>
</div>


<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/axios.min.js"></script>
<script>
    var myModal = new bootstrap.Modal(document.getElementById('modalDelete'));
    let id=0;
    const list = document.querySelectorAll('[data-delete]');
    //console.log("List elements", list);
    // Convert NodeList to an array (optional)
    const elementsArray = Array.from(list);
    // Log the elements or perform further operations
    elementsArray.forEach(item => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            id=e.target.dataset.delete;

            myModal.show();
            //axios.post("");
            //console.log("delete item", id);
            //e.target.closest("tr").remove();
        });
        //console.log("item", item);
    });
    document.getElementById("btnDeleteConfirm").addEventListener("click", () => {
        console.log("delete id", id);
        var item = document.querySelector('[data-delete="'+id+'"]');
        console.log("Delete item link",item);
        myModal.hide();
    });
</script>
</body>
</html>
