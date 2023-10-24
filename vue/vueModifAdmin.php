<?php
    $titre = "Bowling du Front de Mer - Modification de la reservation";
    $element = $this->manageAdmin->getReservation($_GET['val']);
    $reservation = new administration($element);

    $contenu = "<div class=' w-5/6 md:w-3/5 mx-auto p-3'>
                    <h2 class='text-2xl font-bold underline'>Reservation n° : ".$reservation->getNumReservation()."</h2>
                    <section class='my-2 md:pl-2'> 

                        <div class='w-full h-full'>
                            <h3>Réservation du client : ".$reservation->getClient()."</h3>
                            <form action='' method='post'>
                                <div class='md:flex md:items-center md:justify-center py-2 w-full'>
                                    <label for='debutReservation' class='md:w-1/4'>Début de la réservation : </label>
                                    <input type='datetime-local' name='debutReservation' id='debutReservation' 
                                      class='p-1 w-full md:w-3/4 border-b-2 border-accent rounded rounded-b-none bg-gray-200 shadow-sm shadow-secondary text-lg'>
                                </div>

                                <div class='md:flex md:items-center md:justify-center py-2 w-full'>
                                    <label for='finReservation' class='md:w-1/4'>Fin de la réservation : </label>
                                    <input type='datetime-local' name='finReservation' id='finReservation' 
                                      class='p-1 w-full md:w-3/4 border-b-2 border-accent rounded rounded-b-none bg-gray-200 shadow-sm shadow-secondary text-lg'>
                                </div>

                                <div class='md:flex md:items-center md:justify-center py-2 w-full'>
                                    <label for='nbrPersonne' class='md:w-1/4'>Nombre de Personnes : </label>
                                    <input type='number' name='nbrPersonne' id='nbrPersonne' 
                                      class='p-2 w-full md:w-3/4 border-b-2 border-accent rounded rounded-b-none bg-gray-200 shadow-sm shadow-secondary text-lg'
                                      value=".$reservation->getNbrPersonne().">
                                </div>

                                <div class='md:flex md:items-center md:justify-center py-2 w-full'>
                                    <label for='piste' class='md:w-1/4'>Piste :</label>
                                    <select name='piste' id='piste' 
                                    class='p-2 w-full md:w-3/4 border-b-2 border-accent rounded rounded-b-none bg-gray-200 shadow-sm shadow-secondary text-lg'>
                                        <option value='Piste 1'>Piste 1</option>
                                        <option value='Piste 2'>Piste 2</option>
                                        <option value='Piste 3'>Piste 3</option>
                                        <option value='Piste 4'>Piste 4</option>
                                        <option value='Piste 5'>Piste 5</option>
                                        <option value='Piste 6'>Piste 6</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class='w-full h-auto p-3 flex justify-end items-center'>
                            <a title='Sauvegarder' class='bg-accent py-2 px-3 mx-1 rounded shadow' href='?action=modifier&val=".$reservation->getNumReservation()."'>Sauvegarder</a>
                        </div>

                    </section>
                </div>";

    include "template.php";
?>

<!-- <div class='md:flex pt-2'>
    <label for='formuleNormal'>Normal : </label>
    <input type='radio' name='formuleNormal' id='formuleNormal'>
    
    <label for='formuleAnniv'>Anniverssaire : </label>
    <input type='radio' name='formuleAnniv' id='formuleAnniv'>

    <label for='formulePro'>Professionnel : </label>
    <input type='radio' name='formulePro' id='formulePro'>
    
    <input type='number' name='formule' id='formule' 
        class='p-2 w-full border-b-2 border-accent rounded rounded-b-none bg-gray-200 shadow-sm shadow-secondary text-lg'
        value=".$reservation->getNbrPersonne().">
</div> -->