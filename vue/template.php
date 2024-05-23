<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $titre; ?></title>
    <meta name="description" content="Description of your website">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Ajout de Tailwind CSS -->
    <link rel="stylesheet" href="./media/css/output.css">
    <!-- Ajout de l'icon -->
    <link rel="shortcut icon" href="./media/images/LogoBowling.ico" type="image/x-icon">
    <!-- Ajout de datatables -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
    <!-- Ajout des fichiers JS -->
    <script src="./js/menu.js"></script>
    <script src="./js/calendrier.js"></script>
    <script src="./js/securite.js"></script>
    <script src="./js/datatable.js"></script>

</head>
<body class="flex flex-col min-h-screen">
    <header class="bg-background z-50 fixed top-0 w-full shadow md:h-auto">
        <!-- Bar de navigation -->
        <?php if (isset($_SESSION['type']) && $_SESSION['type'] != 2 && $_SESSION['CONNECTER'] != "OK") { ?>
        <nav class="bg-accent md:bg-transparent w-full font-Roboto p-6 md:p-0 flex items-center justify-between">
            <!-- Logo -->
            <a href="index.php" class="flex md:ml-10 md:mr-16">
                <span id="logo" class="h-auto w-auto">
                    <img src="media/images/LogoBowling.png" alt="Logo" width="150" height="150">
                </span> 
            </a>

            <div id="toggled-menu" class="w-full h-screen md:h-28 absolute top-full left-0 -translate-y-full -z-10
                text-white border-b backdrop-blur-lg md:backdrop-blur-none md:bg-transparent border-gray-200 flex flex-col items-center
                md:static md:z-10 md:transform-none md:border-none md:flex-row">
                
                <ul class="w-11/12 h-5/6 mt-4 mx-auto py-4 px-2 bg-background rounded-xl text-center text-2xl font-bold font-Roboto 
                md:px-0 md:flex md:flex-row md:items-center md:rounded-none md:w-9/12 md:p-0 md:mt-0">

                    <li id="nav-item" class="py-4 text-text font-NotoSans font-extrabold text-5xl mx-auto w-11/12 mt-8 md:hidden">
                        <h1>Menu</h1>
                    </li>

                    <li id="nav-item" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0
                    border-r border-black ">
                        <a href="?url=Acceuil/" class="w-full h-full flex justify-center items-center md:text-xl">Accueil</a>
                    </li>   

                    <li id="nav-item" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0
                    border-r border-black ">
                        <a href="index.php?url=Reservations/ShowReservations" class="w-full h-full flex justify-center items-center md:text-xl">Réserver</a>
                    </li>

                    <li id="nav-item" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0
                    border-r border-black ">
                        <a href="index.php?url=Contacter/PageContact" class="w-full h-full flex justify-center items-center md:text-xl">Nous Contacter</a>
                    </li>

                    <li id="nav-item" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0 border-r border-black ">
                        <a href="<?php echo (isset($_SESSION['CONNECTER']) != "OK") ? 'index.php?url=Connexion/PageConnexion' : 'index.php?url=Connexion/EspaceClient'; ?>" class="w-full h-full flex justify-center items-center md:text-xl">Espace Client</a>
                    </li>
                </ul>
            </div>

            <button onclick="toggleNav()" aria-label="toggle button" aria-expanded="false" id="menu-btn" class="cursor-pointer w-14 md:hidden">
                <img src="media/images/burger-menu-svgrepo-com.svg" alt="" />
            </button>
        
        <?php
            if (isset($_SESSION['CONNECTER']) != "OK")
                {
                echo '<a href="?url=Connexion/PageConnexion" class="flex md:ml-10 md:mr-16">
                            <span id="logo" class="h-auto w-auto py-2 ">
                            <div class="flex flex-col items-center">
                            <img src="media/images/LogoConnexion.png" alt="Connexion" width="100" height="100">
                            </div>
                            <p class="font-Roboto font-extrabold text-center text-white bg-primary rounded-md px-2">Se Connecter</p>
                            </span> 
                        </a>';
                } else {
                    echo '<a href="?url=Connexion/Deconnexion" class="flex md:ml-10 md:mr-16">
                            <span id="logo" class="h-auto w-auto py-2 ">
                            <div class="flex flex-col items-center">
                            <img src="media/images/LogoDeconnexion.png" alt="Connexion" width="100" height="100">
                            </div>
                            <p class="font-Roboto font-extrabold text-center text-white bg-primary rounded-md px-2">Se Déconnecter</p>
                            </span> 
                        </a>';
                }
        ?>

        <!-- Bar de navigation -->
        </nav>
        <?php } else if { ?>
            <nav class="bg-accent md:bg-transparent w-full font-Roboto p-6 md:p-0 flex items-center justify-between">
            <!-- Logo -->
            <a href="index.php" class="flex md:ml-10 md:mr-16">
                <span id="logo" class="h-auto w-auto">
                    <img src="media/images/LogoBowling.png" alt="Logo" width="150" height="150">
                </span> 
            </a>
            
            <div id="toggled-menu" class="w-full h-screen md:h-28 absolute top-full left-0 -translate-y-full -z-10
                text-white border-b backdrop-blur-lg md:backdrop-blur-none md:bg-transparent border-gray-200 flex flex-col items-center
                md:static md:z-10 md:transform-none md:border-none md:flex-row">
                
                <ul class="w-11/12 h-5/6 mt-4 mx-auto py-4 px-2 bg-background rounded-xl text-center text-2xl font-bold font-Roboto 
                md:px-0 md:flex md:flex-row md:items-center md:rounded-none md:w-9/12 md:p-0 md:mt-0">
            
                    <li id="nav-item" class="py-4 text-text font-NotoSans font-extrabold text-5xl mx-auto w-11/12 mt-8 md:hidden">
                        <h1>Menu</h1>
                    </li>

                    <li id="nav-item" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0
                    border-r border-black ">
                        <a href="?url=Acceuil/" class="w-full h-full flex justify-center items-center md:text-xl">Accueil</a>
                    </li>   

                    <li id="nav-item" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0
                    border-r border-black ">
                        <a href="index.php?action=reservations/reservations" class="w-full h-full flex justify-center items-center md:text-xl">Réservation</a>
                    </li>

                    <li id="nav-item" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0
                    border-r border-black ">
                        <a href="index.php?url=Clients/clients" class="w-full h-full flex justify-center items-center md:text-xl">Clients</a>
                    </li>

                    <li id="nav-item" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0 border-r border-black ">
                        <a href="<?php echo (isset($_SESSION['CONNECTER']) != "OK") ? 'index.php?url=Connexion/PageConnexion' : 'index.php?url=Connexion/EspaceClient'; ?>" class="w-full h-full flex justify-center items-center md:text-xl">Espace Client</a>
                    </li>
                </ul>
            </div>

            <button onclick="toggleNav()" aria-label="toggle button" aria-expanded="false" id="menu-btn" class="cursor-pointer w-14 md:hidden">
                <img src="media/images/burger-menu-svgrepo-com.svg" alt="" />
            </button>
<?php
    if (isset($_SESSION['CONNECTER']) != "OK")
        {
           echo '<a href="?url=Connexion/PageConnexion" class="flex md:ml-10 md:mr-16">
                    <span id="logo" class="h-auto w-auto py-2 ">
                    <div class="flex flex-col items-center">
                    <img src="media/images/LogoConnexion.png" alt="Connexion" width="100" height="100">
                    </div>
                    <p class="font-Roboto font-extrabold text-center text-white bg-primary rounded-md px-2">Se Connecter</p>
                    </span> 
                </a>';
        } else {
            echo '<a href="?url=Connexion/Deconnexion" class="flex md:ml-10 md:mr-16">
                    <span id="logo" class="h-auto w-auto py-2 ">
                    <div class="flex flex-col items-center">
                    <img src="media/images/LogoDeconnexion.png" alt="Connexion" width="100" height="100">
                    </div>
                    <p class="font-Roboto font-extrabold text-center text-white bg-primary rounded-md px-2">Se Déconnecter</p>
                    </span> 
                </a>';
        }
?>
            </nav>
        <?php } ?>

    </header>

    <!-- Conteneur du contenue principale -->
    <div class="w-full mt-48 pt-4 md:p-4">
        <main>
            <section>
                <article>
                    <div id="message">
                        <?php $message = isset($message) ? $message : NULL; ?>
                    </div>
                    <div id="contenu">
                        <?= $contenu = isset($contenu) ? $contenu : NULL; ?>
                    </div>
                    <!-- Ne pas oublier de fermer la connection -->
                </article>
            </section>
        </main>
    </div>

    <footer class="mt-auto py-6 bg-gray-300 flex items-center justify-evenly md:flex-row flex-col text-lg">
        <a class='pt-1' href="index.php?url=Acceuil/mention">Mention légales</a>
        <p class='pt-1'>&copy; Le Bowling du Front de Mer</p>
        <!-- <a class='pt-1' href="index.php?url=Acceuil/cookie">Cookies</a> -->
    </footer>

</body>
</html>