
<?php
include "yla.php"
?>
<html><body>
    
   <h2>  Hae elokuvaa nimeltä  🎥</h2>
 <form action= "haku.php" method="GET"><br> <br>
      Nimi:<input type ="text" name ='nimi'><br><br>
             <input type="submit" value="Hae"><br><br>
</form>
</body></html>

 <?php
$dsn = "pgsql:host=localhost;dbname=lsaarinen";
$user = "db_lsaarinen";
$pass = getenv('DB_PASSWORD');
$options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];

try {
    $yht= new PDO($dsn, $user, $pass, $options);
    if (!$yht) echo $e->getmessage();

       $stmt=$_GET['nimi'];
       $statement= "%". $stmt ."%";
        $stmt = $yht->prepare("SELECT vid,nimi,ohjaaja,genre,vuosi,miespääosa,naispääosa,ikäraja,kesto
        FROM elokuvat WHERE nimi ilike ?"); 
       
        $stmt->execute([$_GET['nimi']]);
        $rivi = $stmt->fetch(); 


        if ($rivi) { 
            echo "<div>ID:$rivi[vid]</div>";
            echo " <div>Nimi: $rivi[nimi]</div>";  
            echo " <div>Ohjaaja: $rivi[ohjaaja]</div>"; 
            echo " <div>Genre: $rivi[genre]</div>"; 
            echo " <div>Vuosi: $rivi[vuosi]</div>"; 
            echo " <div>Miespääosa: $rivi[miespääosa]</div>"; 
            echo " <div>Naispääosa: $rivi[naispääosa]</div>"; 
            echo " <div>Ikäraja: $rivi[ikäraja]</div>"; 
            echo " <div>Kesto: $rivi[kesto]</div>"; 
        }
     
        else { 
            echo "Haettavan elokuvan tunnistetta ei ole vielä määritelty <br>
        tai tunnistetta vastaavaa elokuvaa ei löytynyt"; 
        
        }   }

catch (PDOException $e)
 {
    echo $e->getMessage();  
}
include "alakaksi.php";
?> 

