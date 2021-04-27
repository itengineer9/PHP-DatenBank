<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Datensatz loschen</title>
    <style media="screen">

    .tbl {
      border: 1px;
      border-collapse: collapse;
      border-width: thick;
      border-color: blue;
    }
      td, th{
        align: center;
      }

      .container{
        display: flex;
        flex-direction: column;
        border-radius: 5px;
        border: 2px solid blue;
        width: 500px;
        margin-left: 5px;
        padding: 10px;
        background-color: #CAF4F4;
      }

    </style>
  </head>
  <body>
    <h2>Buchladen Datensatz loschen</h2>

    <div class="container">

    <form class="" action="#" method="post">

    <table class="tbl" border="1">
      <tr>
        <th>Title</th>
        <th>Aothor</th>
        <th>Verlag</th>
        <th>Preis</th>
        <th>Genre</th>
        <th>ISBN</th>
        <th>Auswahl</th>
      </tr>

      <?php
          $conn = mysqli_connect("localhost", "root", "", "buchladen")
            or die ("Die Verbindung war nicht erfolgreich !");

              $anweisung = "SELECT * FROM buecher";
              $result = mysqli_query ( $conn, $anweisung);
              while ($dsatz = mysqli_fetch_assoc($result)) {
                $isbnw =$dsatz["isbn"];
                echo "<tr>";
                echo "<td>". $dsatz["title"] . "</td>";
                echo "<td>". $dsatz["author"] . "</td>";
                echo "<td>". $dsatz["verlag"] . "</td>";
                echo "<td>". $dsatz["preis"] . "</td>";
                echo "<td>". $dsatz["genre"] . "</td>";
                echo "<td>". $dsatz["isbn"] . "</td>";
                echo "<td align = 'center'>
                      <input type='radio' name = 'isbnw' value = '$isbnw' checked>
                      </td>";
                echo "</tr>";
              }

            ?>
      </table>
      <p><button name="losch">Dantensatz loschen</button></p>
    </form>

    <?php
      if(isset($_POST["losch"])){
        $isbnw = $_POST["isbnw"];
        $conn = mysqli_connect("localhost", "root", "", "buchladen")
          or die ("Die Verbindung war nicht erfolgreich !");

        $anweisung = "DELETE FROM buecher WHERE isbn ='$isbnw'";
        $result = mysqli_query ( $conn, $anweisung);
        $anz= mysqli_affected_rows($conn);

        ECHO "<hr>";

        if ($anz > 0) {
          echo "<p style = 'color :green;'>Der Datensatz gelöscht wurde </p>";
        } else{
          echo "<p style = 'color :red;'>Der Datensatz kann NICHT löschen</p>";

        }
      }
      mysqli_close($conn);
     ?>
     <br>
     <a href="homepage.php">Zurück zur Homepage</a><br>
   </div>
  </body>
</html>
