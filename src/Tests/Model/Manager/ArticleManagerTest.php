<?php

require __dir__ . '/../../../vendor/autoload.php';

use Elogeek\AdministrationPage\Model\Entity\Article;
use Elogeek\administrationPage\Model\Manager\ArticleManager;


ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);


$articleManager = new ArticleManager();

//add article
$artcl = new Article(null, 'test title article', 'un petit contenu .... blablabla','janine');
$articleManager->addArticle($artcl);
die();

//Return an article or null
$artl = $articleManager->getArticles(1);
if($artcl){
    echo " L'article exist <br>";
}
else {
    echo "Erreur l'article n'exist pas<br>";
    die();
}

/*return all article
$artcl = $articleManager->readArticle();
Dumper::dieAndDump($artcl);

// Test update article
$result = $articleManager->updateArticle();
if($result) {
    echo 'L'article est modifié<br>';
}
else {
    echo " erreur lors de la modification de l'article<br>";
    die();
}

//delete article
if($articleManager->deleteArticle($artcl)) {
    echo "article supprimé<br>";
}
else {
    echo "erreur article non supprimé<br>";
    die();
}


