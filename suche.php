<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Suche nach Infos</title>
    <style media="screen">

      .container{
        display: flex;
        flex-direction: column;
        border-radius: 5px;
        border: 2px solid blue;
        width: 400px;
        margin-left: 5px;
        padding: 10px;
        background-color: #CAF4F4;
      }
    </style>
  </head>
  <body>
    <h2>Suchenach Buch-Infos</h2>
<div class="container">
    <form class="" action="infoSuche.php" method="post">
      <input type="text" name="titl" value="">
      <button >Suche nach Buch-Title</button>
    </form>
    <hr>
    <form class="" action="infoSuche.php" method="post">
      <input type="text" name="auth" value="">
      <button >Suche nach Buch-Author</button>
    </form>
    <hr>
    <form  action="infoSuche.php" method="post">
      <?php
        $conn = mysqli_connect("localhost", "root", "", "buchladen")
              or die ("Die Verbindung war nicht erfolgreich !");

          $anweisung = "SELECT DISTINCT genre FROM buecher  ORDER BY genre";

          $result = mysqli_query ( $conn, $anweisung);
          echo "<select name='genr'>";
              while ($dsatz = mysqli_fetch_assoc($result)) {
                echo "<option>".$dsatz["genre"]. "</option>";
                }
          echo "</select>";

          mysqli_close($conn);
        ?>
   <button >Suche nach Buch-Genre</button>

    </form>
    <hr>
    <a href="homepage.php">Zurück zur Homepage</a><br>
  </div>
  </body>
</html>
