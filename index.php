<?php
    include "vendor/autoload.php";
    include "config.php";

    use App\Organizer;
    use App\SystemInfo;
    
    $system = new SystemInfo;
    $user = $system->getUser();

    $defalt_paths = [
        'Dowloads' => 'C:\\Users\\'.$user.'\\Downloads\\',
        'Documents' => 'C:\\Users\\'.$user.'\\Documents\\'
    ];

    $paths = array_merge($defalt_paths, PATHS);

    foreach($paths as $key => $path){
        $dir_name = $key;
        organize($path, $dir_name);
    }
 

    function organize($path, $dir_name){
            $organizador = new Organizer($path);
            $organizador->setExtensions(EXTENSIONS);
            if($organizador->organize()){
                echo ">>> Todos os arquivos de ".$dir_name." foram organizados.\n";
            }
    }