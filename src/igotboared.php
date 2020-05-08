<?php

include_once "../vendor/autoload.php";
use Doctrine\DBAL\DriverManager;


if(isset($_POST["igotboared"])){
    $connectionParams = array(
        'url' => 'mysql://root:@localhost/wildschweine',
    );
   $conn = DriverManager::getConnection($connectionParams);

    $queryBuilder = $conn->createQueryBuilder();

    echo $_POST["latitude"];
    $stmt = $queryBuilder
        ->insert('boar_attack')
        ->values(
            array(
                'longitude' => '?',
                'latitude' => '?',
                'datetime' => "now()"
            )
        )
        ->setParameter(0, $_POST['longitude'])
        ->setParameter(1, $_POST['latitude']);


    $stmt->execute();


    

}