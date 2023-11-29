<?php

    date_default_timezone_set('Europe/Paris');
    require_once("modele/administration.php");

    $titre = "Bowling du Front de Mer - Reservations";
    
    
    $contenu ="<div class='w-full md:w-3/5 md:mx-auto mt-4 font-Roboto'>
                    <div class='px-1 flex flex-row md:justify-between justify-around'>
                        <h2 class='text-2xl font-bold'>Quelques information ! </h2>
                    </div>
                        <p>Ici vous retrouverez quelques information concernant nos piste de bowling, notre gamme de formule mais aussi nos horaires de disponibilité.</p>
                </div>";

    // Récupération du paramètre GET pour la semaine actuelle
    $semaineActuelle = isset($_GET['semaine']) ? $_GET['semaine'] : null;
    $dateDepart = new DateTime($semaineActuelle ?? '2023-11-28 00:00:00'); // Date de départ par défaut (changez si nécessaire)
    

    // Fonction pour obtenir la date du lundi de la semaine
    function getDateLundi($date)
    {
        return $date->modify('monday this week')->format('Y-m-d');
    }


    // Réduire d'une semaine
    function getPrevDateLundi($date)
    {
        return $date->modify('-7 day')->format('Y-m-d');
    }
    
    // Augmenter d'une semaine
    function getNextDateLundi($date)
    {
        return $date->modify('+7 day')->format('Y-m-d');
    }


    // Création d'un tableau pour les jours de la semaine
    $joursSemaine = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');

    // Création d'un tableau associatif pour stocker les heures pour chaque jour de la semaine
    $tableauHoraire = array();

    // Parcours des jours de la semaine
    foreach ($joursSemaine as $jour) {
        // Création d'un tableau pour stocker les heures pour chaque jour
        $heuresJour = array();

        // Parcours des heures de 00:00 à 23:00 pour chaque jour
        for ($heure = 0; $heure <= 23; $heure++) {
            // Formatage des heures avec deux chiffres (ajout de zéros)
            $heureFormat = str_pad($heure, 2, '0', STR_PAD_LEFT);

            // Ajout de l'heure au tableau des heures pour le jour en cours
            $heuresJour[] = "$heureFormat:00";
        }

        // Stockage du tableau des heures pour le jour en cours dans le tableau horaire
        $tableauHoraire[$jour] = $heuresJour;
    }

    $semaineActuelle = $dateDepart->format('Y-m-d'); // Obtention de la semaine actuelle au bon format

    $semainePrecedent = getPrevDateLundi($dateDepart);
    $semaineSuivante = getNextDateLundi($dateDepart);

    /* var_dump($semainePrecedent);
    var_dump($semaineSuivante);
    exit; */
    $contenu .= "<div class='flex justify-between mb-4'>";
    $contenu .= "<a href='?url=Reservations/ShowReservations&semaine=" . $semainePrecedent . "' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Semaine précédente</a>";
    $contenu .= "<a href='?url=Reservations/ShowReservations&semaine=" . $semaineSuivante . "' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Semaine suivante</a>";
    $contenu .= "</div>";

    // Affichage du tableau horaire avec des classes Tailwind pour les styles
    $contenu .= "<table class='border-collapse border mx-auto border-gray-400'>";
    $contenu .= "<tr><th class='border border-gray-400'></th>"; // Cellule vide en haut à gauche

    $dateComp = new DateTime($semaineActuelle ?? '2023-11-28 00:00:00');

    // Affichage des en-têtes de colonnes (jours de la semaine avec la date)
    foreach ($joursSemaine as $jour) {
        $dateFormatee = $dateDepart->format('d/m');
        $contenu .= "<th class='border border-gray-400 px-4 py-2 bg-gray-200'>$jour $dateFormatee</th>";
        $dateDepart->modify('+1 day'); // Passage au jour suivant
    }
    $contenu .= "</tr>";

    // Affichage des heures pour chaque jour
    for ($heure = 0; $heure <= 23; $heure++) {

        // Ajout d'une heure pour correspondre à la ligne
        $dateDepart->modify('+1 hour');
        $dateComp->modify('+1 hour');

        $contenu .= "<tr><td class='border border-gray-400 px-4 py-2'>".$dateDepart->format('H:00')."</td>"; // Heure à gauche du tableau

        // Affichage des cellules vides au centre du tableau
        foreach ($joursSemaine as $jour) {
            $dateComp->modify('+1 day');
            //$reservations = $this->manageReservations->IsThereReservation($dateComp->format('y-m-d H:00'));

            $contenu .= "<td class='border border-gray-400 px-4 py-2 '></td>";
            // if($reservations < 2 ){
                 
            //     // Cellule verte

            // }elseif ($reservations < 4) {
                
            //     $contenu .= "<td class='border border-gray-400 px-4 py-2 bg-orange-500'></td>"; // Cellule verte
                
            // }else{
            //     $contenu .= "<td class='border border-gray-400 px-4 py-2 bg-red-800'></td>"; // Cellule verte
            // }
        }
        $dateComp->modify('-7 day');
        $contenu .= "</tr>";
    }
    $contenu .= "</table>";

    // $contenu .= "<form action='?url=Reservations/addRes'>
    //                 <label for='jours'>Jours de votre rÃ©servation : </label>
    //                 <input type='date' name='dateRes' required='> <br>

    //                 <label for='nbPersonne'>Nombre de personnes : </label>
    //                 <input type='number' name='nbPersonne' min='1' max='8' required='> <br>

    //                 <label for='heureStart'>Choissiez une heure de dÃ©but de rÃ©servation :</label>
    //                 <input type='time' id='heureStart' name='heureStart' min='00:00' max='23:00' required='> <br>

    //                 <label for='heureFin'>Choissiez une heure de fin de rÃ©servation :</label>
    //                 <input type='time' id='heureFin' name='heureFin' min='00:00' max='23:00' required='> <br>
    //                 <table>
    //                     <tbody><tr>
    //                         <th>Anniversaire</th> <th>Professionnel</th> <th>Autres</th>
    //                     </tr>
    //                     <tr>
    //                         <td>Information pour la formule classique
    //                             <input type='radio' name='formuleType' value='1' required='>
    //                         </td>
    //                         <td>Information pour la formule anniversaire
    //                             <input type='radio' name='formuleType' value='2' required='>
    //                         </td>
    //                         <td>Information pour la formule professionnel
    //                             <input type='radio' name='formuleType' value='3' required='>
    //                         </td>
    //                     </tr>
    //                 </tbody></table>

    //                 <label for='email'>Entrer votre email pour recevoir votre rÃ©servation : </label>
    //                 <input type='email' name='email' required='> <br>

    //                 <input type='submit'>

    //             </form>";
    
    include "template.php";
?>