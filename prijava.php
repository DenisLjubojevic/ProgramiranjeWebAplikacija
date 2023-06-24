<!DOCTYPE html>
<html>
    <head>
        <title>Frankfurter Allgemeine</title>

        <link rel="stylesheet" type="text/css" href="style.css">

        <meta charset="UTF-8" />
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li>
                        <a href="index.php">HOME</a>
                    </li>
                    <li>
                        <a href="kategorija.php?id=politik">POLITIK</a>
                    </li>
                    <li>
                        <a href="kategorija.php?id=sport">SPORT</a>
                    </li>
                    <li>
                        <a href="unos.html">UNOS</a>
                    </li>
                    <li>
                       <a href="prijava.php">ADMINISTRACIJA</a>
                    </li>                    
                </ul>
                <?php
                    session_start();
                    
                    if($_SESSION['prijavljen'] == false){
                        echo '
                        <form method = "POST">
                            <button type="submit" id="prijava" name="prijava"  class="buttonInNav">Log in</button>
                        </form>
                        '; 
                    }else{
                        echo '
                        <form method = "POST">
                            <button type="submit" id="odjava" name="odjava"  class="buttonInNav">Log out</button>
                        </form>
                        '; 
                    };
                ?>
            </nav>
            <hr>
            <img src="images/Frankfurter_Allgemeine.png">
        </header>

        <?php
            if(isset($_POST['prijava'])){
                header('Location: prijava.php');
            };

            if(isset($_POST['odjava'])){
                $_SESSION['prijavljen'] = false;
                echo '<script>alert("Upravo ste se odjavili!")</script>';
                header("Refresh:0");
            };
        ?>

        <section>
            <?php
                if($_SESSION['prijavljen'] == true){
                    header('Location: administracija.php');
                }
            ?>

            <form action="" method="POST" class="formLogin">
                <label for="korisnickoIme">Korisničko ime: </label>
                <input type = "text" name = "korisnickoIme" id="korisnickoIme"/><br><br>

                <label for="lozinka">Lozinka: </label>
                <input type = "password" name = "lozinka" id="lozinka" require/><br><br>
                
                <button type="submit" id="gumb" name="prijavaUApp">Prijavi se</button><br><br>
                <span id="povratnaPoruka" style="color: red;"></span>
            </form>

            <?php 
                if(isset($_POST['prijavaUApp'])){
                    $korisnickoIme = $_POST['korisnickoIme'];
                    $lozinka = $_POST['lozinka'];
                    
                    include 'connect.php';

                    $hashLozinka = password_hash($lozinka , CRYPT_BLOWFISH);

                    $sqlGet="SELECT korisnickoIme, lozinka, razina FROM korisnik WHERE korisnickoIme = ?";

                    $stmtGet=mysqli_stmt_init($dbc);

                    if (mysqli_stmt_prepare($stmtGet, $sqlGet)){
                        mysqli_stmt_bind_param($stmtGet,'s', $korisnickoIme);
                    
                        mysqli_stmt_execute($stmtGet);
                        mysqli_stmt_store_result($stmtGet);
                    };

                    mysqli_stmt_bind_result($stmtGet, $nadjenoKorisnickoIme, $nadjenaLozinka, $nadjenaRazina);
                    mysqli_stmt_fetch($stmtGet);

                    if (mysqli_stmt_num_rows($stmtGet) > 0){
                        if(password_verify($lozinka, $nadjenaLozinka)){
                            if($nadjenaRazina == 0){
                                echo "<script type = 'text/javascript'>
                                    document.getElementById('povratnaPoruka').innerHTML = '" . $nadjenoKorisnickoIme . 
                                    ", nemate dovoljna prava za pristup ovoj stranici.';
                                </script>";
                            }else if($nadjenaRazina == 1){
                                $_SESSION['prijavljen'] = true;
                                header('Location: administracija.php');
                            };
                        }else{
                            echo "<script type = 'text/javascript'>
                                document.getElementById('povratnaPoruka').innerHTML = 'Pogrešna lozinka.';
                            </script>";
                        };
                    }else{
                        echo "<script type = 'text/javascript'>
                                document.getElementById('povratnaPoruka').innerHTML = 'Niste prijavljeni. Ukoliko se želite prijaviti stisnite <a href = " . "registracija.php" . ">ovdje</a>.';
                            </script>";
                    };
                };
            ?>
        </section>

        <footer>
            <img src="images/Frankfurter_Allgemeine.png">
        </footer>
    </body>
</html>