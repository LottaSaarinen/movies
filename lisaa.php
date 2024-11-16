<html><body>
    

<?php



$dsn = "pgsql:host=localhost;dbname=lsaarinen";
$user = "db_lsaarinen";
$pass = getenv('DB_PASSWORD');
$options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];

/*try {
    $yht = new PDO($dsn, $user, $pass, $options);
    if (!$yht) { die();}

if ( !empty($nimi) and !empty($vuosi) )
{ 

$ins = "insert into elokuvat ";
$ins .= "values ( default, ?, ?, ?,?,?,?,?,? )";

$lause = $yht->prepare($ins);
 (vid,nimi,ohjaaja,genre,vuosi,miespääosa,naispääosa,ikäraja,kesto) 
*/

try{
    $pdo = new PDO($dsn, $user, $pass, $options);   
}
 catch (PDOException $e){
    echo "yhteysvirhe" . $e->getmessage();
 }

 try{
    $sql = "INSERT INTO elokuvat (vid,nimi,ohjaaja,genre,vuosi,miespääosa,naispääosa,ikäraja,kesto) 
    VALUES (default, ?,?,?,?,?,?,?,?)"; 
    $lause=$pdo->prepare($sql);
 
    $nimi = $_GET['nimi'] ;
    $ohjaaja = $_GET['ohjaaja'] ;
    $genre = $_GET['genre'] ;
    $vuosi = $_GET['vuosi'] ;
    $miespääosa = $_GET['miespääosa'] ;
    $naispääosa = $_GET['naispääosa'] ;
    $ikaraja = $_GET['ikäraja'] ; 
    $kesto = $_GET['kesto'] ;

$lause->bindParam(1,$nimi);
$lause->bindParam(2,$ohjaaja);
$lause->bindParam(3,$genre);
$lause->bindParam(4,$vuosi);
$lause->bindParam(5,$miespaaosa);
$lause->bindParam(6,$naispaaosa);
$lause->bindParam(7,$kesto);
$lause->bindParam(8,$ikaraja);

$lause->execute();

echo "Lisätty";
 }

    catch (PDOException $e) {

        echo "Virhe" . $e->getmessage();


$ret = $lause->execute();
unset($nimi);
unset($ohjaaja);
unset($genre);
unset($vuosi);
unset($miespaaosa);
unset($naispaaosa);
unset($kesto);
unset($ikaraja);
unset($_GET);
unset($_REQUEST);
header ('Location: kaikki.php');
}
?>
</body></html>