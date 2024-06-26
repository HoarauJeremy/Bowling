<?php
    $titre = "Reservation - Bowling du Front de Mer";
    
    $url = explode("/", $_GET['url']);
    $val = array_slice($url, 2);
    $element = $this->manageReservations->getRes(...($val));
    
    $reservation = new administration($element);

    $dateCreaReservation = $this->manageReservations->formatDate(new DateTime($reservation->getDateCreaRes()));
    $dateDeReservation = $this->manageReservations->formatDate(new DateTime($reservation->getDateReservation()));
    $HeureDebutReservation = $this->manageReservations->formatHeure(new DateTime($reservation->getHeureDebut()));
    $HeureFinReservation = $this->manageReservations->formatHeure(new DateTime($reservation->getHeureFin()));

    $contenu = "<div class='w-5/6 md:w-3/5 mx-auto p-3'>
                    <h2 class='text-2xl font-bold underline'>Fiche Reservation n° : ".$reservation->getIdReservation()."</h2>
                    <section class='my-2 md:pl-2'> 
                        <ul>
                            <li class=''><strong> Date de la creation de la reservation : </strong>" . $dateCreaReservation . " </li> 
                            <li class=''><strong> Nombre de personne : </strong>" . $reservation->getNbrPersonne() . " </li>
                            <li class=''><strong> Reservation du : </strong>".  $dateDeReservation 
                            ."<strong> de </strong>" . $HeureDebutReservation . " <strong>à : </strong>" . $HeureFinReservation . " </li>";

                            $resTab = [1 => "Classique", 2 => "Anniversaire", 3 => "Professionnel"];
                            foreach ($resTab as $key => $value) {
                                ($reservation->getIdFormule() == $key) ? 
                                    $contenu .= "<li class=''><strong> Formule : </strong>" . $value . " </li>"
                                : "";
                            }                            
                            $contenu .= "<li class=''><strong>Piste " . $reservation->getIdPiste() . " </strong></li>
                        </ul>

                        <div class='w-full h-auto p-3 flex justify-end items-center font-medium'>
                            <a title='Modification' class='bg-orange-500 hover:bg-orange-600 py-2 px-3 mx-1 rounded shadow shadow-secondary' href='?url=Reservations/modifier/".$reservation->getIdReservation()."'>Modifier</a>
                            <a title='Suppression' class='bg-red-500 hover:bg-red-600 py-2 px-3 mx-1 rounded shadow shadow-secondary' href='?action=supprimer&val=".$reservation->getIdReservation()."' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cette reservation?\");'>Supprimer</a>
                        </div>

                    </section>
                </div>";

    include "template.php";
?>

<!-- <li class=''><strong>Client : </strong>".$reservation->getClient()."</li> -->