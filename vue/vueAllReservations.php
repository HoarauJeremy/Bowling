<?php

    date_default_timezone_set('Europe/Paris');
    require_once("modele/administration.php");

    $reservationTab = json_encode($reservations);

    $titre = "Reservations - Bowling du Front de Mer";

$contenu ="
<div class='w-full md:w-3/5 md:mx-auto mt-4 font-Roboto'>
    <div class='px-1 flex flex-row md:justify-between justify-around'>
        <h2 class='text-2xl font-bold'>Quelques information ! </h2>
    </div>
        <p>Ici vous retrouverez quelques information concernant nos piste de bowling, notre gamme de formule mais aussi nos horaires de disponibilité.</p>
</div>


";

    $contenu .= "
<div class='w-full md:w-3/5 md:mx-auto mt-4 font-Roboto'>
    <form action='?url=Reservations/addReservation' method='post' >
        <div class='p-p7_5 border border-solid border-slate-50 bg-gray-200 shadow-xl h-auto flex flex-col md:flex-row items-center rounded-md mb-10'>
            <div class='w-1/2'>
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
                </table>
            </div>
                
            <div class='w-1/2 bg-white'>
                <label>Heure de début de réservation :</label>
                <input name='HD' id='HD' type='time' step='3600' class='bg-gray-100 box-border'/></p>

                <label>Heure de fin de réservation :</label>
                <input name='HF' id='HF' type='time' step='3600' class='bg-gray-100 box-border'/></p>

                <label>Nombre de personne :</label>
                <input name='NbPers' id='NbPers' type='number'  min='1' max='8' class='bg-gray-100 box-border'/></p>

                <p>Choix de la forumle  :</p>
                <input type='radio' id='2' name='Formule' value='2'>
                <label for='2'>Formule Anniversaire</label>
                <input type='radio' id='1' name='Formule' value='1'>
                <label for='1'>Formule Classique</label></p>

                <label>Adresse mail :</label>
                <input name='mailClient' id='mailClient' type='email'  class='bg-gray-100 box-border'/></p>

                <button type='submit' class='font-Roboto font-extrabold first-letter:text-2xl bg-red-800 text-white md-5 px-10 h-auto w-auto border-none cursor-pointer rounded-full hover:bg-red-900 hover:border-solid hover:border-spacing-0.5'>Ajouter à mon panier</button>
            </div>
        </div>
    </form>
</div>
";
    
    include "template.php";
?>

<script>
    let reservationTab = JSON.parse('<?php  echo $reservationTab; ?>')
</script>