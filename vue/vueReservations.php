<?php

    require_once("modele/administrations.php");

    $titre = "Bowling du Front de Mer - Reservations";
    $reservations = $this->manageAdmin->getReservations();
    $contenu = "<h2>Liste des Reservations</h2>";
    $contenu .= "<section>";
    $contenu .= "<table id='reservations' class='table'>
                <thead>
                    <tr>
                        <th scope='col' class='p-3'>Reservation</th>
                        <th scope='col' class='p-3'>Date de debut de reservation</th>
                        <th scope='col' class='p-3'>Date de Fin de reservation</th>
                        <th scope='col' class='p-3'>Action</th>
                    </tr>
                </thead>
                <tbody>"; 

    foreach ($reservations as $cle => $ligne)
    {
        $reservation = new administration($ligne);
        $contenu .="<tr class='border-t h-16 border-black bg-gray-100'>
                        <th scope='row' class='p-2'>".$reservation->getNumReservation()."</th>";
        $contenu .="<td class='p-2'>".$reservation->getDateDebutReservation()."</td>";
        $contenu .="<td class='p-2'>".$reservation->getDateDeFinReservation()."</td>";
        $contenu .="<td class='p-2'>
                        <a title='Détails' href='?action=editer&val=".$reservation->getNumReservation()."'>Détails</a>
                        | 
                        <a title='Suppression' href='?action=supprimer&val=".$reservation->getNumReservation()."' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cette reservation?\");'>Suppression</a>
                        | 
                        <a title='Modification' href='?action=modifier&val=".$reservation->getNumReservation()."'>Modification</a>
                    </td></tr>";
    }
    $contenu .="</tbody></table>";
    $contenu .= "</section>";

    include "template.php";
?>
