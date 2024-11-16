<?php
include 'yla.php';
$dsn = "pgsql:host=localhost;dbname=lsaarinen";
$user = "db_lsaarinen";
$pass = getenv('DB_PASSWORD');
$options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];

try {
$yht = new PDO($dsn, $user, $pass, $options);
if (!$yht) echo $e->getMessage(); 
   

echo"<table style='widht:80%>\n";
echo"<tr style='text-align:left'>";


/*$stmt = $yht->query("SELECT nimi,genre,ohjaaja FROM elokuvat"); 
   while ($rivi = $stmt->fetch()) {
   echo "<hr>";
    echo "<tr><td>$rivi[nimi]</td>";
    echo "<td>  $rivi[genre]</td>";
    echo "<td>  $rivi[ohjaaja]</tr></table><hr>";
   // echo "<br>Alla on leffoista muutakin tietoa<br><";
   }*/

    $stmt = $yht->query("SELECT vid,nimi,ohjaaja,genre,vuosi,miespääosa,naispääosa,ikäraja,kesto 
    FROM elokuvat"); 
   while ($rivi = $stmt->fetch()) { 

    echo "<div class='elokuvat'>"; 

    echo " <div>ID: $rivi[vid]</div>";
    echo " <div>Nimi: $rivi[nimi]</div>"; 
    echo " <div>Ohjaaja: $rivi[ohjaaja]</div>"; 
    echo " <div>Genre: $rivi[genre]</div>"; 
    echo " <div>Vuosi: $rivi[vuosi]</div>"; 
    echo " <div>Miespääosa: $rivi[miespääosa]</div>"; 
    echo " <div>Naispääosa: $rivi[naispääosa]</div>"; 
    echo " <div>Ikäraja: $rivi[ikäraja]</div>"; 
    echo " <div>Kesto: $rivi[kesto]</div>"; 
    echo "<br>";
   }
}
 catch (PDOException $e) { 
     echo $e->getMessage(); die();
 }
include 'alakaksi.php';
?>