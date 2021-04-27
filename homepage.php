<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Buchladen Homepage</title>
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
      .operation{
        border-radius: 5px;
        border: 2px solid blue;
        width: 90px;
        margin-left: 5px;
        padding: 10px;
        background-color: #CAF4F4;
      }

      .container{
        display: flex;
        flex-direction: row;
      }

    </style>
  </head>
  <body>
    <h2>Wilcommen zur Buchladen Homepage</h2>

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

          $anweisung = "SELECT * FROM buecher";
          $result = mysqli_query ( $conn, $anweisung);
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

          mysqli_close($conn);

      ?>
    </table>
    <hr>
<div class="container">
  <div class="operation">
    <a href="suche.php">Suche</a><br>
  </div>
  <div class="operation">
    <a href="einfuegen.php">Eingugen</a><br>
  </div>

  <div class="operation">
    <a href="aendern01.php">Ändern</a><br>
  </div>

  <div class="operation">
    <a href="loeschen.php">Löschen</a><br>
  </div>

</div>
  </body>
</html>
