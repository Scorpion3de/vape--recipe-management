<?php 
// Session starten
session_start ();

// Datenbankverbindung aufbauen 
$connectionid = mysql_connect ("localhost", "Th3rm0", "Moe&r517"); 
if (!mysql_select_db ("LoginSystem", $connectionid)) 
{ 
  die ("Keine Verbindung zur Datenbank"); 
} 

$sql = "SELECT ". 
    "Id, Username, ". 
  "FROM ". 
    "benutzerdaten ". 
  "WHERE ". 
    "(Username like '".$_REQUEST["Username"]."') AND ". 
    "(Password = '".md5 ($_REQUEST["pwd"])."')"; 
$result = mysql_query ($sql); 

if (mysql_num_rows ($result) > 0) 
{ 
  // Benutzerdaten in ein Array auslesen. 
  $data = mysql_fetch_array ($result); 

  // Sessionvariablen erstellen und registrieren 
  $_SESSION["user_id"] = $data["Id"]; 
  $_SESSION["user_Username"] = $data["Username"]; 


  header ("Location: intern.php"); 
} 
else 
{ 
  header ("Location: formular.php?fehler=1"); 
} 
?>