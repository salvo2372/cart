<?php
use App\src\App as App;
/*
*
*/
require_once ROOT . DIRECTORY_SEPARATOR . '/vendor/autoload.php';
/*
*
*/
$app = new App();
$param = [
	"name" => "George VI - 20 Cent 1951",
	"price" => 50.00,
	"options" => [
		"used" => +20.00,
		"Mint" => +10.00
	],
];

$app->add($param);

$param = [
	"name" => "George VI - 50 Cent 1951",
	"price" => 30.20,
	"active" => 1,
	"options" => [
		"used" => +20.00,
		"Mint" => +10.00
	],
];

$app->add($param);

$param = [
	"name" => "George VI - 50 Cent 1951",
	"price" => 30.20,
	"active" => 1,
	"quantity" => 2,
	"options" => [
		"used" => +20.00,
		"Mint" => +10.00
	],
];

$app->add($param);

var_dump($app->dump());

echo "<br />";

//var_dump($app->get("5f849666acde368957d2a916994f74672106ae2a"));

//var_dump($app->getElement("5f849666acde368957d2a916994f74672106ae2a", ["price" => 12.34, "quantity" => 2]));