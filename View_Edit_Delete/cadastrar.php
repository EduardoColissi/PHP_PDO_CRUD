<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Eduardo</title>
</head>

<body>
    <h1>Cadastrar Usuário</h1>
    <a href="index.php">Listar</a>
    <?php
    require './Conn.php';

    $Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    var_dump($Dados);
    if (!empty($Dados['SendCadUser'])) :
        unset($Dados['SendCadUser']);

        $conn = new Conn();

        $result_cadastrar = "INSERT INTO usuarios (nome, email, usuario, senha, created) VALUES (:nome, :email, :usuario, :senha, NOW())";
        $cadastrar = $conn->getConn()->prepare($result_cadastrar);

        $cadastrar->bindParam(':nome', $Dados['nome'], PDO::PARAM_STR);
        $cadastrar->bindParam(':email', $Dados['email'], PDO::PARAM_STR);
        $cadastrar->bindParam(':usuario', $Dados['usuario'], PDO::PARAM_STR);
        $cadastrar->bindParam(':senha', $Dados['senha'], PDO::PARAM_STR);

        $cadastrar->execute();

        if ($cadastrar->rowCount()) :
            $_SESSION['msg'] = "<p style='color:green;'>Registro cadastrado</p>";
            header("Location: index.php");
        endif;
    endif;
    ?>
    <form name="CadUsuario" action="" method="POST">
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Nome completo"><br><br>
        <label>Email: </label>
        <input type="email" name="email" placeholder="Email"><br><br>
        <label>Usuário: </label>
        <input type="text" name="usuario" placeholder="Usuário"><br><br>
        <label>Senha: </label>
        <input type="password" name="senha" placeholder="Senha"><br><br>

        <input type="submit" value="Cadastrar" name="SendCadUser">
    </form>
</body>

</html>