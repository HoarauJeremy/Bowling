<?php

    require_once("modele/administration.php");
    
    $titre = "Reservations - Bowling du Front de Mer";
    
    $reservations = $this->manageReservations->getReservations();
    
    $contenu = "<div class='w-5/6 md:w-3/5 mx-auto p-3'>
                    <div class='flex items-center justify-center'>
                        <h2 class='text-2xl font-bold underline'>Ajoutée un client : </h2>
                        <!-- <a class='px-2 py-1 bg-background rounded shadow shadow-secondary text-primary font-bold border border-primary hover:bg-primary hover:text-background transition-colors' title='Ajouter' href='?url=Clients/ajouter'>Ajouter</a>-->
                    </div>";
    
    $contenu .= "<section class='my-2 md:pl-2'>";


    
    $contenu .= "<div class='w-full h-full text-xl md:text-lg font-NotoSans'>
                    <form action='?url=Clients/add' method='post'>
                        <div class='md:flex md:items-center md:justify-center py-2 w-full'>
                            <label class='md:w-1/4' for='nom'>Nom: </label>
                            <input class='p-1 w-full md:w-3/4 border-b-2 border-accent rounded rounded-b-none bg-gray-200 shadow-sm shadow-secondary text-lg' type='text' name='nom' id='nom'>
                        </div>

                        <div class='md:flex md:items-center md:justify-center py-2 w-full'>
                            <label for='prenom'>Prenom: </label>
                            <input class='p-1 w-full md:w-3/4 border-b-2 border-accent rounded rounded-b-none bg-gray-200 shadow-sm shadow-secondary text-lg' type='text' name='prenom' id='prenom'>
                        </div>

                        <div class='md:flex md:items-center md:justify-center py-2 w-full'>
                            <label for='dateN'>Date de naissanve: </label>
                            <input class='p-1 w-full md:w-3/4 border-b-2 border-accent rounded rounded-b-none bg-gray-200 shadow-sm shadow-secondary text-lg' type='date' name='dateN' id='dateN'>
                        </div>

                        <div class='md:flex md:items-center md:justify-center py-2 w-full'>
                            <label for='email'>Email: </label>
                            <input class='p-1 w-full md:w-3/4 border-b-2 border-accent rounded rounded-b-none bg-gray-200 shadow-sm shadow-secondary text-lg' type='email' name='email' id='email'>
                        </div>

                        <div class='w-full h-auto p-3 flex justify-end items-center'>
                            <button class='bg-accent py-2 px-3 mx-1 rounded shadow hover:bg-primary' type='submit'>Enregistrer</button>
                            <a title='Annuler' href='?url=Clients/clients'
                            class='bg-background py-2 px-3 mx-1 rounded shadowshadow-secondary text-primary
                            font-bold border border-primary hover:bg-primary hover:text-background transition-colors'>Annuler</a>
                        </div>
                        <div class='w-full h-auto p-3 flex justify-end items-center'>";
                        $contenu .= "<div class='md:flex md:items-center md:justify-center py-2 w-full'>
                        <label for='user' class='md:w-1/4'>Utilisateur :</label>
                        <select name='user' id='user' class='p-2 w-full md:w-3/4 border-b-2 border-accent rounded rounded-b-none bg-gray-200 shadow-sm shadow-secondary text-lg'>
                            <option value='null'></option>";
                        foreach ($reservations as $cle => $ligne) {
                            $reservation = new administration($ligne);
                            $res = $reservation->getIdUser();
                            $contenu .= "<option value='".$res."'>".$res."</option>";
                            $contenu .= "</select>";
                        }

    $contenu .= "</div></form>
                </div>
            </section>
        </div>";

    include "template.php"

?>

