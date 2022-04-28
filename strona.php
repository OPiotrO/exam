<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost","root", "", "images");
$result_img = $mysqli->query("select name, picsum_id, imagefile, author, width, height, added_at from images");

$img = $result_img->fetch_all(MYSQLI_ASSOC);
?>
<html>
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Strona</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <?php
      echo '<div class="container">';
        for($i = 0; $i <= 1; $i++) {
        echo ' <div class="row">
        <div class="col">
          1 of 4
            </div>
              <div class="col">
                2 of 4
              </div>
              <div class="col">
                3 of 4
              </div>
              <div class="col">
                4 of 4
              </div>
            </div>
          </div>
          </div>';
        }
      echo '</div>
      </div>';
    ?>
  </body>
</html>