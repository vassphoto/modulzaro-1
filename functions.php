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


function getUserDd($users){
    $out= '<select name="user" onchange="/*this.form.submit();*/">';
    foreach( $users as $user ){
        $out.= '<option value="'.$user['id'].'">'.$user['nev'].'</option>';
    }
    $out.= '</select>';
    return $out;
}