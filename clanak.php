<!DOCTYPE html>
<html>
    <head>
        <?php
            $rowId = $_GET['id'];
            include 'connect.php';
            define('UPLPATH', 'images/');

            $query = "SELECT * FROM vijesti WHERE id = $rowId";
            $result = mysqli_query($dbc, $query);
            $row = mysqli_fetch_array($result);
        ?>

        <title><?php echo $row['naslov'] ?></title>
        
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <header class="articleHeader">
            <nav role="navigation">
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
                    <?php
                        echo $row['naslov'];
                    ?>
                </h1>
                <p class="gray">AKTUALISIERT AM <?php echo "<span>".$row['datum']."</span>"; ?></p>
            </div>
            <?php
                echo '<img src="' . UPLPATH . $row['slika'] . '">';
            ?>

            <div>
                <h2>
                    <?php
                        echo "<i>".$row['sazetak']."</i>";
                    ?>
                </h2>
                <p>
                    <?php
                        echo $row['tekst'];
                    ?>
                </p>
            </div>
        </article>
        

        <footer>
            <img src="images/Frankfurter_Allgemeine.png">
        </footer>
    </body>
</html>