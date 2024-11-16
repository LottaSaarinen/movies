
<?php


$dsn = "pgsql:host=localhost;dbname=lsaarinen";
$user = "db_lsaarinen";
$pass = getenv('DB_PASSWORD');
$options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];

try {
    $yht= new PDO($dsn, $user, $pass, $options);
    if (!$yht) echo $e->getmessage();

     
    $avain=$_GET['nimi'];
    //$jokeri =("select * from elokuvat where nimi like :nimi");
    $jokeri =("SELECT FROM elokuvat
    WHERE nimi LIKE '%$avain'");
     //$stmt = $yht->prepare("SELECT nimi,ohjaaja,genre,vuosi,miespääosa,naispääosa,ikäraja,kesto
     //FROM elokuvat
     //WHERE nimi = ?"); 

     $stmt =$yht->prepare($jokeri);
     //$stmt->bindValue(':nimi','%' . $avain . '%');
     
     //$stmt->execute();

    // while ($row =$stmt->fetch()){
     //   echo $row ['nimi'] . "<br>";
        $stmt->execute([$avain]); 
      
        foreach ($stmt as $rivi) 
        { 
        echo "<div>$rivi[nimi]</div>"; 
        echo " <div>ohjaaja: $rivi[ohjaaja]</div>"; 
        echo " <div>genre: $rivi[genre]</div>"; 
        echo " <div>vuosi: $rivi[vuosi]</div>"; 
        echo " <div>miespääosa: $rivi[miespääosa]</div>"; 
        echo " <div>naispääosa: $rivi[naispääosa]</div>"; 
        echo " <div>ikäraja: $rivi[ikäraja]</div>"; 
        echo " <div>kesto: $rivi[kesto]</div>"; 
        } 
    
     }
     /*echo "<div class='elokuvat'>"; 
     foreach ($stmt as $rivi) 
     { 
     echo "<div>$rivi[nimi]</div>"; 
     echo " <div>ohjaaja: $rivi[ohjaaja]</div>"; 
     echo " <div>genre: $rivi[genre]</div>"; 
     echo " <div>vuosi: $rivi[vuosi]</div>"; 
     echo " <div>miespääosa: $rivi[miespääosa]</div>"; 
     echo " <div>naispääosa: $rivi[naispääosa]</div>"; 
     echo " <div>ikäraja: $rivi[ikäraja]</div>"; 
     echo " <div>kesto: $rivi[kesto]</div>"; 
     } 
 */
 
catch (PDOException $e)
 {
    echo $e->getMessage();
   
}
?>