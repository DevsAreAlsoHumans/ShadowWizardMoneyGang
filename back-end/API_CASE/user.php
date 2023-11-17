<?php
namespace Model;
require_once("Model/DBHandler.php");
require_once("Model/userDB.php");
require_once("./header.php");

$DB = new DBHandler();
$request_error = "You've got a wrong id or research";
$request_URI = $_SESSION["request"];
$request_method = $_SERVER["REQUEST_METHOD"];
$encoded = file_get_contents("php://input");
$decode = json_decode($encoded, true);
switch ($request_method) {
    case "POST":
        if (count($request_URI) > 2) {
            if (intval($request_URI[2]) == 0) {
                switch ($request_URI[2]) {
                    case "login":
                        $username = $decode["username"];
                        $password = $decode["password"];
                        $dataUser = $DB->getInDB("*", "user", "username", $username);
                        if (count($dataUser) <= 0) echo ("false");
                        else {
                            $encryptPasword = $dataUser[0]["password"];
                            if (password_verify($password, $encryptPasword)) {
                                echo (json_encode($dataUser[0]));
                            } else {
                                echo ("false");
                            }
                        }
                        break;
                    case "register":
                        $username = $decode["username"];
                        $mail = $decode["mail"];
                        $password = $decode["password"];
                        $user = new UserDB($username, $mail, $password);
                        $user->addUser();
                        echo ("true");
                        break;
                    default:
                        echo "Wrong request type";
                        break;
                }
            }
        }
        break;
    case "GET":
        if (count($request_URI) > 2) {
            if (intval($request_URI[2] == 0)) {
                
            } else {
                $result = $DB->getInDB("*", "user", "id", $request_URI[2]);
                if(count($result)>0)echo json_encode($result[0]);
                else echo "false";
            }
        } else {
            $result = $DB->getInDB("*", "user");
            echo (json_encode($result));
        }
        break;
    case "PUT" : 
        if(count($request_URI) >2){
            if(intval($request_URI[2])!=0){
                $correctUpdate = true;
                foreach($decode as $key => $value) { 
                    if($key == "password"){
                        $value = password_hash($value,PASSWORD_BCRYPT);
                    }
                    $res = $DB->updateInDB("user",$key,$value,"id",$request_URI[2]);
                    if($res!=true)$correctUpdate = false;
                } 
                echo $correctUpdate;
            }
        }
        break;
    default : 
        
        break;
}
