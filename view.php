<!DOCTYPE html>
<html lang="pl">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <title>Zdjęcie</title>
   </head>
   <body>
      <?php
        if (isset($_GET['id'])) {
            $strona = $_GET['id'];
        } else {
            header("Location: index.php?id=1");
        }

        $id = $_GET['id'];
        $nast_id = $id + 1;
        $pop_id = $id - 1;
         
        $mysqli = new mysqli("localhost","root", "", "images");
        $sql = "SELECT * FROM images where id = '$id'";
        $result = $mysqli->query($sql);
         
        $sql2 = "SELECT id FROM images ORDER BY id DESC LIMIT 1";
        $wynik = $mysqli->query($sql2);
         
        $max = $wynik->fetch_assoc();
        $max_id = $max['id'];
        $min_id = 1;
         
        if ($nast_id > $max_id) {
          $nast_id = $min_id;
        }  
        if ($pop_id < $min_id) {
          $pop_id = $max_id;
        }
         
        if ($result->num_rows > 0) { 
        ?>
        <div class="container mt-4">
        <?php while($row = $result->fetch_assoc()) { ?>
            <div class="row">
            <img src="./images/<?php echo $row['imagefile'] ?>" alt="<?php echo $row['imagefile'] ?>">
            <h3>Nazwa: <?php echo $row['name'] ?></h3>
            <p>Picsum id: <?php echo $row['picsum_id'] ?></p>
            <p>Wysokość: <?php echo $row['height'] ?></p>
            <p>Szerokość: <?php echo $row['width'] ?></p>
            <p>Data dodania: <?php echo $row['added_at'] ?></p>
            <button onclick="document.location='./index.php?strona=<?php echo $_GET['strona'] ?>'" class="button" id="butlogin">Strona Główna</button>
            <button onclick="location='view.php?id=<?php echo $nast_id; ?>'" class="button">Następne zdjęcie</button>
            <button onclick="location='view.php?id=<?php echo $pop_id; ?>'" class="button">Poprzednie zdjęcie</button>
        <?php } ?>
        </div>
        <?php } ?>
   </body>
</html>
