<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Chamado</title>
    </head>

    <body>
        <form method="POST" action="">
            Cliente requisitante: <input type="text" name="nome_cliente" required> <br><br>
            Descrição do problema: <input type="text" name="descricao" required> <br><br>
            Criticidade: <select name="criticidade">
                <option value="alta"> Alta </option>
                <option value="media"> Média </option>
                <option value="baixa"> Baixa </option>
            </select> <br></br>
            Status: <select name="status">
                <option value="aberto"> Em aberto </option>
                <option value="andamento"> Em andamento </option>
                <option value="resolvido"> Resolvido </option>
            </select> <br></br>
            Data de abertura do chamado: <input type="date" name="data" required> <br></br>
            <input type="submit" value="Cadastrar">
        </form>

        <?php
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            echo "<p>Chamado cadastrado com sucesso!</p>";
        }
        ?>

        <a href="read.php"> Visualizar todos os registros </a>
    </body>
</html>

<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_cliente'];
    $descricao_problema = $_POST['descricao'];
    $criticidade = $_POST['criticidade'];
    $status = $_POST['status'];
    $data_abertura = $_POST['data'];

    $sql = "SELECT id FROM cliente WHERE nome = '$nome'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_cliente = $row['id'];
    } else {
        $sql = "INSERT INTO cliente (nome) VALUES ('$nome')";
        if ($conn->query($sql) === TRUE) {
            $id_cliente = $conn->insert_id; 
        } else {
            echo "Erro ao cadastrar cliente: " . $conn->error;
            exit;
        }
    }

    $sql = "INSERT INTO chamado (descricao_problema, criticidade, status, data_abertura, id_cliente) 
            VALUES ('$descricao_problema', '$criticidade', '$status', '$data_abertura', '$id_cliente')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ?success=1");
        exit;
    } else {
        echo "Erro ao cadastrar chamado: " . $conn->error;
    }
}
?>
