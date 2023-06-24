<!DOCTYPE html>
<html>
    <head>
        <title>Frankfurter Allgemeine</title>
        
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <?php
            $title = $_POST["title"];
            $kratkiSadrzaj = $_POST["kratkiSadrzaj"];
            $sadrzaj = $_POST["sadrzaj"];
            $slika = $_FILES["slika"]["name"];
            $kategorija = $_POST["kategorija"];
            $datum = date("d.m.Y");

            include 'unos.php';
        ?>
        <header class="articleHeader">
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
            <br><br></gr><hr>
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
        
        <article class="articleVijest">
            <div>
                <h1>
                    <?php echo $title ?> 
                </h1>
                <p class="gray">AKTUALISIERT AM <?php echo "$datum"?></p>
            </div>
            <?php echo "<img src='images/$slika'>" ?>
            <div>
                <h2>
                    <?php echo $kratkiSadrzaj ?> 
                </h2>
                <p>
                    <?php echo $sadrzaj ?> 
                </p>
            </div>
        </article>
        

        <footer>
            <img src="images/Frankfurter_Allgemeine.png">
        </footer>
    </body>
</html>