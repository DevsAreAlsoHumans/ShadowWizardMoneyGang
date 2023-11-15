<?php
header('Content-type: text/javascript');
require_once("classes/dbHandler.php");
require_once("classes/userDB.php");
require_once("./header.php");

$DB = new DBHandler();
$request_error = "You've got a wrong id or research";
$request_URI = $_SESSION["request"];
$request_method = $_SERVER["REQUEST_METHOD"];
$encoded = file_get_contents("php://input");
$decode = json_decode($encoded, true);
switch($request_method){
    case "POST":
        if(count($request_URI)>2){
            if(intval($request_URI[2])==0){
                switch($request_URI[2]){
                    case "login":
                        $username = $decode["username"];
                        $password = $decode["password"];
                        $dataUser = $DB->getInDB("*","user","username",$username);
                        if(count($dataUser)<=0)echo("false");
                        else{
                            $encryptPasword = $dataUser[0]["password"];
                            if(password_verify($password,$encryptPasword)){
                                echo(json_encode($dataUser));
                            }else{
                                echo("false");
                            }
                        }
                        break;
                    case "register":
                        $username = $decode["username"];
                        $mail = $decode["mail"];
                        $password = $decode["password"];
                        $user = new UserDB($username,$mail,$password);
                        $user->addUser();
                        echo(true);
                        break;
                    default :
                        echo "Wrong request type";
                        break;
                }
            }
        }
        break;
    case "GET" : 
        if(count($request_URI)>2){
            echo "ca existe pas encore";
        } else {
            $result = $DB->getInDB("*","user");
            echo(json_encode($result));
        }
        break;

}
?>