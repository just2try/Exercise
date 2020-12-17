<?php

    $path = "./img/gallery";

    function gallery($path){

        if(substr($path,-1) !== "/"){               // Prüfen, ob am ende des Pfades ein "/" ist. Wenn nicht -> anhängen
            $path .= "/";
        }

        $dir = scandir($path);              // übergebenen Ordnerpfad durchsuchen (Ergebnis = Array mit Inhalten)
        $dir = array_slice($dir, 2);        // "." u. ".." aus Array-Inhalt entfernen
        
        foreach($dir as $value){
            
            // echo var_dump($path.$value)."<br>";

            $filename = pathinfo($path.$value, PATHINFO_FILENAME);
            $folder = pathinfo($path.$value, PATHINFO_BASENAME);
            $dir_link = $path.$value;
            
            if(is_file($dir_link) && preg_match('/.gif|.jpg|.png/',$dir_link)){
                echo "<a class='flexelement' href='$dir_link' data-lightbox='$folder' data-title='$filename'>
                        <img src='$dir_link' alt='$filename' title='$folder - $filename'>
                     </a>
                ";
                
            } elseif(is_dir($dir_link)){

                gallery($dir_link);
            }       
            
        }


    };

gallery($path);

?>