<?php

    // On dit a PHP de "ranger" notre CoreController dans
    // un "dossier virtuel" qui s'appelle app\controllers
    namespace app\controllers;

    use \app\models\Brand;
    use \app\models\Type;

    class CoreController
    {
        // On créé une propriété qui va nous permettre de stocker
        // pour toute la classe, les variables communes a toutes nos pages
        protected $commonViewVars = [];

        // Dans notre constructeur de notre controlleur
        // On va récupérer toutes les données qui sont COMMUNES
        // a toutes nos pages (en tout cas a nos pages gérées par ce controleur)
        public function __construct()
        {
            // Les 5 marques du footer
            $brandModel = new Brand();
            $footerBrands = $brandModel->findForFooter();

            // Les 5 types de produit du footer
            $typeModel = new Type();
            $footerTypes = $typeModel->findForFooter();

            // dump( $footerBrands );
            // dump( $footerTypes );
            
            // Je stocke la liste des 5 types dans mon tableau
            // qui contient les variables communes à toutes mes pages
            // Je créé pour ça une nouvelle clé "footerTypes" dans ce tableau
            $this->commonViewVars['footerTypes'] = $footerTypes;

            // Je fais pareil pour les 5 marques
            $this->commonViewVars['footerBrands'] = $footerBrands;
        }

        // Cette méthode n'est appellée QUE par le controleur via ses propres méthodes
        // et jamais depuis l'exéterieur, on peut la définir comme private
        protected function show( $viewName, $viewVars = [] ) 
        {
            global $router;

            // A partir de là 3 solutions :
            // - utiliser $this->commonViewVars directement dans les vues
            
            // - recopier les cases de $this->commonViewVars dans $viewVars
            //    $viewVars['footerTypes']  = $this->commonViewVars['footerTypes'];
            //    $viewVars['footerBrands'] = $this->commonViewVars['footerBrands'];
            
            // - fusionner les deux tableaux $this->commonViewVars dans $viewVars
            //   Et là encore, deux façon de le faire :
            //    - La façon "simple" : on fait un sous-tableau à la clé common de $viewVars
            $viewVars['common'] = $this->commonViewVars;
            //    - La façon "efficace" : on fusionne les deux => on met les clés de deux dans un seul tableau
            //      $viewVars = array_merge( $viewVars, $this->commonViewVars );

            // /!\ Attention a ne pas faire ça, sinon on REMPLACE $viewVars et on perds 
            // les variables spécifiques a la vue /!\
            //  - $viewVars = $this->commonViewVars;


            // On peut vérifier les variables disponibles dans chaque vue
            // en faisant un dump de viewVars
            dump( $viewVars );
            // dump( $this->commonViewVars );

            // $viewVars est disponible dans chaque fichier de vue
            require_once __DIR__.'/../views/partials/header.tpl.php';
            require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
            require_once __DIR__.'/../views/partials/footer.tpl.php';
        }
    }