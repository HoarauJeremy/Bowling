<?php
    $titre = "Bowling du Front de Mer - Modification de la reservation";
    $element = $this->manageAdmin->getReservation($_GET['val']);
    $reservation = new administration($element);

    $contenu = "<div class=' w-5/6 md:w-3/5 mx-auto p-3'>
                    <h2 class='text-2xl font-bold underline'>Fiche Reservation n° : ".$reservation->getNumReservation()."</h2>
                    <section class='my-2 md:pl-2'> 
                        

                        <div class='w-full h-auto p-3 flex justify-end items-center'>
                            <a title='Sauvegarder' class='bg-accent py-2 px-3 mx-1 rounded shadow' href='?action=modifier&val=".$reservation->getNumReservation()."'>Sauvegarder</a>
                        </div>

                    </section>
                </div>";

    include "template.php";
?>