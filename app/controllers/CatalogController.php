<?php

    class CatalogController
    {
        // On créé une propriété qui va nous permettre de stocker
        // pour toute la classe, les variables communes a toutes nos pages
        private $commonViewVars = [];

        public function __construct()
        {
            // Dans notre constructeur de notre controlleur
            // On va récupérer toutes les données qui sont COMMUNES
            // a toutes nos pages (en tout cas a nos pages gérées par ce controleur)
            
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

        public function category( $routeVarInfos ) 
        {
            // L'id de la catégorie que je souhaite afficher est donc stocké dans
            dump( $routeVarInfos );

            // On instancie notre model
            $categoryModel = new Category();
            // On appelle ensuite sa méthode find pour
            // récupérer la bonne catégorie (sous la forme d'un objet Category)
            $category = $categoryModel->find( $routeVarInfos['id'] );
            // dump( $category );

            // On a besoin de récup les produits, donc on instancie le modèle
            $productModel = new Product();
            // Puis on appelle la bonne méthode
            $products = $productModel->findByCategory( $routeVarInfos['id'] );

            // Je vais préparer un tableau des variables a transmettre à la vue
            // pour lui permettre de les afficher
            $viewVarsPofpof = [
                'category' => $category, // Contient un objet Category 
                'products' => $products  // Contient un tableau d'objets Product
            ];

            // On vérifie que la catégorie existe bien
            if( $category == false ) :
                echo "Catégorie introuvable";
            else :
                // Enfin je transmet ce tableau comme deuxième argument de show()
                $this->show( "product.list", $viewVarsPofpof );
            endif;
        }

        public function brand( $routeVarInfos ) 
        {            
            $this->show( "product.list" );
        }

        public function type( $routeVarInfos ) 
        {
            $this->show( "product.list" );
        }

        public function product( $routeVarInfos ) 
        {
            $this->show( "product" );
        }

        // Cette méthode n'est appellée QUE par le controleur via ses propres méthodes
        // et jamais depuis l'exéterieur, on peut la définir comme private
        private function show( $viewName, $viewVars = [] ) 
        {
            global $router;

            // On peut vérifier les variables disponibles dans chaque vue
            // en faisant un dump de viewVars
            dump( $viewVars );
            dump( $this->commonViewVars );
            
            // $viewVars est disponible dans chaque fichier de vue
            require_once __DIR__.'/../views/partials/header.tpl.php';
            require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
            require_once __DIR__.'/../views/partials/footer.tpl.php';
        }
    }