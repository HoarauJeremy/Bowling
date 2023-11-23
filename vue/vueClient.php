<?php
    $titre = "Bowling du Front de Mer - Client";
    
    $url = explode("/", $_GET['url']);
    $val = array_slice($url, 2);

    $element = $this->manageClients->getClient(...($val));
    
    $client = new administration($element);

    // $dateNaiss = $this->manageClients->formatDateNaiss(date_create($client->getDateNaissClients()));
    $points = ($client->getPointClients()) ? $client->getPointClients() : 0 ;

    $contenu = "<div class='w-5/6 md:w-3/5 mx-auto p-3'>
                    <h2 class='text-2xl font-bold underline'>Fiche Reservation n° : ".$client->getEmailClients()."</h2>
                    <section class='my-2 md:pl-2'> 
                        <ul>
                            <li class=''><strong>Client : </strong>".$client->getClient()."</li>
                            <li class=''><strong> Date de naissance du client : </strong>" . $dateDeReservation . " </li> 
                            <li class=''><strong> Nom du client : </strong>" .$client->getNomClients()." ".$client->getPrenomClients(). " </li>
                            <li class=''><strong> Nombre de points : </strong>" . $points . " </li>
                            <li class=''><strong> aaa </strong></li>
                        </ul>

                        <div class='w-full h-auto p-3 flex justify-end items-center font-medium'>
                            <a title='Modification' class='bg-orange-500 hover:bg-orange-600 py-2 px-3 mx-1 rounded shadow shadow-secondary' href='?url=Reservations/modifier/".$client->getNumReservation()."'>Modifier</a>
                            <a title='Suppression' class='bg-red-500 hover:bg-red-600 py-2 px-3 mx-1 rounded shadow shadow-secondary' href='?action=supprimer&val=".$client->getNumReservation()."' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cette reservation?\");'>Supprimer</a>
                        </div>

                    </section>
                </div>";

    include "template.php";
?>