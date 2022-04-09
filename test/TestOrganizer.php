<?php
    namespace Tests;
    
    include "./app/Organizer.class.php";
    include "./app/SystemInfo.class.php";

    use PHPUnit\Framework\TestCase;
    use App\Organizer;
    use App\SystemInfo;

    class TestOrganizer extends TestCase{
        public function testSeClasseEEstanciada(){
            $system = new SystemInfo;
            $user = $system->getUser();
        
            $path = 'C:\\Users\\'.$user.'\\Downloads\\';

            $this->assertIsObject(new Organizer($path), $msg = "Classe Organizer estanciada normalmente.");
            echo "\n".$msg;
        }
    }