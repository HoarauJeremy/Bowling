<?php
    require_once("modele/client.php");

    $titre = "Clients - Bowling du Front de Mer";
    $clients = $this->manageClients->getClients();
    $contenu = "<div class='w-full md:w-3/5 md:mx-auto mt-4'>
                    <div class='px-1 flex flex-row md:justify-between justify-around'>
                        <h2 class='text-2xl font-bold'>Liste des Clients : </h2>
                        <!--<a class='px-2 py-1 bg-background rounded shadow shadow-secondary text-primary font-bold border border-primary hover:bg-primary hover:text-background transition-colors' title='Ajouter' href='?url=Clients/ajouter'>Ajouter</a>-->
                    </div>";
    $contenu .= "<section class='p-1 w-full overflow-x-auto'>";
    $contenu .= "<table id='clients' class='table w-full mt-2 border border-gray-500'>
                <thead>
                    <tr class='text-lg'>
                        <th scope='col' class='p-1 w-1/4 break-all md:p-3'>Email du client</th>
                        <th scope='col' class='p-1 w-1/4 break-keep'>Client</th>
                        <th scope='col' class='p-1 w-1/4 break-keep'>Point du client</th>
                        <th scope='col' class='p-1 w-1/4'>Action</th>
                    </tr>
                </thead>
                <tbody>"; 

    foreach ($clients as $cle => $ligne)
    {
        $client = new client($ligne);    

        // $dateNaiss = $this->manageAdmin->formatDateNaiss(date_create($client->getDateNaissClients()));
        $points = ($client->getPointClients()) ? $client->getPointClients() : 0 ;

        $contenu .="<tr class='border-t h-16 border-black md:hover:bg-accent odd:bg-gray-200 text-center group'>
                        <th scope='row' class='p-2 w-1/4'>".$client->getEmailClients()."</th>
                        <td class='p-1'>".$client->getNomClients()." ".$client->getPrenomClients()."</td>
                        <td class='p-1'>".$points."</td>
                        <td class='p-1'>
                            <a class='px-2 py-1 bg-primary rounded shadow shadow-secondary text-background font-bold group-hover:shadow-primary' title='Détails' href='?url=Clients/client/".$client->getIdUser()."'>Détails</a>
                        </td>
                    </tr>";
    }
    $contenu .="</tbody></table>";
    $contenu .= "</section>
                </div>";


    include "template.php";
?>

<!-- <th scope='col' class='p-1 w-1/4 break-keep'>Date de naissance du client</th>
                        <td class='p-1'>".$dateNaiss."</td> -->
