<?php 
 $dsn = "pgsql:host=localhost;dbname=lsaarinen";
 $user = "db_lsaarinen";
 $pass = getenv('DB_PASSWORD');
 $options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
 
 try {
     $yht = new PDO($dsn, $user, $pass, $options);
     if (!$yht) { die();}
 }
 if ( !empty($nimi) and !empty($vuosi) )
 { 
 $nimi = $_GET['nimi'] ;
 $ohjaaja = $_GET['ohjaaja'] ;
 $genre = $_GET['genre'] ;
 $vuosi = $_GET['vuosi'] ;
 $miespääosa = $_GET['miespääosa'] ;
 $naispääosa = $_GET['naispääosa'] ;
 $ikaraja = $_GET['ikäraja'] ; 
 $kesto = $_GET['kesto'] ;
 
 
 $stmt = $pdo->prepare("INSERT INTO elokuvat (nimi,ohjaaja,genre,vuosi,miespääosa,naispääosa,ikaraja,kesto) 
 VALUES (?,?,?,?,?,?,?,?)"); 
 $stmt->execute([$nimi, $ohjaaja,$genre, $vuosi,$miespääosa.$naispääosa,$ikaraja,$kesto]); 
 $id = $pdo->lastInsertId(); 
 header ("Location: kaikki.php "); 
 }
?> 