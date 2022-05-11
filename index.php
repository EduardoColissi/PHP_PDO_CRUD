<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>
        Eduardo
    </title>
</head>

<body>
    <?php
    require './Conn.php';

    $conn = new Conn();
    $conn->getConn();

    var_dump($conn);
    ?>
</body>

</html>