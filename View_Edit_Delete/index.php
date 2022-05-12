<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Eduardo</title>
</head>

<body>
    <h1>Listar usuários</h1>
    <a href="cadastrar.php">Cadastrar</a>
    <?php
    if (isset($_SESSION['msg'])) :
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;

    require './Conn.php';

    $conn = new Conn();
    $result_user = "SELECT * FROM usuarios";

    $resultado_user = $conn->getConn()->prepare($result_user);
    $resultado_user->execute();

    while ($row_user = $resultado_user->fetch(PDO::FETCH_ASSOC)) :
        echo "ID: " . $row_user['id'] . "<br>";
        echo "Nome: " . $row_user['nome'] . "<br>";
        echo "Email: " . $row_user['email'] . "<br>";
        echo "Usuário: " . $row_user['usuario'] . "<br>";
        echo "Cadastrado: " . date('d/m/Y H:i:s', strtotime($row_user['created'])) . "<br>";
        if (!empty($row_user['modified'])) :
            echo "Alterado: " . date('d/m/Y H:i:s', strtotime($row_user['modified'])) . "<br>";
        endif;
        echo "<a href='visualizar.php?id=" . $row_user['id'] . "'>Ver</a>";
        echo "<a href='editar.php?id=" . $row_user['id'] . "'>Editar</a>";
        echo "<a href='apagar.php?id=" . $row_user['id'] . "'>Apagar</a>";
        echo "<hr>";
    endwhile;
    ?>
</body>

</html>