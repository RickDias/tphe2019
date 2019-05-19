<?php

// echo $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
require_once 'securimage.php';

$securimage = new Securimage();
 
if ($securimage->check($_POST['captcha_txt'])) {
	return true;
}
else {
	// echo "não deu";
	return false;
}
?>