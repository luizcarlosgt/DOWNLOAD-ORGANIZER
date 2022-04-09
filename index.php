<?php
    include "vendor/autoload.php";
    include "config.php";

    use App\Organizer;
    use App\SystemInfo;

    $system = new SystemInfo;
    $user = $system->getUser();

    $paths = [
        'Dowloads' => 'C:\\Users\\'.$user.'\\Downloads\\',
        'Documents' => 'C:\\Users\\'.$user.'\\Documents\\'
    ];

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