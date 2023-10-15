<?php
    $titre = "Bowling du Front de Mer - Reservation";
    $element = $this->manageAdmin->getReservation($_GET['val']);
    $reservation = new administration($element);

    $dateDeReservation = $this->manageAdmin->formatDate(date_create($reservation->getDateDeReservation()));
    $dateDebutReservation = $this->manageAdmin->formatDate(date_create($reservation->getDebutReservation()));
    $dateFinReservation = $this->manageAdmin->formatDate(date_create($reservation->getFinReservation()));

    $contenu = "<div class=' w-5/6 md:w-4/5 mx-auto p-3'>
                    <h2 class='text-2xl font-bold underline'>Fiche Reservation n° : ".$reservation->getNumReservation()."</h2>
                    <section class='my-2 pl-2'> 
                        <ul>
                            <li class=''><strong> Date de reservation : </strong>" . $dateDeReservation . " </li> 
                            <li class=''><strong> Nombre de personne : </strong>" . $reservation->getNbrPersonne() . " </li>
                            <li class=''><strong> Debut de la reservation : </strong>" . $dateDebutReservation . " </li> 
                            <li class=''><strong> Fin de la reservation : </strong>" . $dateFinReservation . " </li>
                            <li class=''><strong> Formule : </strong>" . $reservation->getNomFormule() . " </li>
                            <li class=''><strong>" . $reservation->getNomPiste() . " </strong></li>
                            <li class=''><strong> Nom du client : </strong>" . $reservation->getNomClients() . " </li>
                            <li class=''><strong> Prenom du client : </strong>" . $reservation->getPrenomClients() . " </li>
                            <li class=''><strong> Email du client : </strong>" . $reservation->getEmailClients() . " </li>
                        </ul>
                    </section>
                </div>";

    include "template.php";
?>