<?php

require __dir__ . '/../../../vendor/autoload.php';

use Elogeek\AdministrationPage\Model\Entity\User;
use Elogeek\AdministrationPage\Model\Manager\UserManager;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);


$userManager = new UserManager();

//add user
$user = new User(null, 'janine', 'doe','Azerty000', 'doe@gmail.com');
$userManager->add($user);
die();

/*return a user by id
$user = $userManager->getById(1);
Dumper::dieAndDump($user);

//Return an User by his user name or null
$exists = $userManager->existUser('doe@gmail.com');
if($exists){
    echo " Email user existe <br>";
}
else {
    echo "Erreur email user not existe<br>";
    die();
}

// Test update password.
$result = $userManager->updatePassword($user , '123Abc');
if($result) {
    echo 'mot de passe modifié<br>';
}
else {
    echo " erreur lors de la modification du mot de passe<br>";
    die();
}

//delete user
if($userManager->delete($user)) {
    echo "User supprimé<br>";
}
else {
    echo "User pas supprimé<br>";
    die();
}


echo "<br> Le dév est un génie ! :D<br>"; */