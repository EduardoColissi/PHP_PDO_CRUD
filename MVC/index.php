<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduardo</title>
</head>

<body>
    <?php
    require './vendor/autoload.php';
    require './app/sts/core/ConfigController.php';

    use Core\ConfigController as Home;

    $Url = new Home();
    $Url->carregar();
    ?>
</body>

</html>