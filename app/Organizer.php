<?php

namespace App;

use DirectoryIterator;

class Organizer{

        protected $path;
        protected $dir;
        protected $extensions;

        public function __construct(string $path)
        {
            $this->path = $path;
            $this->dir = new DirectoryIterator($this->path);
        }
        
        public function setExtensions(Array $extensions){
            $this->extensions = $extensions;
        }

        protected function getExtensions(): array
        {
            $all_extensions = $this->extensions;
            return $all_extensions;
        }

        
        public function organize(){
            foreach($this->getExtensions() as $key => $extensions){
                $destination_dir = $key;
                if(!$this->dirExist($destination_dir) && $this->extensionsExistsInDirectory($this->dir, $extensions)){
                    $this->createDir($destination_dir);
                }

                $this->moveFile($destination_dir, $extensions);
            }

            return 1;
        }

        protected function moveFile(string $destination_dir, array $extensions){
            foreach($this->dir as $file){
                if($this->extensionsExistsInDirectory($this->dir, $extensions)){
                    echo  ">>> Movendo arquivos : ".$file."\n";
                    rename($this->path.$file, $this->path.$destination_dir."/".$file);
                }
            }
        }

        protected function extensionsExistsInDirectory(object $dir, array $extensions){
            foreach($dir as $file){
                $file_extension = $file->getExtension();
                if(in_array($file_extension, $extensions)){
                    return 1;
                }
            }
            return 0;
        }

        protected function dirExist(string $dir){
            if(is_dir($this->path.$dir)){
                return 1;
            }
            return 0;
        }
        
        protected function createDir(string $dir){
            mkdir($this->path.$dir);
        }
    }