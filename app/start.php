<?php
use App\src\App as App;
/*
*
*/
require_once ROOT . DIRECTORY_SEPARATOR . '/vendor/autoload.php';

 /*
 *Istanzia una nuova aplicazione
 */

$app = new App();

/*
*Aggiunge un nuovo elemento al Cart
*/

$param = [
	"name" => "George VI - 20 Cent 1951",
	"price" => 50.00,
	"options" => [
		"used" => +20.00,
		"Mint" => +10.00
	],
];

$app->add($param);

/*
*Aggiunge un nuovo elemento al Cart
*/

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

/*
*Aggiunge un nuovo elemento al Cart
*/

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
/*
 *Ritorna l'oggetto all'interno del carrello
 *Tramite il suo Id generato da sha1()
*/
$app->get("5f849666acde368957d2a916994f74672106ae2a");

/*
 *Modifica un elemento del Cart
 *Parametri Elemento Id e Parametri da modificare per l'Elemento all'interno del carrello
*/  
$app->getElement("5f849666acde368957d2a916994f74672106ae2a", ["price" => 12.34, "quantity" => 2]);