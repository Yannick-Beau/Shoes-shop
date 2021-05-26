<?php
    // Notre point d'entrée unique pour toutes les pages du projet

    // On inclus l'autoload de composer qui va chercher tout le code
    // qu'on a piqué chez les copains dev avec Composer :D
    require_once __DIR__ . "/../vendor/autoload.php";

    // On inclus nos utilitaires
    require_once __DIR__ . "/../app/utils/Database.php";

    // On pense a inclure le fichier qui contient la classe MainController  
    require_once __DIR__ . "/../app/controllers/MainController.php";
    require_once __DIR__ . "/../app/controllers/CatalogController.php";

    // On inclus nos Models
    require_once __DIR__ . "/../app/models/CoreModel.php";
    require_once __DIR__ . "/../app/models/Brand.php";
    require_once __DIR__ . "/../app/models/Type.php";
    require_once __DIR__ . "/../app/models/Category.php";
    require_once __DIR__ . "/../app/models/Product.php";


    // On récupère notre partie "fixe" de l'URL
    // Ici, le chemin entre localhost et le dossier S05-projet-oshop-blue/public
    // dump( $_SERVER['BASE_URI'] );

    //================== DISPATCHER ======================
    
    // On instancie AltoRouter
    $router = new AltoRouter();

    // On doit préciser a AltoRouter dans quel sous-dossier on se trouve
    // sinon il va essayer de faire correspondre les URL des routes
    // à partir de localhost/ (ou du nom de domaine en général)
    $router->setBasePath( $_SERVER['BASE_URI'] );

    // On "mappe" nos routes
    // En gros, on dit a AltoRouter de mettre les routes
    // suivantes dans un tableau (interne à la classe)
    // On le fait grace a la méthode map()

    // On peut le faire en passant un tableau en 3eme paramètre
    // $router->map( "GET", "/", [
    //     "controller" => "MainController",
    //     "method"     => "home",
    // ] , "main.home" ); // Route home

    // Détail de la méthode map : 
    // 1er argument  : La méthode HTTP = pour l'instant, on reste avec "GET"
    // 2eme argument : L'URL (ou le modèle d'URL) qui va correspondre a cette route
    // 3eme argument : Qu'est-ce qu'on fait si on demande cette route ? 
    //                 on fait une chaine de caractère qui contient
    //                 les mêmes infos (nom du controller et de la méthode)
    //                 que l'ont sépare par un caractère spécial au choix (ici @)
    // 4eme argument : Nom de la route a titre indicatif. Par convention, on l'appelle
    //                 avec le nom du controller . le nom de la méthode appellée
    
    // MainController
    $router->map( "GET", "/",                  "MainController@home",        "main.home"        ); // Route accueil
    $router->map( "GET", "/legal",             "MainController@legal",       "main.legal"       ); // Route mention légales
    
    // CatalogController
    $router->map( "GET", "/category/[i:id]",   "CatalogController@category", "catalog.category" ); // Route articles par catégorie
    $router->map( "GET", "/brand/[i:id]",      "CatalogController@brand",    "catalog.brand"    ); // Route articles par marque
    $router->map( "GET", "/type/[i:id]",       "CatalogController@type",     "catalog.type"     ); // Route articles par type
    $router->map( "GET", "/product/[i:id]",    "CatalogController@product",  "catalog.product"  ); // Route fiche produit
    
    // Ici, on demande a AltoRouter de récupérer les infos de la route qui 
    // 'match' (correspond) à l'URL actuellement demandée
    // Match ne fait QUE retourner les infos de la route qui correspond
    // C'est a nous d'executer la bonne action (ici instancier le controller et call la méthode)
    // $router->match() renvoi ces infos sous forme d'un tableau associatif à 3 entrées :
    // [
    //   "target" => Qui va contenir "l'action" a faire (le 3e parametre de ->map() ),
    //   "params" => Qui va contenir les variables de l'URL (un tableau vide s'il n'y en a pas),
    //   "name"   => Le nom de la route qui match
    // ]
    // Si $router->match() ne trouve aucune route qui correspond, $routeInfo vaudra false (et ne sera donc pas un tableau)
    $routeInfo = $router->match();
    // dump( $routeInfo );

    // Gestion des 404
    if( $routeInfo === false ) :
        // On aurait aussi pu gérer ça dans une méthodé
        // error de MainController, voire faire un ErrorController
        http_response_code( 404 );
        echo "Page non trouvée (404 Not Found)";
        exit(); // On arrêt ele script ici, on essaye pas de dispatch
    endif;

    //================== DISPATCHER ======================
    // C'est celui qui instancie le bon controleur execute la méthode
    // et qui appelle la bonne méthode

    // Les deux informations se trouvent dans $routeInfo['target']
    // Actuellement elles sont collées par un symbole, ici @
    // On utilise la fonction explode de PHP qui va "découper" la chaine
    // et en faire un tableau qui contiendra les morceaux (sans le @)
    $routeInfoArray = explode( "@", $routeInfo['target'] );
    // dump( $routeInfoArray );

    // On repart comme avant, en récupérant nos deux noms
    $controllerName = $routeInfoArray[0]; // Nom du contrôleur
    $methodName     = $routeInfoArray[1]; // Nom de la méthode

    // On instancie ensuite dynamiquement un controlleur dont le nom
    // est stocké dans la variable $controllerName
    $controller = new $controllerName();
    
    // Puis on appelle tout aussi dynamiquement sa méthode dont le nom
    // est stocké dans la variable $methodName
    // On va lui donner également toute variable passée dans l'URL
    // Cette info se trouve sous forme de tableau dans $routeInfo['params']
    $controller->$methodName( $routeInfo['params'] );

    // TODO BONUS : Gérer l'erreur 404 si $routeInfo vaut false ;)