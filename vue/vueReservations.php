<?php

    require_once("modele/administration.php");

    $titre = "Reservations - Bowling du Front de Mer";
    $reservations = $this->manageReservations->getReservations();
    $contenu = "<div class='w-full md:w-3/5 md:mx-auto mt-4 font-Roboto'>
                    <div class='px-1 flex flex-row md:justify-between justify-around'>
                        <h2 class='text-2xl font-bold'>Liste des Reservations : </h2>
                        <a class='px-2 py-1 bg-background rounded shadow shadow-secondary text-primary font-bold border border-primary hover:bg-primary hover:text-background transition-colors' title='Ajouter' href='?url=Reservations/showReservations'>Ajouter</a>
                    </div>";
    $contenu .= "<section class='p-1'>";
    $contenu .= "<table id='reservations' class='table w-full mt-2 border border-gray-500'>
                <thead>
                    <tr class='text-lg'>
                        <th scope='col' class='p-1 w-1/5 break-all md:p-3'>Reservation</th>
                        <th scope='col' class='p-1 w-1/5 break-keep'>Début de la réservation</th>
                        <th scope='col' class='p-1 w-1/5 break-all'>Heure de debut de la réservation</th>
                        <th scope='col' class='p-1 w-1/5 break-all'>Heure de fin de la réservation</th>
                        <th scope='col' class='p-1 w-1/5'>Action</th>
                    </tr>
                </thead>
                <tbody>"; 

    foreach ($reservations as $cle => $ligne)
    {
        $reservation = new administration($ligne);
        $dateReservation = $this->manageReservations->formatDate(date_create($reservation->getDateReservation()));


        $contenu .="<tr class='border-t h-16 border-black md:hover:bg-accent odd:bg-gray-200 text-center group'>
                        <th scope='row' class='p-2'>".$reservation->getIdReservation()."</th>
                        <td class='p-1'>".$dateReservation."</td>
                        <td class='p-1'>".$reservation->getHeureDebut()."</td>
                        <td class='p-1'>".$reservation->getHeureFin()."</td>
                        <td class='p-1'>
                            <a class='px-2 py-1 bg-primary rounded shadow shadow-secondary text-background font-bold group-hover:shadow-primary' title='Détails' href='?url=Reservations/reservation/".$reservation->getIdReservation()."'>Détails</a>
                        </td>
                    </tr>";
    }
    $contenu .="</tbody></table>";
    $contenu .= "</section>
                </div>";

    include "template.php";
?>