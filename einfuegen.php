<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Datensatz Einfügen</title>
  </head>
  <body>
    <h2>Buchladen Datensatz Einfügen</h2>

    <form class="" action="#" method="post">
      <p><input type="text" name = "title" value=""> Title</p>
      <p><input type='text' name = 'author' value ="">Author</p>
      <p><input type='text' name = 'verlag' value ="">Verlag</p>
      <p><input type='text' name = 'preis' value ="">Preis</p>
      <p><input type='text' name = 'genre' value ="">Genre</p>
      <p><input type='text' name = 'isbn' value ="">ISBN</p>

      <button name="sender">Einfügen</button>
    </form>

    <?php

    $conn = mysqli_connect("localhost", "root", "", "buchladen")
          or die ("Die Verbindung war nicht erfolgreich !");


      if (isset($_POST["sender"])) {

            $title= $_POST["title"];
            $author= $_POST["author"];
            $verlag= $_POST["verlag"];
            $preis= $_POST["preis"];
            $genre= $_POST["genre"];
            $isbn= $_POST["isbn"];

            $anweisung = "INSERT INTO buecher";
            $anweisung .=" VALUES('$title', '$author', '$verlag', '$preis', '$genre', '$isbn') ";

            mysqli_query ( $conn, $anweisung);
            $anz= mysqli_affected_rows($conn);

            ECHO "<hr>";
            if ($anz>0) {
              echo "<p style='color:green;'>Der Datensatz wurde erfolgreich eingefügt  </p>";

            }else{
              echo "<p style='color:red;'>Keine Datensätze eingefügt wurden </p>";

            }
            mysqli_close($conn);
      }

     ?>

    <hr>
    <a href="homepage.php">Zurück zur Homepage</a><br>
  </body>
</html>
