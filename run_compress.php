<?php
if( !defined('CMS_VERSION') ) exit;
if( !$this->CheckPermission(WebP::MANAGE_PERM) ) return;

$file_count = 0;
$path = realpath('/data/web/e26170/html/wd-leni/uploads');
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $filenames){
  $isPNG = false;
  $isJPG = false;
  if( strpos($filenames, '.jpg') > 0 || strpos($filenames, '.jpeg') > 0 || strpos($filenames, '.JPG') > 0 ){
      $isJPG = true;
  }else if( strpos($filenames, '.png') > 0 || strpos($filenames, '.PNG') > 0 ){
      $isPNG = true;
  }


  if( $isPNG === true || $isJPG === true ){

    $count = substr_count($filenames, '/');
    $filename = explode("/",$filenames);
    $path = "";
    $i = 0;
    while ($i < $count){
        $path = $path  .$filename[$i] . "/";
        $i++;
    }

    $savefile = $path  . $filename[$count];


    $file_size_bytes = filesize($filenames);
    if ($file_size_bytes > 300000){
      $img = imagecreatefromjpeg($filenames);   // load the image-to-be-saved
      // 50 is quality; change from 0 (worst quality,smaller file) - 100 (best quality)
      imagejpeg($img,$savefile,0);


      $file_count++;
    } elseif ($file_size_bytes > 250000){
      $img = imagecreatefromjpeg($filenames);   // load the image-to-be-saved
      // 50 is quality; change from 0 (worst quality,smaller file) - 100 (best quality)
      imagejpeg($img,$savefile,0);


      $file_count++;
    } elseif ($file_size_bytes > 200000){
      $img = imagecreatefromjpeg($filenames);   // load the image-to-be-saved
      // 50 is quality; change from 0 (worst quality,smaller file) - 100 (best quality)
      imagejpeg($img,$savefile,0);


      $file_count++;
    }

  }

}
echo "Habe " . $file_count . " Bilder erfolgreich komprimiert.";

?>
