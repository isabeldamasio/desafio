<?php
    include '../db.php';
    $id = $_GET['id'];

    $sql = "DELETE FROM cliente WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente excluído com sucesso!";
    } else {
        echo "Deu ruim: " . $sql . "<br>" . $conn->error;
    }

    $conn -> close();
?>

<html>
    <br>
    <a href="read.php"> Visualizar todos os registros </a>
</html>