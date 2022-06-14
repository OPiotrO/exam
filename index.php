<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost","root", "", "images");
    
    if (isset($_GET['strona'])) {
        $strona = $_GET['strona'];
    } else {
        header("Location: index.php?strona=1");
    }

    $rekordy = 8;
    $liczba = ($strona-1) * $rekordy;
    $strony_sql = "SELECT COUNT(*) FROM images";
    $wynik = mysqli_query($mysqli,$strony_sql);
    $wiersze = mysqli_fetch_array($wynik)[0];
    $strony = ceil($wiersze / $rekordy);
    $nast_str = $strona + 1;
    $pop_str = $strona - 1;
    
    $sql = "SELECT * FROM images LIMIT $liczba, $rekordy";
    $wynik2= $mysqli->query($sql);
            
    if ($wynik2->num_rows > 0) {
?>
<html>
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>strona</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-4">
      <h1>Strona: <?php echo $_GET['strona']; ?></h1>
      <div class="row">
      <?php while($row = $wynik2->fetch_assoc()) { ?>
        <div class="col-sm-3 mt-4 ">
          <img class="card-img-top" src="./images/<?php echo $row["imagefile"] ?>" alt="<?php echo $row["imagefile"] ?>">
          <p class="card-text">Autor: <?php echo $row['author'] ?></p>
          <p class="card-text">Nazwa: <?php echo $row['name'] ?></p>
          <input type="submit" value="Więcej" form="<?php echo $row['id'] ?>">
          <form action="./view.php" id="<?php echo $row['id'] ?>" method="get">
              <input type="hidden" name="strona" value="<?php echo $_GET['strona'] ?>" form="<?php echo $row['id'] ?>">
              <input type="hidden" name="id" value="<?php echo $row['id'] ?>" form="<?php echo $row['id'] ?>">
          </form>
        </div>
      <?php } ?>
      </div>
    </div>
    <div class="container d-flex justify-content-center">
         <div class="m-2">
            <button onclick="location='?strona=1'" class="button" > Pierwsza  strona</button>
         </div>
         <div class="m-2">
            <button onclick="location='<?php if($strona <= 1){ echo '#'; } else { echo '?strona='.($pop_str); } ?>'" class="button"> Poprzednia strona</button>
         </div>
         <div class="m-2">
            <button onclick="location='<?php if($strona >= $strony){ echo '#'; } else { echo '?strona='.($nast_str); } ?>'" class="button"> Następna  strona</button>
         </div>
         <div class="m-2">
            <button onclick="location='?strona=<?php echo $strony; ?>'" class="button"> Ostatnia  strona</button>
         </div>
      </div>
      <?php } ?>
  </body>
</html>
