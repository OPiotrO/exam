<?php
require_once('./vendor/autoload.php');
try{
    $count = 5;
    $faker = \Faker\Factory::create();

    $pdo  = new PDO('mysql:host=localhost;dbname=images', 'root', '', array(
        PDO::ATTR_PERSISTENT => true
    ));
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    for ($i=0; $i < $count; $i++) {
        $name = $faker->words($nb = 2, $asText = true);
        $picsum_id = $faker->numberBetween($min = 0, $max = 1000);  
        $imagefile = str_replace(" ","_",$name).'.png';

        
        
        $author = $faker->randomDigit;
        $width = $faker->randomDigit;
        $height = $faker->randomDigit;
        $added_at = $faker->dateTime($max = 'now', 'UTC')->format('Y-m-d H:i:s');
        
        $sql = 'INSERT INTO images (name, picsum_id, imagefile, author, width, height, added_at) 
        VALUES ("'.$name.'", "'.$picsum_id.'", "'.$imagefile.'", "'.$author.'", "'.$width.'", "'.$height.'", "'.$added_at.'")';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
} catch(Exception $e){
    echo '<pre>';print_r($e);echo '</pre>';exit;
}
?>