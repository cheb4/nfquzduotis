<?php

include_once ROOT . '/models/Main.php';


class MainController
{

    public function runStuff()
    {
        # code...
      $mainMapData = Main::getAllMapData();
      $freeSpace = Main::getFreeSpace();
   
       require_once(ROOT . '/views/main/index.php');
    }


    public function actionDisplay()
    {
        $this->runStuff();
        return true;
    }

    public function actionInsert()
    {
        echo "<br><h1>Ačiu</h1> <br>";
        require_once(ROOT . '/views/main/sucsess.php');

        if (isset($_POST["name"]) || isset($_POST["surname"])) {
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $town = $_POST["town"];
            $orderSize = $_POST["orderSize"];
            $phoneNumber = $_POST["phoneNumber"];
            $comment = $_POST["comment"];
            // $sql = "INSERT INTO `customers` (`id`, `name`, `surname`, `city`, `orderNum`, `phone`, `comment`) VALUES" . " (NULL, '$name', '$surname', '$town', '$orderSize', '$phoneNumber', '$comment');";

            $sql = "update customers set name='".$name."',surname='".$surname."',city='".$town."',phone='".$phoneNumber."',comment='".$comment."', location_status='1' where id =".$orderSize.";";

            Main::insertDataToDatabase($sql);
            header('location: https://desolate-reaches-61237.herokuapp.com/');
        }
        return true;
    }
}
