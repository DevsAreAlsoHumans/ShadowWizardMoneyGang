<?php 
namespace Model;
include_once("./Model/UserDB.php");
include_once("./Model/DBHandler.php");
use PHPUnit\Framework\TestCase;

final class UserDBTest extends TestCase
{
    public function testGetUsername(): void
    {
        $username = "test";
        $mail = "test";
        $password = "test";

        $string = "test";

        $user = new UserDB($username,$mail,$password);
        $returnAddUser = $user->addUser();
        
        $this->assertIsInt($returnAddUser,"Retour de fonction n'est pas un int");
        $this->assertGreaterThan(0,$returnAddUser,"L'ID de retour n'est pas supérieur à 0");
    }
}