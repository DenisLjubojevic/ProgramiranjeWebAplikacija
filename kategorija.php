<!DOCTYPE html>
<html>
    <head>
        <title>Frankfurter Allgemeine</title>
        
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body class="bodyMain">
    <div id="page-container">
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

            <div id="content-wrap">
                <section class="sectionKategorije">
                    <hr>
                    <aside>
                        <p class="povlakaAside"><br> <?php $kategorija = $_GET['id']; echo  $kategorija?> </p>
                    </aside>

                    <?php
                        include 'connect.php';
                        define('UPLPATH', 'images/');

                        $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='$kategorija'";
                        $result = mysqli_query($dbc, $query);
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                            $i = $i + 1;

                            if($i % 4 == 0){
                                echo "</section>
                                    <section class=" . 'sectionKategorije' . ">
                                    <aside>
                                        <p class=" . 'povlakaAside' . "></p>
                                    </aside>";
                            };
                            
                            echo '<article class="articleMain">';
                            echo    '<img src="' . UPLPATH . $row['slika'] . '">';
                            echo    '<h1><a href="clanak.php?id='. $row['id'] .'"> ' . $row['naslov'] . '</a></h1>';
                            echo    $row['sazetak'];
                            echo    '<p>vor 2 Stunden <img src="images/starIcon.jpg"> 5</p>';
                            echo '</article>';

                            if($i % 3 == 0){
                                echo "<br>
                                    <div class=" . 'clear' . "></div>";
                            };
                        };

                        echo "<br> <div class=" . 'clear' . "></div>";
                        
                        mysqli_close($dbc);
                    ?>
                </section>
            </div>

            <footer id="footer">
                <img src="images/Frankfurter_Allgemeine.png">
            </footer>
        </div>
    </body>
</html>