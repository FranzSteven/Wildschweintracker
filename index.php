<?php

require_once "vendor/autoload.php";

$view = new \TYPO3Fluid\Fluid\View\TemplateView();
$paths = $view->getTemplatePaths();
$paths->setTemplatePathAndFilename('./templates/homepage.html');

echo $view->render();

?>