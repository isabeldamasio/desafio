<?php
    include '../db.php';

    $sql = "SELECT * FROM chamado";
    $result = $conn -> query($sql);
?>

<?php if ($result -> num_rows > 0){ ?>

   
        <table border='1'>
        <tr>
            <th> ID </th>
            <th> Cliente requisitante </th>
            <th> Descrição do problema </th>
            <th> Criticidade </th>
            <th> Status </th>
            <th> Data de abertura do chamado </th>
        </tr>;



        <?php while ($row = $result -> fetch_assoc()){ ?>
        <tr>
            <td> <?php echo $row['id']; ?></td>
            <td> {$row['nome_cliente']} </td>
            <td> {$row['descricao']} </td>
            <td> {$row['criticidade']} </td>
            <td> {$row['status']} </td>
            <td> {$row['data']} </td>
            <td Ações>
                <a href='update.php?id={$row['id']}'>Editar</a>
                <a href='delete.php?id={$row['id']}'>Excluir</a>
            </td>
        </tr>;
        }
        echo "</table>";
    } else {
        echo "Nenhum registro encontrado.";
    }
    $conn -> close ();
?>
<a href="create.php"> Cadastrar novo chamado </a>