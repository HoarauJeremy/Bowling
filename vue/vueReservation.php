<?php
    $titre = "Bowling du Front de Mer - Reservation";
    
    $url = explode("/", $_GET['url']);
    $val = array_slice($url, 2);
    $element = $this->manageReservations->getReservation(...($val));
    
    $reservation = new administration($element);

    $dateDeReservation = $this->manageReservations->formatDate(date_create($reservation->getDateDeReservation()));
    $dateDebutReservation = $this->manageReservations->formatDate(date_create($reservation->getDebutReservation()));
    $dateFinReservation = $this->manageReservations->formatDate(date_create($reservation->getFinReservation()));

    $contenu = "<div class='w-5/6 md:w-3/5 mx-auto p-3'>
                    <h2 class='text-2xl font-bold underline'>Fiche Reservation n° : ".$reservation->getNumReservation()."</h2>
                    <section class='my-2 md:pl-2'> 
                        <ul>
                            <li class=''><strong>Client : </strong>".$reservation->getClient()."</li>
                            <li class=''><strong> Date de reservation : </strong>" . $dateDeReservation . " </li> 
                            <li class=''><strong> Nombre de personne : </strong>" . $reservation->getNbrPersonne() . " </li>
                            <li class=''><strong> Reservation du : </strong>" . $dateDebutReservation . " <strong>au : </strong>" . $dateFinReservation . " </li>
                            <li class=''><strong> Formule : </strong>" . $reservation->getNomFormule() . " </li>
                            <li class=''><strong>" . $reservation->getNomPiste() . " </strong></li>
                        </ul>

                        <div class='w-full h-auto p-3 flex justify-end items-center font-medium'>
                            <a title='Modification' class='bg-orange-500 hover:bg-orange-600 py-2 px-3 mx-1 rounded shadow shadow-secondary' href='?url=Reservations/modifier/".$reservation->getNumReservation()."'>Modifier</a>
                            <a title='Suppression' class='bg-red-500 hover:bg-red-600 py-2 px-3 mx-1 rounded shadow shadow-secondary' href='?action=supprimer&val=".$reservation->getNumReservation()."' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cette reservation?\");'>Supprimer</a>
                        </div>

                    </section>
                </div>";

    include "template.php";
?>