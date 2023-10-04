<?php

    require_once("modele/administrations.php");

    $titre = "Bowling du Front de Mer - Reservations";
    $reservations = $this->manageAdmin->getReservations();
    $contenu = "<h2>Liste des Reservations</h2>";
    $contenu .= "<section>";
    $contenu .= "<table id='reservations' class='table'>
                <thead>
                    <tr>
                        <th scope='col'>Id</>
                        <th scope='col'>Numero de Reservation</th>
                        <th scope='col'>Nombre de Personne</th>
                        <th scope='col'>Date de debut de reservation</th>
                        <th scope='col'>Date de Fin de reservation</th>
                        <th scope='col'>Formule</th>
                        <th scope='col'>Piste</th>
                    </tr>
                </thead>
                <tbody>"; 

    foreach ($reservations as $cle => $ligne)
    {
        $reservation = new administration($ligne);
        $contenu .="<tr><th scope='row'>".$reservation->getIdReservation()."</th>";
        $contenu .="<td>".$reservation->getNumReservation()."</td>";
        $contenu .="<td>".$reservation->getNbrPersonne()."</td>";
        $contenu .="<td>".$reservation->getDateDebutReservation()."</td>";
        $contenu .="<td>".$reservation->getDateDeFinReservation()."</td>";
        $contenu .="<td>".$reservation->getIdFormule()."</td>";
        $contenu .="<td>".$reservation->getIdPiste()."</td>";
        $contenu .="<td>
                        <a title='Détails' href='?action=editer&val=".$reservation->getIdReservation()."'><i class='fa fa-book'></i></a>
                        | 
                        <a title='Suppression' href='?action=supprimer&val=".$reservation->getIdReservation()."' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cette reservation?\");'><i class='fa fa-trash'></i></a>
                        | 
                        <a title='Modification' href='?action=modifier&val=".$reservation->getIdReservation()."'><i class='fa fa-pencil'></i></a>
                    </td></tr>";
    }
    $contenu .="</tbody></table>";
    $contenu .= "</section>";

    include "template.php";
?>
