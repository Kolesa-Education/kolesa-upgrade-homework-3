<?php

require_once ("source/MainControl/ControlCatApi.php");

if (isset($_POST['CategoryID'])) {
	$CategoryID = $_POST['CategoryID'];
	$control = new ControlCatApi("https://api.thecatapi.com/v1/");

	$control->setRandomCatByCategory($CategoryID);
	$control->printCat();


}
else {
	echo 'Вы ничего не ввели';
}
