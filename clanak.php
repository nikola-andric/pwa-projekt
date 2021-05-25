<?php

    include 'connect.php';
    session_start();

if (isset($_GET['id']))
{
    $id = $_GET['id'];
}

    // UPIT NA BAZU //

    $query = "SELECT * FROM `vijesti` WHERE id=$id";
    $result = mysqli_query ($veza,$query);

    $red = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>PWA</title>
    <meta charset="UTF-8"/>
    <meta name="author" content="Nikola Andric"/>
    <meta http-equiv="content-language" content="hr"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="icon" href="img/stern-logo-fav.png" type="image/x-icon">
</head>
<body>
    <header>
        <div id="center">
            <nav>
                <ul>
                    <li><a href="index.php"><img src="img/stern-logo.png"></a></li>
                    <li class="lista_polozaj"><a href="index.php">Početna</a></li>
                    <li class="lista_polozaj"><a href="vijesti.php">Vijesti</a></li>
                    <li class="lista_polozaj"><a href="unos.php">Unos</a></li>
                    <li class="lista_polozaj"><a href="administracija.php">Administracija</a></li>
                </ul>
                <ul id="prijava_registracija">
                    <?php
                        if (isset($_SESSION['username']))
                        {
                            echo '
                                <li><a href="">' .$_SESSION['username']. '</a></li>
                                <li><a href="logout.php">Odjava</a></li>
                            ';
                        }
                        else
                        {
                            echo '
                                <li><a href="login.php">Prijava</a></li>
                                <li><a href="register.php">Registracija</a></li>
                            ';
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
    <main id="skripta">
            <h2>
                <?php
                    echo $red['kategorija'];
                ?>
            </h2>
            <h3>
                <?php
                    echo $red['naslov'];
                ?>
            </h3>
            <p>OBJAVLJENO:
                <?php
                    echo date('d-m-Y H:i:s',strtotime($red['vrijeme']));
                ?>
            </p>
            <?php
                echo '<img src="img/' .$red['slika']. '">';
            ?>
            <p>
                <?php
                    echo $red['kratki_sadrzaj'];
                ?>
            </p>
            <p>
                <?php
                    echo $red['sadrzaj'];
                ?>
            </p>
    </main>
</body>
</html>

<?php

    // ODSPAJANJE SA BAZE //

    mysqli_close ($veza);

?>