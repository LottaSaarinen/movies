<?php
    

    
include "yla.php";
?>
<html><body>
    

    Lisää elokuva

    <form action= "lisaakolme.php" method="post"><br>
        Nimi________________<input type ="text" name ='nimi'><br><br>
        Ohjaaja_____________<input type ="text" name ='ohjaaja'><br><br>
        Genre______________.<input type ="text" name ='genre'><br><br>
        Vuosi_______________<input type ="text" name ='vuosi'><br><br>
        Miespääosa________<input type ="text" name ='miespääosa'><br><br>
        Naispääosa________.<input type ="text" name ='naispääosa'><br><br>
        Ikäraja_____________.<input type ="text" name ='ikäraja'><br><br>
        Kesto_______________<input type ="text" name ='kesto'><br><br>
        <br>
        <input type="submit" value="Lisää">

</form>
</body></html>

<?php
include "alakaksi.php";

        ?>