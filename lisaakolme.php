<?php 

$dsn = "pgsql:host=localhost;dbname=lsaarinen";
$user = "db_lsaarinen";
$pass = getenv('DB_PASSWORD');
$options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];

try {
$yht = new PDO($dsn, $user, $pass, $options);
if (!$yht)// { die();
 echo $e->getMessage(); 
 
    $nimi = $_POST['nimi'] ;
    $ohjaaja = $_POST['ohjaaja'] ;
    $genre = $_POST['genre'] ;
    $vuosi = $_POST['vuosi'] ;
    $miespaaosa = $_POST['miespääosa'] ;
    $naispaaosa = $_POST['naispääosa'] ;
    $ikaraja = $_POST['ikäraja'] ; 
    $kesto = $_POST['kesto'] ;

 $stmt = $yht->prepare("INSERT INTO elokuvat 
 (vid,nimi,ohjaaja,genre,vuosi,miespääosa,naispääosa,ikäraja,kesto) 
 VALUES (default,?,?,?,?,?,?,?,?)"); 
 $stmt->execute([$nimi,$ohjaaja,$genre,$vuosi,$miespaaosa,$naispaaosa,$ikaraja,$kesto]); 
 $id = $yht->lastInsertId(); 
 header("Location: kaikki.php?id=$id"); 
}
catch (PDOException $e) { 
    echo $e->getMessage(); die();
}
?> 