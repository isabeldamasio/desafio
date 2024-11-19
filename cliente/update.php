<?php
    include '../db.php';

    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $sql = "UPDATE cliente SET nome='$nome', email='$email', telefone='$telefone' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Cadastro atualizado com sucesso!";
        } else {
            echo "Deu ruim: " . $sql . "<br>" . $conn->error;
        }
    }

    $sql = "SELECT * FROM cliente WHERE id='$id'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cadastro dos Clientes</title>
</head>
<body>
    
    <form method="POST" action=" update.php?id=<?php echo $row['id'];?>">
        <h1> Para atualizar os dados do cliente, insira: </h1>
        <label for="nome">Novo nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required><br>
        <label for="email">Novo email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        <label for="telefone">Novo telefone:</label>
        <input type="tel" name="telefone" value="<?php echo $row['telefone']; ?>" required><br>
        <input type="submit" value="Atualizar">
    </form>


    <a href="read.php"> Visualizar todos os registros </a>
</body>
</html>