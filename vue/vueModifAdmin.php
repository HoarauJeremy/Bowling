<?php
    $titre = "Bowling du Front de Mer - Modification de la reservation";
    
    $url = explode("/", $_GET['url']);
    $val = array_slice($url, 2);
    $element = $this->manageReservations->getRes(...($val));

    $reservation = new administration($element);

    $contenu = "<div class=' w-5/6 md:w-3/5 mx-auto p-3'>
                    <h2 class='text-2xl font-bold underline'>Reservation n° : ".$reservation->getIdReservation()."</h2>
                    <section class='my-2 md:pl-2'> 

                        <div class='w-full h-full text-xl md:text-lg'>
                            <form action='' method='post'>
                                <div class='md:flex md:items-center md:justify-center py-2 w-full'>
                                    <label for='debutReservation' class='md:w-1/4'>Début de la réservation : </label>
                                    <input type='datetime-local' name='debutReservation' id='debutReservation' value='".$reservation->getDebutReservation()."'
                                      class='p-1 w-full md:w-3/4 border-b-2 border-accent rounded rounded-b-none bg-gray-200 shadow-sm shadow-secondary text-lg'>
                                </div>

                                <div class='md:flex md:items-center md:justify-center py-2 w-full'>
                                    <label for='finReservation' class='md:w-1/4'>Fin de la réservation : </label>
                                    <input type='datetime-local' name='finReservation' id='finReservation' value='".$reservation->getFinReservation()."'
                                      class='p-1 w-full md:w-3/4 border-b-2 border-accent rounded rounded-b-none bg-gray-200 shadow-sm shadow-secondary text-lg'>
                                </div>

                                <div class='md:flex md:items-center md:justify-center py-2 w-full'>
                                    <label for='nbrPersonne' class='md:w-1/4'>Nombre de Personnes : </label>
                                    <input type='number' name='nbrPersonne' id='nbrPersonne' min='1' 
                                      class='p-2 w-full md:w-3/4 border-b-2 border-accent rounded rounded-b-none bg-gray-200 shadow-sm shadow-secondary text-lg'
                                      value=".$reservation->getNbrPersonne().">
                                </div>

                                <div class='md:flex md:items-center md:justify-center py-2 w-full'>
                                    <label for='piste' class='md:w-1/4'>Piste :</label>
                                    <select name='piste' id='piste' 
                                      class='p-2 w-full md:w-3/4 border-b-2 border-accent rounded rounded-b-none bg-gray-200 shadow-sm shadow-secondary text-lg'>";
                                    $res = $reservation->getIdPiste();
                                    $options = ['1', '2', '3', '4', '5', '6'];
                                    foreach ($options as $option) :
                                        $selected = ($res == $option) ? 'selected' : '';
                                        $contenu .= "<option value='".$option."' ".$selected.">Piste ".$option."</option>";
                                    endforeach;
                        $contenu .="</select>
                                </div>

                                <div class='md:flex md:items-center md:justify-around py-2 w-full'>";
                                    $formules = ['Classique'=> '1', 'Anniversaire' => '2', 'Professionnel' => '3'];
                                    foreach ($formules as $key => $value) {
                                        $check = ($reservation->getIdFormule() == $value) ? 'checked':'';
                                        $contenu .= "<div class='py-1'>
                                                <label class='cursor-pointer' for='formule".$key."'>$key : </label>
                                                <input class='ml-1 cursor-pointer' type='radio' name='formule' id='formule".$key."' value='".$value."' ".$check.">
                                            </div>";
                                    }

                    $contenu .= "</div>

                            </form>
                        </div>

                        <div class='w-full h-auto p-3 flex justify-end items-center'>
                        <a title='Sauvegarder' class='bg-accent py-2 px-3 mx-1 rounded shadow hover:bg-primary' href='?url=Reservations/modifier/".$reservation->getIdReservation()."'>Sauvegarder</a>
                        <a title='Annuler' href='?url=Reservations/reservations'
                        class='bg-background py-2 px-3 mx-1 rounded shadowshadow-secondary text-primary
                        font-bold border border-primary hover:bg-primary hover:text-background transition-colors'>Annuler</a>
                        </div>

                    </section>
                </div>";

    include "template.php";
?>

<!-- <h3>Réservation du client : ".$reservation->getClient()."</h3> -->