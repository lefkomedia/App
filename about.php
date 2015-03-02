<?php
require_once "app/app.php";
$app = new App();

$app->title = 'About';

$app->start();
?>

Hello world!

<?php
$app->end();