<!DOCTYPE html>
<html>
    <head>
        <title>Frankfurter Allgemeine</title>

        <link rel="stylesheet" type="text/css" href="style.css">

        <meta charset="UTF-8" />

        <style>
            form input{
                margin-top: 10px;
            }
        </style>
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
            <form action="registracija.php" method="POST" class="formLogin" enctype="multipart/form-data">
                <label for="ime">Ime: </label>
                <input type = "text" name = "ime" id="ime"/>
                <span id="porukaIme"></span><br>

                <label for="prezime">Prezime: </label>
                <input type = "text" name = "prezime" id="prezime"/>
                <span id="porukaPrezime"></span><br>

                <label for="korisnickoIme">Korisničko ime: </label>
                <input type = "text" name = "korisnickoIme" id="korisnickoIme"/>
                <span id="porukaKorisnickoIme"></span><br>

                <label for="lozinka">Lozinka: </label>
                <input type = "password" name = "lozinka" id="lozinka"/>
                <span id="porukaLozinka1"></span><br>

                <label for="lozinka2">Ponovite lozinku: </label>
                <input type = "password" name = "lozinka2" id="lozinka2"/>
                <span id="porukaLozinka2"></span><br><br>

                <span id="povratnaPoruka" style="color: red;"></span>
                <button type="submit" id="slanje" name="registracija" value="slanje">Registriraj se</button>
            </form>

            <script type="text/javascript">
                document.getElementById("slanje").onclick = function(event){                
                    var slanje_forme = true;

                    var poljeIme = document.getElementById("ime");
                    var ime = document.getElementById("ime").value;
                    if (ime.length == 0) {
                        slanje_forme = false;
                        poljeIme.style.border = "1px dashed red";
                        document.getElementById("porukaIme").innerHTML = "Unesite ime!";
                        porukaIme.style.color = "red";
                    };

                    var poljePrezime = document.getElementById("prezime");
                    var prezime = document.getElementById("prezime").value;
                    if (prezime.length == 0) {
                        slanje_forme = false;                    
                        poljePrezime.style.border = "1px dashed red"; 
                        document.getElementById("porukaPrezime").innerHTML = "Unesite Prezime!";
                        porukaPrezime.style.color = "red";
                    };
 
                    var poljeKorisnickoIme = document.getElementById("korisnickoIme");
                    var korisnickoIme = document.getElementById("korisnickoIme").value;
                    if (username.length == 0) {
                        slanje_forme = false;
                        poljeKorisnickoIme.style.border = "1px dashed red";
                        document.getElementById("porukaKorisnickoIme").innerHTML = "Unesite korisničko ime!";
                        porukaKorisnickoIme.style.color = "red";
                    };
                    
                    var poljeLozinka1 = document.getElementById("lozinka");
                    var lozinka1 = document.getElementById("lozinka").value;
                    var poljeLozinka2 = document.getElementById("lozinka2");
                    var lozinka2 = document.getElementById("lozinka2").value;
                    if (lozinka1.length == 0 || lozinka2.length == 0 || lozinka1 != lozinka2) {
                        slanje_forme = false;
                        poljeLozinka1.style.border="1px dashed red";
                        poljeLozinka2.style.border="1px dashed red";
                        document.getElementById("porukaLozinka1").innerHTML = "Lozinke nisu iste!";
                        porukaLozinka1.style.color = "red";
                        document.getElementById("porukaLozinka2").innerHTML = "Lozinke nisu iste!";
                        porukaLozinka2.style.color = "red";
                    };

                    if (slanje_forme != true) {
                        event.preventDefault();
                    };
                };
            </script>

            <?php 
                if(isset($_POST[''])){
                    $ime = $_POST['ime'];
                    $prezime = $_POST['prezime'];
                    $korisnickoIme = $_POST['korisnickoIme'];
                    $lozinka1 = $_POST['lozinka'];
                    $lozinka2 = $_POST['lozinka2'];
                    $razina = 0;

                    if($lozinka1 == $lozinka2){                
                        $hashLozinka = password_hash($lozinka1 , CRYPT_BLOWFISH);

                        include 'connect.php';

                        $sqlGet="SELECT korisnickoIme, lozinka FROM korisnik WHERE korisnickoIme = ?";

                        $stmtGet=mysqli_stmt_init($dbc);

                        if (mysqli_stmt_prepare($stmtGet, $sqlGet)){
                            mysqli_stmt_bind_param($stmtGet,'s', $korisnickoIme,);
                        
                            mysqli_stmt_execute($stmtGet);
                            mysqli_stmt_store_result($stmtGet);
                        };

                        mysqli_stmt_bind_result($stmtGet, $a, $b);
                        mysqli_stmt_fetch($stmtGet);
                        
                        if (mysqli_stmt_num_rows($stmtGet) > 0){
                            echo "<script type = 'text/javascript'>
                                document.getElementById('povratnaPoruka').innerHTML = 'Korisnicko ime je zauzeto!';
                            </script>";
                        }else{
                            $sqlInsert="INSERT INTO korisnik (ime, prezime, korisnickoIme, lozinka, razina) VALUES (?, ?, ?, ?, ?)";

                            $stmtInsert=mysqli_stmt_init($dbc);

                            if (mysqli_stmt_prepare($stmtInsert, $sqlInsert)){

                                mysqli_stmt_bind_param($stmtInsert,'ssssi', $ime, $prezime, $korisnickoIme, $hashLozinka, $razina);

                                mysqli_stmt_execute($stmtInsert);

                                echo '<script>alert("Uspješna registracija")</script>';
                            };
                        };

                    }else{
                        echo "<script type = 'text/javascript'>
                            document.getElementById('povratnaPoruka').innerHTML = 'Lozinke moraju biti iste!';
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