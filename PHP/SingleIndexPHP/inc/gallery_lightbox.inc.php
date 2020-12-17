<?php
    
    include_once 'config.inc.php';
    // $gallery_path = $_SERVER['url'] . "img/gallery";
    $gallery_path = "../img/gallery";

    

function scan_ordner($path) {

    if(substr($path,-1) !== "/"){
        $path .= "/";
    }
    $dir = scandir($path);              // Array 
    $dir = array_slice($dir, 2);        // "." u. ".." aus Array-inhalt entfernen
    
    foreach ($dir as $value){
        $dir1 = $path.$value;
        
        if (is_file($dir1) && preg_match('/.gif|.jpg|.png/',$dir1)){
            
            $filename = pathinfo($path, PATHINFO_FILENAME);  
            $folder = pathinfo($path, PATHINFO_BASENAME);    
            $dirname = pathinfo($path, PATHINFO_DIRNAME);

            echo "
            <div id='$value'>
            <a class='flexelement' href='$dir1' data-lightbox='$folder' data-title='$filename'>
                <img src='$dir1' alt='$filename' title='$folder - $filename'>
            
        ";
            
        } elseif (is_dir($dir1)){
            
            
            $filename = pathinfo($dir1, PATHINFO_FILENAME);  
            $folder = pathinfo($dir1, PATHINFO_BASENAME);    
            $dirname = pathinfo($dir1, PATHINFO_DIRNAME);
            
            echo "<div id='$value'>";
            
            // scan_ordner($dir1);

            if(substr($dir1,-1) !== "/"){
                    $path.$value .= "/";                        //? warum klappt rename in $dir nicht?
                }
                $subdir = scandir($dir1);                        // $dir = $path.$value
                $subdir = array_slice($subdir, 2);
                
                foreach ($subdir as $subvalue){
                        $dir2 = $path.$value.$subvalue;
                    
                        if(is_file($dir2) && preg_match('/.gif|.jpg|.png/',$dir2)){
                                $filename = pathinfo($dir2, PATHINFO_FILENAME);
                                $filename = ucfirst($filename);
                                $dir = $path.$value.$subvalue;
                        
                        
                        } elseif(is_dir($dir2)){
                            if(substr($dir2,-1) !== "/"){
                                $path.$value.$subvalue .= "/";      //? warum klappt rename in $dir nicht?
                            }
                            $subdir = scandir($dir2);                // $dir = $path.$value.$subvalue
                            $subdir = array_slice($subdir, 2);
                                
                                foreach ($subdir as $subvalue2){
                                    $dir3 = $path.$value.$subvalue.$subvalue2;

                                    if(is_file($dir3) && preg_match('/.gif|.jpg|.png/',$dir3)){
                                        $filename = pathinfo($dir3, PATHINFO_FILENAME);
                                        $filename = ucfirst($filename);
                                        
                                        echo "<a class='flexelement' href='$dir' data-lightbox='$folder' data-title='$filename'>";
                                        echo "<img src='$dir3' alt='$filename' title='$folder - $filename'>";
                                        echo "</a>";

                                    } elseif(is_dir($dir3)){

                                        scan_ordner($dir3);
                                    }               
                                }                     
                
                        }
                
                }
                
            }
        //     echo "<a class='flexelement' href='$dir' data-lightbox='$folder' data-title='$filename'>";
        //     echo "<img src='$dir3' alt='$filename' title='$folder - $filename'>";
        // echo "</a>";
        echo "</div>";
    }
}



scan_ordner($gallery_path);



/* ########################### */
// echo "<br><hr>";
/* ########################### */

// $gallery_path = "./img/gallery/";
// $dir = scandir($gallery_path);
// $dir = array_slice($dir, 2);


// 	foreach ($dir as $value){
//         if(is_dir($gallery_path.$value)){
//             $subdir = scandir($gallery_path.$value);
//             $subdir = array_slice($subdir, 2);

//             foreach($subdir as $subvalue){
//                 if(is_dir($gallery_path.$value."/".$subvalue)){
//                     $subdir2 = scandir($gallery_path.$value."/".$subvalue);
//                     $subdir2 = array_slice($subdir2, 2);
                    
//                     foreach($subdir2 as $subvalue2){
//                         if(is_dir($gallery_path.$value."/".$subvalue."/".$subvalue2)){
//                             echo "$subvalue2 ist ein Ordner. <br>";
//                         } elseif(is_file($gallery_path.$value."/".$subvalue."/".$subvalue2)){
//                             echo $subvalue2 . "<br>";
//                         }
//                     }
//                     // echo "$subvalue ist ein Ordner. <br>";

//                 } elseif(is_file($gallery_path.$value."/".$subvalue)){
//                     echo $subvalue . "<br>";
//                 }
//             }
//             // echo "$values is a Directory <br>";
//         } elseif(is_file($gallery_path.$value)){
//             echo "$value <br>";
//         }
//     }

/* ########################### */
// echo "<br><hr>";
/* ########################### */
    
    // for($i=0; $i < count($dir); $i++){
    //     $result = $dir[$i];
    //     if(is_file($gallery_path.$result)){
    //         echo $result . "<br>";
    //     } elseif(is_dir($gallery_path.$result)){
    //         echo $result . " ist ein Ordner <br>";
    //     }
    // }

    // @$path = dir($gallery_path) or die ("Es liegen aktuell keine Bilder vor!");
           
    // while($file = $path->read()){
    //     if(!preg_match('/.gif|.jpg|.png/',$file)){
    //         echo ("Es liegen keine Bilddateien im Ordner $gallery_path vor.");
    //     } else {
    //         echo " 
    //             <figcaption>$file</figcaption>
    //             <figure><img src='$gallery_path/$file'></figure> 
    //         ";
    //     }
    // }

/* ########### ################# */
// echo "<br><hr>";
/* ########### ################# */

    // $gallery_path .= $dir[0];
    // echo var_dump(scandir($gallery_path));
    

function verzeichnis($dir){
    if(!is_dir($dir)){
        return '';        
    }
    $ausgabe = '';
    $inhalte = scandir($dir);
    // $inhalte = array_slice($dir,2);   //-> entfernt die ersten beiden Elemente

    foreach($inhalte as $elemente){
        // die ersten beiden Elemente '.' u. ..' überspringen 
        if($element == '.' || $element == '..'){
            continue;
        }
    }
}




/*##  Absichtlich offen lassen (aus Sicherheitsgründen), damit keine weiteren unabsichtlichen Eingaben getätigt werden können.
	  Nur wenn das Dokument danach ausschließlich php Code enthält
?>  
 */ 