<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Datensatze-Änderung</title>
    <style media="screen">

      .container{
        display: flex;
        flex-direction: column;
        border-radius: 5px;
        border: 2px solid blue;
        width: 300px;
        margin-left: 5px;
        padding: 10px;
        background-color: #CAF4F4;
      }
    </style>
  </head>
  <body>
<h2> Buchlagen Datensatze-Änderung</h2>

<div class="container">

<form class="" action="#" method="post">
  <?php
      $isbnw = $_POST["isbnw"];
      $conn = mysqli_connect("localhost", "root", "", "buchladen")
            or die ("Die Verbindung war nicht erfolgreich !");

      $anweisung = "SELECT * FROM buecher WHERE isbn ='$isbnw'";
      $result = mysqli_query ( $conn, $anweisung);
      $dsatz = mysqli_fetch_assoc($result);

      $title= $dsatz["title"];
      $author= $dsatz["author"];
      $verlag= $dsatz["verlag"];
      $preis= $dsatz["preis"];
      $genre= $dsatz["genre"];
      $isbn= $dsatz["isbn"];

      echo "<p><input type='text' name = 'title' value = '$title'></p>";
      echo "<p><input type='text' name = 'author' value = '$author'></p>";
      echo "<p><input type='text' name = 'verlag' value = '$verlag'></p>";
      echo "<p><input type='text' name = 'preis' value = '$preis'></p>";
      echo "<p><input type='text' name = 'genre' value = '$genre'></p>";
      echo "<p><input type='text' name = 'isbn' value = '$isbn'></p>";

      echo "<input type='hidden' name = 'isbnw' value = '$isbnw'>";

   ?>
   <hr>
   <p><button value="andrn" name= "andrn">Ändern </button></p>
 </form>

 <?php
    if(isset($_POST["andrn"])){
             $title= $_POST["title"];
             $author= $_POST["author"];
             $verlag= $_POST["verlag"];
             $preis= $_POST["preis"];
             $genre= $_POST["genre"];
             $isbn= $_POST["isbn"];
             $isbnw= $_POST["isbnw"];

             $anweisung = "UPDATE  buecher SET
                                       title = '$title',
                                       author = '$author',
                                       verlag = '$verlag',
                                       preis = '$preis',
                                       genre = '$genre',
                                       isbn = '$isbn'

                                       WHERE isbn ='$isbnw'";

           $result = mysqli_query ( $conn, $anweisung);
           $anz= mysqli_Affected_rows($conn);

           ECHO "<hr>";
           if ($anz > 0) {
             echo "<p style = 'color :green;'>Der Datensatz geandert wurde </p>";
           } else{
             echo "<p style = 'color :red;'>Der Datensatz kann NICHT ändern</p>";

           }
      }
      mysqli_close($conn);

      ?>
    <hr>
    <a href="homepage.php">Zurück zur Homepage</a><br>
  </div>
  </body>
</html>
