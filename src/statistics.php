<?php


require_once "../vendor/autoload.php";
use Doctrine\DBAL\DriverManager;


$connectionParams = array(
    'url' => 'mysql://root:@localhost/wildschweine',
);
$conn = DriverManager::getConnection($connectionParams);

$queryBuilder = $conn->createQueryBuilder();

$stmt = $queryBuilder
    ->select('datetime','longitude','latitude')
    ->from('boar_attack');

$stmt = $conn->query($queryBuilder);

$values['tag'] = 0;
$values['nacht'] = 0;
$values['montag'] = 0;
$values['dienstag'] = 0;
$values['mittwoch'] = 0;
$values['donnerstag'] = 0;
$values['freitag'] = 0;
$values['samstag'] = 0;
$values['sonntag'] = 0;


while ($row = $stmt->fetch()) {

    $datetime = strtotime($row['datetime']);
    if(date('H', $datetime) >= 18 || date('H', $datetime) < 6){
        $values['nacht']++;
    }else{
        $values['tag']++;
    }

    switch(date('w',$datetime)){
        case 0:
            $values['sonntag']++;
        break;
        case 1:
            $values['montag']++;
        break;
        case 2:
            $values['dienstag']++;
        break;
        case 3:
            $values['mittwoch']++;
        break;
        case 4:
            $values['donnerstag']++;
        break;
        case 5:
            $values['freitag']++;
        break;
        case 6:
            $values['samstag']++;
        break;
        
    }

}
$view = new \TYPO3Fluid\Fluid\View\TemplateView();
$paths = $view->getTemplatePaths();
$paths->setTemplatePathAndFilename('../templates/statistics.html');

$view->assignMultiple($values);
echo $view->render();



?>

