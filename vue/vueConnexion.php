<html>
 <head>
 <meta charset="utf-8">
 <!-- importer le fichier de style -->
 <link rel="stylesheet" href="CSS/output.css" media="screen" type="text/css" />
 <link rel="import" href="fonts/NotoSansSC-VariableFont_wght.ttf" />

 </head>
 <body class="bg-gray-300">
 <div class="w-5/6 bg-red-700 my-60 mx-auto">
 <!-- Connexion -->
    <form class="p-p7_5 border border-solid border-slate-50 bg-white shadow-xl h-screen" action="" method="POST">
        <h1 class="font-NotoSans font-extrabold text-8xl m-0 p-2.5 text-center">Connexion</h1>
        <input class="font-NotoSans text-xl h-20 w-full px-3 py-4 pr-5 my-8 mr-0 inline-block border-spacing-0.5 border-solid bg-gray-300 box-border" type="text" placeholder="Utilisateur" name="username" required>
        <input class="font-NotoSans text-xl h-20 w-full px-3 py-4 pr-5 my-8 mr-0 inline-block border-spacing-2 border-solid bg-gray-300 box-border" type="password" placeholder="Mot de passe" name="password" required>
        <input class="font-Roboto font-extrabold text-2xl bg-red-800 text-white my-3.5 px-10 h-16 w-auto border-none cursor-pointer rounded-full hover:bg-red-900 hover:border-solid hover:border-spacing-0.5" type="submit" id='submit' value='Se Connecter'>
    </form>
 </div>
 </body>
</html>