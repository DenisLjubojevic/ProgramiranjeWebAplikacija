<!DOCTYPE html>
<html>
    <head>
        <title>Frankfurter Allgemeine</title>
        
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body class="bodyMain">
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
                    
                    if(!isset($_SESSION['prijavljen'])){
                        $_SESSION['prijavljen'] = false;
                    }

                    if($_SESSION['prijavljen'] == false){
                        echo '
                        <form method = "POST">
                            <button type="submit" id="prijava" name="prijava" class="buttonInNav">Log in</button>
                        </form>
                        '; 
                    }else{
                        echo '
                        <form method = "POST">
                            <button type="submit" id="odjava" name="odjava" class="buttonInNav">Log out</button>
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

        <section class="sectionMain">
            <hr>
            <aside>
                <p class="povlakaAside"><br> POLITIK</p>
            </aside>

            <?php
                include 'connect.php';
                define('UPLPATH', 'images/');

                $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='politik' LIMIT 3";
                $result = mysqli_query($dbc, $query);
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                echo '<article class="articleMain">';
                echo    '<img src="' . UPLPATH . $row['slika'] . '">';
                echo    '<h1><a href="clanak.php?id='. $row['id'] .'"> ' . $row['naslov'] . '</a></h1>';
                echo    $row['sazetak'];
                echo    '<p>vor 2 Stunden <img src="images/starIcon.jpg"> 5</p>';
                echo '</article>';
                };
                
                mysqli_close($dbc);
            ?>
        </section>

        <section class="sectionMain">
            <hr>
            <aside>
                <p class="povlakaAside"><br> SPORT</p>
            </aside>

            <?php
                include 'connect.php';

                $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='sport' LIMIT 3";
                $result = mysqli_query($dbc, $query);
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                echo '<article class="articleMain">';
                echo    '<img src="' . UPLPATH . $row['slika'] . '">';
                echo    '<h1><a href="clanak.php?id='.$row['id'].'"> ' . $row['naslov'] . '</a></h1>';
                echo    $row['sazetak'];
                echo    '<p>vor 2 Stunden <img src="images/starIcon.jpg"> 5</p>';
                echo '</article>';
                };
                
                mysqli_close($dbc);
            ?>
        </section>

        <footer>
            <img src="images/Frankfurter_Allgemeine.png">
        </footer>
    </body>
</html>