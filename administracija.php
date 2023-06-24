<!DOCTYPE html>
<html>
    <head>
        <title>Frankfurter Allgemeine</title>
        
        <link rel="stylesheet" type="text/css" href="style.css">

    </head>

    <body>
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
                <section>
                    <?php
                        if($_SESSION['prijavljen'] == false){
                            header('Location: prijava.php');
                        }

                        include 'connect.php';  
                        define('UPLPATH', 'images/');

                        $query = "SELECT * FROM vijesti";
                        $result = mysqli_query($dbc, $query);

                        $i=0;
                        while($row = mysqli_fetch_array($result)) { 
                            $i = $i + 1;

                            echo '<form enctype="multipart/form-data" action="administracija.php" method="POST" class="formAdministracija">
                                    <div class="pomak">
                                        <label for="title">Naslov vjesti:</label>
                                        <div>
                                            <input type="text" name="title" value="'.$row['naslov'].'">
                                        </div>
                                    </div>
                                    <div class="pomak">
                                        <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
                                        <div>
                                            <textarea name="about" cols="30" rows="10">'.$row['sazetak'].'</textarea>
                                        </div>
                                    </div>
                                    <div class="pomak">
                                        <label for="content">Sadržaj vijesti:</label>
                                        <div>
                                            <textarea name="content" cols="30" rows="10">'.$row['tekst'].'</textarea>
                                        </div>
                                    </div>
                                    <div class="pomak">
                                        <label for="pphoto">Slika:</label>
                                        <div>
                                            <input type="file"id="pphoto" value="'.$row['slika'].'" name="pphoto"/> <br><img src="' . UPLPATH . 
                                            $row['slika'] . '" width=100px>
                                        </div>
                                    </div>
                                    <div class="pomak">
                                        <label for="category">Kategorija vijesti:</label>
                                        <div>
                                            <select name="category" value="'.$row['kategorija'].'">
                                                <option value="sport">Sport</option>
                                                <option value="politik">Politik</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="pomak">
                                        <label>Spremiti u arhivu: 
                                        <div>';
                                            if($row['arhiva'] == 0) {
                                                echo '<input type="checkbox" name="archive" id="archive"/> 
                                                Arhiviraj?';
                                            } else {
                                                echo '<input type="checkbox" name="archive" id="archive" 
                                                checked/> Arhiviraj?';
                                            }
                                            echo '</div>
                                            </label>
                                    </div>
                                    <div class="pomak">
                                        <input type="hidden" name="id" value="'.$row['id'].'">
                                        <button type="reset" value="Poništi">Poništi</button>
                                        <button type="submit" name="update" value="Prihvati">Izmjeni</button>
                                        <button type="submit" name="delete" value="Izbriši">Izbriši</button>
                                    </div>
                            </form>';

                            if($i % 2 == 0){
                                echo "<br>
                                    <div class=" . 'clear' . "></div>";
                            };
                        };

                        echo "<br> <div class=" . 'clear' . "></div>";
                    ?>
                </section>
            </div>

            <footer id="footer">
                <img src="images/Frankfurter_Allgemeine.png">
            </footer>
        </div>

        <?php
            if(isset($_POST['delete'])){
                $id=$_POST['id'];
                $query = "DELETE FROM vijesti WHERE id=$id ";
                $result = mysqli_query($dbc, $query);
            };
            
            if(isset($_POST['update'])){
                $picture = $_FILES['pphoto']['name'];
                $title=$_POST['title'];
                $about=$_POST['about'];
                $content=$_POST['content'];
                $category=$_POST['category'];
                
                if(isset($_POST['archive'])){
                    $archive=1;
                }else{
                    $archive=0;
                }
                $target_dir = 'images/'.$picture;
                move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
                $id=$_POST['id'];
                $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', slika='$picture', kategorija='$category', arhiva='$archive' 
                WHERE id=$id ";
                $result = mysqli_query($dbc, $query);
            };                

            mysqli_close($dbc);
        ?>
    </body>
</html>