<?php
    namespace app\controllers;

    use \app\models\Category;
    use \app\models\Product;

    class CatalogController extends CoreController
    {
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
            // TODO Atelier : Dynamiser tout ce bazar :D         
            $this->show( "product.list" );
        }

        public function type( $routeVarInfos ) 
        {
            // TODO Atelier : Dynamiser tout ce bazar :D
            $this->show( "product.list" );
        }

        public function product( $routeVarInfos ) 
        {
            // TODO Atelier : Dynamiser tout ce bazar :D
            $this->show( "product" );
        }
    }