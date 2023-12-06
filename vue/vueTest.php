<?php

    require_once("modele/administration.php");

    $reservationTab = json_encode($reservations);

    $titre = "Reserver";
    $contenu ="<div class='w-full md:w-3/5 md:mx-auto mt-4 font-Roboto'>
            <div class='px-1 flex flex-row md:justify-between justify-around'>
                <h2 class='text-2xl font-bold'>Quelques information ! </h2>
            </div>
                <p>Ici vous retrouverez quelques information concernant nos piste de bowling, notre gamme de formule mais aussi nos horaires de disponibilité.</p>
        </div>

    <table id='calendarTable' class='mx-auto border border-black rounded'>
    <thead class='bg-primary border border-black'>
        <tr>
            <th colspan='2' class='border border-black'>
                <label for='datePicker' id='jourNom'></label>
                <input type='date' id='datePicker' value='". date("Y-m-d") ."' onchange='updateCalendar()'>    
            </th>
        </tr>
        <tr>
            <td>Heure</td>
            <td>Informations</td>
        </tr>
    </thead>
    <tbody id='calendarBody'></tbody>
    </table>";

include "template.php";

?>

<script>
    let reservationTab = JSON.parse('<?php  echo $reservationTab; ?>')
</script>