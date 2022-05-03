<?php
session_start();
$autok = [
    [
        'id' => 1,
        'year' => 2011,
        'model' => 'FORD FIESTA CONNECTED 1.1L PFI3',
        'color' => 'MAGNETIC',
        'ccm' => '1100',
        'fuel' => 'benzin',
        'performance' => '55 kW / 74 LE',
        'gearbox' => '5 FOK. MANUÁLIS'
    ],
    [
        'id' => 2,
        'year' => 2006,
        'model' => 'FORD ECOSPORT TITANIUM 1.0L 125 M6',
        'color' => 'DESERT ISLAND BLUE',
        'ccm' => '990',
        'fuel' => 'benzin',
        'performance' => '92 kW / 125 LE',
        'gearbox' => '5 FOK. MANUÁLIS'
    ],
    [
        'id' => 3,
        'year' => 2021,
        'model' => 'FORD Focus Connected 5 ajtós 1.0 ',
        'color' => 'Kék',
        'ccm' => 990,
        'fuel' => 'benzin',
        'performance' => '91 kW / 123 LE',
        'gearbox' => '6 FOK. MANUÁLIS'
    ],
    [
        'id' => 4,
        'year' => 2021,
        'model' => 'FORD PUMA',
        'color' => 'Kék',
        'ccm' => 1000,
        'fuel' => 'benzin',
        'performance' => '91 kW / 123 LE',
        'gearbox' => '6 FOK. MANUÁLIS'
    ],
    [
        'id' => 5,
        'year' => 2021,
        'model' => 'FORD KUGA TITANIUM 1.5L ECOBOOST 150 M6',
        'color' => 'SOLAR SILVER',
        'ccm' => 1497,
        'fuel' => 'benzin',
        'performance' => '110 kW / 149 LE',
        'gearbox' => '6 FOK. MANUÁLIS'
    ],
    [
        'id' => 6,
        'year' => 2021,
        'model' => 'FORD MONDEO Titanium 2.0 FHEV 187 LE',
        'color' => 'Metal Blue',
        'ccm' => 1999,
        'fuel' => 'Hybrid',
        'performance' => '110 kW / 147 LE',
        'gearbox' => 'CVT AUTOMATA'
    ],
    [
        'id' => 7,
        'year' => 2021,
        'model' => 'FORD S-MAX TITANIUM 2.0L TDCI 150LE M6 FWD',
        'color' => 'MAGNETIC',
        'ccm' => 1997,
        'fuel' => 'Dízel',
        'performance' => '110 kW / 149 LE',
        'gearbox' => '6 FOK. MANUÁLIS'
    ],
    [
        'id' => 8,
        'year' => 2021,
        'model' => 'FORD GALAXY TITANIUM 2.0TDCI 150LE M6 FWD',
        'color' => 'MAGNETIC',
        'ccm' => 1997,
        'fuel' => 'Dízel',
        'performance' => '110 kW / 149 LE',
        'gearbox' => '6 FOK. MANUÁLIS'
    ]
];


$users = [
    [
        'id' => 1,
        'nev' => 'sanyi'
    ],
    [
        'id' => 2,
        'nev' => 'pista'
    ]
];

function getUserDd($users){
    $out= '<select name="user" onchange="/*this.form.submit();*/">';
    foreach( $users as $user ){
        $out.= '<option value="'.$user['id'].'">'.$user['nev'].'</option>';
    }
    $out.= '</select>';
    return $out;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autókölcsönző</title>

    <!-- CSS -->
    <style>
        * {
            box-sizing: border-box;
        }

        /* HTMl törzs */
        html,
        body {

            margin: 0px auto;
            background-image: url("images/bg.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }

        /* Menüsor */
        .fejlec {
            display: flex;
            flex-direction: row;
            justify-content: center;
            padding: 15px;
            text-align: center;
            background: rgba(240, 240, 240, 0.3);
            z-index: 1;
        }

        .osszesjarmu {
            flex-grow: 1;
        }

        .ugyfelek {
            flex-grow: 4;
        }

        .foglaltjarmuvek {
            flex-grow: 1;
        }

        /* Autó konténer */
        .auto-adatok {
            display: flex;
            flex-wrap: row;
            justify-content: space-between;
            z-index: 2;
            padding: 15px;
            border: 1px solid white;
        }

        .auto-modell {
            margin: 5px;
            padding: 5px;
            flex: 1 1 auto;
        }

        .auto-kep {
            padding-top: 5px;
            padding-bottom: 5px;
            flex: 1 1 auto;
        }

        .auto-kep > img{
            width: 160px;
        }

        .reszletek {
            background-color: #0BC071;
            padding: 20px;
            width: 100%;
            font-weight: bold;
        }

        .reszletek:hover {
            background-color: #F0E505;
        }

        .torles {
            background-color: #EDFC00;
            padding: 20px;
            width: 100%;
            font-weight: bold;
        }

        .torles:hover {
            background-color: #00FCFC;
        }

        /* Flexbox konténer */
        .row {
            display: flex;
            flex-direction: row;
            height: 100%;
            z-index: 1;
        }

        /* Bal oldali sáv */
        .left-side {
            display: flex;
            flex-direction: column;
            background: rgba(60, 179, 113, 0.6);
            padding: 10px;
            z-index: 1;
            width: 30%;
        }


        /* Tartalom */
        .main {
            text-align: center;
            flex-grow: 4;
            background: rgba(0, 111, 253, 0.6);
            color: #FFFFFF;
            padding: 20px;
            z-index: 1;
        }

        /* Jobb oldali sáv */
        .right-side {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            background: rgba(255, 0, 0, 0.6);
            padding: 10px;
            color: #FFFFFF;
            z-index: 1;
        }

        /* Lábléc */
        .footer {
            background: rgba(179, 0, 54, 0.8);
            color: #FFFFFF;
            margin-top: 10px;
            padding: 50px;
            width: 100%;
            text-align: center;
            position: fixed;
            bottom: 0;
            z-index: 999;
        }
    </style>
</head>

<body>

    <!-- Javascript tömb -->

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
        function reserve_car($cars, $reserve_id)
        {
            foreach ($cars as $car) {
                if ($car["id"] == $reserve_id) {
                    $_SESSION["reserveds"][$reserve_id] = $car;
                }
            }
        }

        function get_reserved_cars()
        {
            return  $_SESSION["reserveds"]??[];
        }

        function remove_from_reserveds($reserve_id)
        {
            unset($_SESSION["reserveds"][$reserve_id]);
        }

        function get_available_cars($cars)
        {
            $avails = [];
            foreach ($cars as $car) {
                if (!isset($_SESSION["reserveds"][$car["id"]])) {
                    $avails[] = $car;
                }
            }
            return $avails;
        }

        if( isset($_GET["reserve"]) ){
            reserve_car($autok, $_GET["selected_car"]);
        } 

        if( isset($_GET["remove"]) ){
           remove_from_reserveds($reserve_id, $_GET["selected_car"]);
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
                <button name="reserve">Foglalás</button>
        </div>

        <!-- Foglalt járművek oszlop -->

        <div class="right-side">

        <?php
            foreach (get_reserved_cars() as $auto) {
                echo '<div class=auto-adatok>
                    <input type="radio" name="selected_car" value="'.$auto['id'].'">
                ';
                echo '<div class="auto-kep">';
                echo '<img src="images/'.$auto['id'].'.jpg" alt="images/'.$auto['id'].'.jpg">';
                echo '</div>';
                echo '<div class=auto-modell>' . $auto["model"] . '<br></div>' . '</div>';
                echo '<button type="submit" class="torles" name="remove">Törlés</button>' . '<br>';
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