<!DOCTYPE html>
<html>
    <head>
        <title>Frankfurter Allgemeine</title>
        
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <?php 
            include 'connect.php';

            $picture = $_FILES["slika"]["name"];
            $tempname = $_FILES["slika"]["tmp_name"];
            
            $title = $_POST["title"];
            $about = $_POST["kratkiSadrzaj"];
            $content = $_POST["sadrzaj"];
            $category = $_POST["kategorija"];
            $date = date('d.m.Y.');

            if(isset($_POST["odabirSpremanja"])){
                $archive=1;
            } else{
                $archive=0;
            }

            move_uploaded_file($tempname, "images/" . $picture);

            $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES 
            ('$date', '$title', '$about', '$content', '$picture', '$category', '$archive')";
            $result = mysqli_query($dbc, $query) or die('Error querying databese.');

            mysqli_close($dbc);
        ?>
    </body>
</html>