<?php
require_once('./vendor/autoload.php');
try{
    $count = 20;
    $faker = \Faker\Factory::create();

    $pdo  = new PDO('mysql:host=localhost;dbname=images', 'root', '', array(
        PDO::ATTR_PERSISTENT => true
    ));
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    for ($i=0; $i < $count; $i++) {
        $name = $faker->words($nb = 2, $asText = true);
        $picsum_id = $faker->numberBetween($min = 0, $max = 1000);  
        $imagefile = str_replace(" ","_",$name).'.png';
        $json = file_get_contents('https://picsum.photos/id/'.$picsum_id.'/info');

        if($json == null){
            return;
        }else{
            $obiekt = json_decode($json);
            $author = $obiekt->author;
            $width = $obiekt->width;
            $height = $obiekt->height;
            $img_dw = $obiekt->download_url;
            file_put_contents('./images/'.$imagefile, file_get_contents($img_dw));
        }
        $added_at = date("Y-m-d H:i:s");
        
        $sql = 'INSERT INTO images (name, picsum_id, imagefile, author, width, height, added_at) 
        VALUES ("'.$name.'", "'.$picsum_id.'", "'.$imagefile.'", "'.$author.'", "'.$width.'", "'.$height.'", "'.$added_at.'")';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
} catch(Exception $e){
    echo '<pre>';print_r($e);echo '</pre>';exit;
}
?>
