 
<?php

session_start();

include("functions.php");

$adatok = include("data.php");

$autok = $adatok["autok"];
$users = $adatok["users"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Autókölcsönző</title>
</head>

<body>

    <!-- Menüsor -->
    <div class="fejlec">

        <div class="osszesjarmu">
            <h2>Összes jármű</h2>
        </div>
        <div class="ugyfelek">
            <h2>Ügyfelek</h2>
        </div>
        <div class="foglaltjarmuvek">
            <h2>Foglalt járművek</h2>
        </div>

    </div>

    <!-- Flexbox konténer -->
    <form action="">
    <div class="row">

        <?php

        if( isset($_GET["reserve"]) && isset($_GET["selected_car"])){
            reserve_car($autok, $_GET["selected_car"]);
        } 

        if( isset($_GET["delete"]) ){
           remove_from_reserveds(  $_GET["delete"]);
        } 

        ?>

      
        <!-- Összes jármű oszlop -->
        <div class="left-side">
            <?php
            foreach (get_available_cars($autok) as $auto) {

                echo '<div class=auto-adatok>
                    <input type="radio" name="selected_car" value="'.$auto['id'].'">
                ';
                echo '<div class="auto-kep">';
                echo '<img src="images/'.$auto['id'].'.jpg" alt="images/'.$auto['id'].'.jpg">';
                echo '</div>';
                echo '<div class=auto-modell>' . $auto["model"] . '<br></div>' . '</div>';
                echo '<button type="submit" disabled class="reszletek" name="reszletek">Részletek</button>' . '<br>';
            }
            ?>
        </div>

        <!-- Ügyfelek oszlop -->
        <div class="main">

            <?php
                print  getUserDd($users);
            ?>
                <button name="reserve" class="reszletek reserve-btn">Foglalás</button>
        </div>

        <!-- Foglalt járművek oszlop -->

        <div class="right-side">

        <?php
            foreach (get_reserved_cars() as $auto) {
                echo '<div class=auto-adatok>
                    
                ';
                echo '<div class="auto-kep">';
                echo '<img src="images/'.$auto['id'].'.jpg" alt="images/'.$auto['id'].'.jpg">';
                echo '</div>';
                echo '<div class=auto-modell>' . $auto["model"] . '<br></div>' . '</div>';
                echo '<a  href="?delete=' . $auto["id"] . '" class="torles" name="remove">Törlés</a>' . '<br>';
            }
            ?>

        </div>

    </div>
    </form>       
    <!-- Lábléc -->
    <div class="footer">
        <?php

        echo 'Összesen ' .$eredmeny = count($autok) . ' autó van, ebből ' .$eredmeny = count(get_reserved_cars()) . ' foglalt. Felhasználók száma ' .$eredmeny = count($users) . '.'; 
        
        ?>
    </div>

</body>

</html>
