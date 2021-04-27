<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Infos Suchen</title>
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

    </style>

  </head>
  <body>

    <h2>Suchen nach Infos</h2>
    <table class="tbl" border="1">
      <tr>
        <th>Title</th>
        <th>Aothor</th>
        <th>Verlag</th>
        <th>Preis</th>
        <th>Genre</th>
        <th>ISBN</th>
      </tr>

      <?php
          $conn = mysqli_connect("localhost", "root", "", "buchladen")
                or die ("Die Verbindung war nicht erfolgreich !");

          $such="";

          if (isset($_POST ["titl"])){
            $such = $_POST ["titl"];
            $anweisung = "SELECT * FROM buecher WHERE title LIKE  '%$such%'";
          }elseif(isset ($_POST ["auth"])){
            $such = $_POST ["auth"];
            $anweisung = "SELECT * FROM buecher WHERE author LIKE  '%$such%'";
          }elseif(isset ($_POST ["genr"])){
            $such = $_POST ["genr"];
            $anweisung = "SELECT * FROM buecher WHERE genre LIKE  '%$such%'";
          }

          $result = mysqli_query ( $conn, $anweisung);
          $anz= mysqli_num_rows($result);

          while ($dsatz = mysqli_fetch_assoc($result)) {

            echo "<tr>";
            echo "<td>". $dsatz["title"] . "</td>";
            echo "<td>". $dsatz["author"] . "</td>";
            echo "<td>". $dsatz["verlag"] . "</td>";
            echo "<td>". $dsatz["preis"] . "</td>";
            echo "<td>". $dsatz["genre"] . "</td>";
            echo "<td>". $dsatz["isbn"] . "</td>";
            echo "</tr>";
          }

          ECHO "<hr>";
          if ($anz > 0) {
            echo "<p style = 'color :green;'>Diese Datensätze gefunden </p>";
          } else{
            echo "<p style = 'color :red;'>Keine Datensätze gefunden</p>";

          }
          mysqli_close($conn);

      ?>
    </table>
    <hr>
    <a href="suche.php">Zuruek zur Suche</a><br>

  </body>
</html>
