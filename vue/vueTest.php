<?php

    require_once("modele/administration.php");

    // $date = date("Y-m-d");

    foreach ($reservations as $cle => $ligne)
    {
        $reservation = new administration($ligne);
        // var_dump($reservation->getDebutReservation());
        // echo $reservation->getDebutReservation();
    }
    $reservationTab = json_encode($reservations);

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
    console.log(reservationTab);
    
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the calendar
        updateCalendar();
    });

    function updateCalendar() {
        const selectedDate = document.getElementById('datePicker').value;
        const calendarBody = document.getElementById('calendarBody');
        const jourNom = document.getElementById('jourNom');

        const d = new Date(selectedDate);
        let tabS = ['Dimanche','Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
        jourNom.innerHTML = tabS[d.getDay()];

        // Clear previous content
        calendarBody.innerHTML = '';

        // Populate time slots and info slots
        for (let hour = 0; hour <= 23; hour++) {
            const row = document.createElement('tr'); // Créer une nouvelle ligne

            const timeCell = document.createElement('td'); // Créer une nouvelle cellule
            timeCell.textContent = `${hour.toString().padStart(2, '0')}:00`;
            
            reservationTab.forEach(res => {
                const r = new Date(res['DebutReservation']); // Créer une nouvelle date avec les information récuperer depuis le Tab reservationTab
                
                if (r.getHours() === hour && r.getDate() === d.getDate() && r.getMonth() === d.getMonth()) {
                    console.log('ok',  r.getHours(), r.getDate());
                    row.style.backgroundColor = 'red'; // Definit le background d'une ligne en rouge
                }
            });
            
            row.appendChild(timeCell);

            const infoCell = document.createElement('td'); // Créer une nouvelle cellule
            infoCell.textContent = `Info for ${selectedDate} ${hour.toString().padStart(2, '0')}:00`;
            row.appendChild(infoCell);

            calendarBody.appendChild(row);
        } 

        // Populate time slots and info slots
        /* for (let hour = 0; hour <= 24; hour++) {
            const row = document.createElement('tr');

            // Create a cell for each reservation in the hour
            const matchingReservations = reservationTab.filter(res => {
                const r = new Date(res['DebutReservation']);
                return r.getHours() === hour;
            });

            matchingReservations.forEach(res => {
                const timeCell = document.createElement('td');
                timeCell.textContent = `${hour.toString().padStart(2, '0')}:00`;
                timeCell.style.backgroundColor = 'red'; // Change the background color as needed
                row.appendChild(timeCell);
                console.log(row);

                const infoCell = document.createElement('td');
                infoCell.textContent = `Info for ${res['DebutReservation']}`;
                row.appendChild(infoCell);
            });

            // If no matching reservations, create a default time cell
            if (matchingReservations.length === 0) {
                const timeCell = document.createElement('td');
                timeCell.textContent = `${hour.toString().padStart(2, '0')}:00`;
                row.appendChild(timeCell);

                const infoCell = document.createElement('td');
                infoCell.textContent = `No reservations for this hour`;
                row.appendChild(infoCell);
            }

            calendarBody.appendChild(row);
        } */

    }

</script>