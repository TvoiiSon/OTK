<?php
session_start();

if(!isset($_COOKIE["id"])) {
    $_SESSION["errMes"] = 'Вы не авторизованы, авторизуйтесь!';
    header("Location: ../login/index.php");
}
require_once("../db/db.php");

$id_user = $_COOKIE["id"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/dashboard/reset.css">
    <link rel="stylesheet" href="../styles/dashboard/style.css">
    <link rel="stylesheet" href="../styles/dashboard/media.css">
    <title>Главная</title>
</head>
<body>

    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 link-logo">
                    <a href="index.php"><img src="../images/dashboard/logo-sm.svg.svg"> Lorem</a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container-fluid main-content">
            <div class="row main-row">
                <div class="col-md-2 menu-wrapper">
                    <div class="left-menu">
                        <div class="menu">
                            <p>Menu</p>
                        </div>
                        <div class="main-page">
                            <a href="index.php">Главная</a>
                            <a href="create-product.php">Создать Заказ</a>
                            <a href="logout.php">Выйти</a>
                        </div>
                    </div>
                </div>
                <div class="col table">
                    <div class="my-info">
                        <div class="my-info-wrapper">
                            <div class="adoc-title">
                                <p>МОИ ДАННЫЕ</p>
                            </div>
                            <?php

                            $idadm = $_SESSION['iduser'];
                            $myinfo = mysqli_query($link, "SELECT * FROM `users` WHERE id = '$idadm'");
                            $myinfo = mysqli_fetch_assoc($myinfo);

                            ?>
                            <form action="vendor/update-profile.php" method="post">
                                <input type="hidden" name="id" value='<?php echo $myinfo['id']; ?>'>
                                <div class="text-field text-field_floating-2">
                                    <input class="text-field__input" type="text" id="fio" name="fio" placeholder="test" value='<?php echo $myinfo['fio']; ?>'>
                                    <label class="text-field__label" for="fio">ФИО</label>
                                </div>
                                <div class="text-field text-field_floating-2">
                                    <input class="text-field__input" type="text" id="phone" name="phone" placeholder="test" value='<?php echo $myinfo['phone']; ?>'>
                                    <label class="text-field__label" for="phone">Телефон</label>
                                </div>
                                <div class="text-field text-field_floating-2">
                                    <input class="text-field__input" type="text" id="email" name="email" placeholder="test" value='<?php echo $myinfo['email']; ?>'>
                                    <label class="text-field__label" for="email">E-Mail</label>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Сохранить">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>