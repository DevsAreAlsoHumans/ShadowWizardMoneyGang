<?php 
namespace Model;
require_once("DBHandler.php");


class UserDB extends DBHandler{
    private string $username;
    private string $mail;
    private string $password;

    function __construct(string $username,string $mail,string $password){
        parent::__construct();
        $this->mail = $mail;
        $this->username = $username;
        $this->password = password_hash($password,PASSWORD_BCRYPT);
    }

    function addUser(){
        $arrayData = [
            "username" => $this->username,
            "mail"=> $this->mail,
            "password" => $this->password,
        ];
        $idUSer = $this->insert($arrayData,"user");
        return $idUSer;
        
    }
    public function getUsername() : string{
        return $this->username;
    }
}
?>