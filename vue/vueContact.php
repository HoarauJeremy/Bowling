<?php
    $titre = "Bowling du Front de Mer - Contact";
    $contenu = "<div class='h-auto mx-auto'>";
    $contenu .= "<section >";
    $contenu .= "<div class='w-full text-4xl font-NotoSans font-extrabold'>
                    <h2 class='text-center'>Nous Contacter</h2>
                </div>";
    $contenu .= "<div class='my-3'>
                    <div class='flex flex-row items-center mt-2'>
                        <h3 class='text-xl'>Téléphone : </h3>
                        <a class='text-lg pl-1' href='tel:+262'>06 92 00 00 00</a>
                    </div>
                    
                    <div class='flex flex-row items-center mt-2'>
                        <h3 class='text-xl'>Courriel : </h3>
                        <a class='text-lg pl-1' href='mailto:'>contact@bowlingdufrontdemer.re</a>
                    </div>
                    
                    <div class='mt-2'>
                        <h3 class='text-xl'>Nos Horaires: </h3>
                        <ul class='pl-5'>
                            <li>Lundi : </li>
                            <li>Mardi : </li>
                            <li>Mercredi : </li>
                            <li>Jeudi : </li>
                            <li>Vendredi : </li>
                            <li>Samedi : </li>
                            <li>Dimanche : </li>
                        </ul>
                    </div>
                    
                </div>";

    $contenu .= "</section>";
    $contenu .= "<div class='bg-emerald-600 h-auto w-full'>
                    <div class='h-80 flex justify-center items-center text-9xl'>MAP</div>
                </div>";

    $contenu .= "</div>";

    include "template.php";
?>
