<?php 
// Definition der Benutzer 
$benutzer[0]["Username"] ="admin"; 
$benutzer[0]["Password"] = "admin"; 


// Sie können an dieser Stelle beliebig viele Benutzer anlegen. 
// Achten Sie dabei nur auf die Fortführung der Nummer. 

// Aufbau der Datenbankverbindung 
$connectionid  = mysql_connect ("localhost", "Th3rm0", "Moe&r517"); 
if (!mysql_select_db ("vape-login", $connectionid)) 
{ 
  die ("Keine Verbindung zur Datenbank"); 
} 

// Zuerst alle Datensätze löschen um keine Dopplungen zu bekommen. 
mysql_query ("DELETE FROM benutzerdaten"); 

// Daten eintragen 
while (list ($key, $value) = each ($benutzer)) 
{ 
  // SQL-Anweisung erstellen 
  $sql = "INSERT INTO ".
    "benutzerdaten (Nickname, Password,) ".
  "VALUES ('".$value["Nickname"]."', '".
                       md5 ($value["Kennwort"])."', '".
                      
  mysql_query ($sql); 

  if (mysql_affected_rows ($connectionid) > 0) 
  { 
    echo "Benutzer erfolgreich angelegt.<br>\n"; 
  } 
  else 
  { 
   echo "Fehler beim Anlegen der Benutzer.<br>\n"; 
  } 
} 
?>
