<?php
//--------- BDD
$mysqli = new mysqli("localhost", "akli", "22041999", "mydb");
if ($mysqli->connect_error) die('Un probléme est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
// $mysqli->set_charset("utf8");
 
//--------- SESSION
session_start();
//--------- VARIABLES

 

$contenu = '';

function executeRequete($req)
{
	global $mysqli; 
	$resultat = $mysqli->query($req); 
	if (!$resultat)
	{
		die("Erreur sur la requete sql.<br />Message : " . $mysqli->error . "<br />Code: " . $req);
	}
	return $resultat;
}
//------------------------------------
function debug($var, $mode = 1) 
{
		echo '<div style="background: orange; padding: 5px; float: right; clear: both; ">';
		$trace = debug_backtrace(); 
		$trace = array_shift($trace);
		echo "Debug demandé dans le fichier : $trace[file] à la ligne $trace[line].<hr />";
		if($mode === 1)
		{
			echo "<pre>"; print_r($var); echo "</pre>";
		}
		else
		{
			echo "<pre>"; var_dump($var); echo "</pre>";
		}
	echo '</div>';
}
//------------------------------------
function internauteEstConnecte()
{  
	if(!isset($_SESSION['client'])) 
	{
		return false;
	}
	else
	{
		return true;
	}
}
//------------------------------------


//------------------------------------