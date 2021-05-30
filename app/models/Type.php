<?php
    namespace app\models;

    use \app\utils\Database;
    use \PDO;
    
    // Dans le cadre de la méthode Active Record :
    //  - Un classe = Une entité dans le MCD = Une table en DB
    //  - Une propriété de cette classe = un champ de cette table
    //  - Un objet instancié de cette classe = une ligne dans la table (un enregistrement)

    // Nom de la classe = Nom de la table (sans les maj)
    class Type extends CoreModel
    {
        //===========================================
        // Propriétés (=> champs de la table)
        //===========================================

        private $footer_order;

        //===========================================
        // Méthodes
        //===========================================

        public function find( $id ) 
        {
            $pdo = Database::getPDO();
            $sql = "SELECT * FROM `type` WHERE `id` = $id";
            $statement = $pdo->query( $sql );
            return $statement->fetchObject( "app\models\Type" );
        }
        
        public function findAll() 
        { 
            $pdo = Database::getPDO();            
            $sql = "SELECT * FROM `type`";
            $statement = $pdo->query( $sql );            
            return $statement->fetchAll( PDO::FETCH_CLASS, "app\models\Type" );
        }
        
        public function findForFooter() 
        {
            $pdo = Database::getPDO();            
            $sql = "SELECT * FROM `type` WHERE `footer_order` > 0 ORDER BY `footer_order` ASC";
            $statement = $pdo->query( $sql );            
            return $statement->fetchAll( PDO::FETCH_CLASS, "app\models\Type" );
        }

        //===========================================
        // Getters
        //===========================================

        /**
         * Get the value of footer_order
         */ 
        public function getFooterOrder()
        {
            return $this->footer_order;
        }
    }