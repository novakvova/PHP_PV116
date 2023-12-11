<?php
global $pdo;
$name = "";
$description = "";
$image = "";
$id = 0;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    include $_SERVER['DOCUMENT_ROOT'] . "/config/connection_database.php";
    // Prepare the SQL query
    $stmt = $pdo->prepare("SELECT id, name, image, description FROM categories WHERE id = :id");
    // Bind the parameter
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    // Execute the query
    $stmt->execute();
    // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $name = $result['name'];
        $image = $result['image'];
        $description = $result['description'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include $_SERVER['DOCUMENT_ROOT'] . "/config/connection_database.php";
    $name = $_POST["name"];
    $image_name = $image;
    if (isset($_FILES["krot_image"])&& $_FILES["krot_image"]["size"]!=0) {
        $dir = "images";
        $image_name = uniqid() . "." . pathinfo($_FILES["krot_image"]["name"], PATHINFO_EXTENSION);
        $dir_save = $_SERVER["DOCUMENT_ROOT"] . "/" . $dir . "/" . $image_name;
        if(move_uploaded_file($_FILES["krot_image"]["tmp_name"], $dir_save))
            unlink($_SERVER["DOCUMENT_ROOT"]."/images/".$image);  //видаляємо попередню фотку
    }
    $description = $_POST["description"];
    //echo "$name $image $description\n";
    // Insert query
    $sql = "Update categories SET name=?, image=?, description=? WHERE id=?";
    $stmt = $pdo->prepare($sql);

    // Execute the query with the data
    $stmt->execute([$name, $image_name, $description, $id]);
    header("Location: /");
    exit;
}

?>