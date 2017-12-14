<?php
try
{
    $db = '';
    $host = '';
    $name = '';
    $paswd = '';
	$dbh = new PDO('mysql:host='.$host.';dbname='.$db.'',''.$name.'',''.$paswd.'');
}
catch(PDOException $e)
{
	echo "Erreur:".$e->getMessage()."<br />";
	die();
}
?>
