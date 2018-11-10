<?php 
    function minifyCSS($string){
        $string = preg_replace('!/\*.*?\*/!s','', $string);
        $string = preg_replace('/\n\s*\n/',"\n", $string);
        $string = preg_replace('/[\n\r \t]/',' ', $string);
        $string = preg_replace('/ +/',' ', $string);
        $string = preg_replace('/ ?([,:;{}]) ?/','$1',$string);
        $string = preg_replace('/;}/','}',$string);
        return $string;
    }
    function concatenateCSS($cssFiles){
    $css = '';
    foreach ($cssFiles as $cssFile){
        $css = $css . file_get_contents("$cssFile.css");
    }
    $css = minifyCSS($css);
    echo "<style>$css</style>";
    }
 ?>

 <!-- header içine yazacağınız kodlar aşağıdakilerdir -->

 <?php
      $stylesheets = array(
          "assets/css/bootstrap.min",
          "assets/css/style");
      concatenateCSS( $stylesheets );
    ?>
