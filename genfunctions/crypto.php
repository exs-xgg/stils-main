<?php
/**
STATUS: READY
DESCRIPTION: holds all functions necessary for input control
WRITTEN BY: Romeo Manuel E. David
Instuctions:
Just include it in the php file and call the functions.
*/

function generateRandomString($length = 7) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return ($randomString);
}
function fin($str){
	return mysql_real_escape_string($str);
}

?>
