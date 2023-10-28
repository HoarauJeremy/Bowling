<?php
    require_once("modele/administration.php");

    $titre = "Bowling du Front de Mer - Clients";
    $clients = $this->manageAdmin->getClients();
    $contenu = "<div class='w-full md:w-3/5 md:mx-auto mt-4'>
                    <div class='px-1 flex flex-row md:justify-between justify-around'>
                        <h2 class='text-2xl font-bold'>Liste des Clients : </h2>
                        <a class='px-2 py-1 bg-background rounded shadow shadow-secondary text-primary font-bold border border-primary hover:bg-primary hover:text-background transition-colors' title='Ajouter' href='?action=ajouter'>Ajouter</a>
                    </div>";
    $contenu .= "<section class='p-1'>";
    $contenu .= "<table id='reservations' class='table w-full mt-2 border border-gray-500'>
                <thead>
                    <tr class='text-lg'>
                        <th scope='col' class='p-1 w-1/4 break-all md:p-3'>Email du client</th>
                        <th scope='col' class='p-1 w-1/4 break-keep'>Nom du client</th>
                        <th scope='col' class='p-1 w-1/4 break-keep'>Prenom du client</th>
                        <th scope='col' class='p-1 w-1/4 break-keep'>DateNaissClients</th>
                        <th scope='col' class='p-1 w-1/4 break-keep'>Point du client</th>
                        <th scope='col' class='p-1 w-1/4'>Action</th>
                    </tr>
                </thead>
                <tbody>"; 

    foreach ($clients as $cle => $ligne)
    {
        $client = new administration($ligne);    

        $dateNaiss = $this->manageAdmin->formatDateNaiss(date_create($client->getDateNaissClients()));

        $contenu .="<tr class='border-t h-16 border-black md:hover:bg-accent odd:bg-gray-200 text-center'>
                        <th scope='row' class='p-2 w-1/4 break-all'>".$client->getEmailClients()."</th>
                        <td class='p-1'>".$client->getNomClients()."</td>
                        <td class='p-1'>".$client->getPrenomClients()."</td>
                        <td class='p-1'>".$dateNaiss."</td>
                        <td class='p-1'>".$client->getPointClients()."</td>
                        <td class='p-1'>
                            <a class='px-2 py-1 bg-primary rounded shadow shadow-secondary text-background font-bold' title='Détails' href='?action=details&val=".$client->getEmailClients()."'>Détails</a>
                        </td>
                    </tr>";
    }
    $contenu .="</tbody></table>";
    $contenu .= "</section>
                </div>";


    include "template.php";
?>