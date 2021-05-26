<?php
    // Dans le cadre de la méthode Active Record :
    //  - Un classe = Une entité dans le MCD = Une table en DB
    //  - Une propriété de cette classe = un champ de cette table
    //  - Un objet instancié de cette classe = une ligne dans la table (un enregistrement)

    // Nom de la classe = Nom de la table (sans les maj)
    class Product extends CoreModel
    {
        //===========================================
        // Propriétés (=> champs de la table)
        //===========================================
     
        private $description;
        private $picture;
        private $price;
        private $rate;
        private $status;        
        
        // Foreign Keys
        private $brand_id;
        private $category_id;
        private $type_id;

        //===========================================
        // Méthodes
        //===========================================

        public function find( $id ) 
        {
            $pdo = Database::getPDO();
            $sql = "SELECT * FROM `product` WHERE `id` = $id";
            $statement = $pdo->query( $sql );
            return $statement->fetchObject( "Product" );
        }
        
        public function findAll() 
        { 
            $pdo = Database::getPDO();            
            $sql = "SELECT * FROM `product`";
            $statement = $pdo->query( $sql );            
            return $statement->fetchAll( PDO::FETCH_CLASS, "Product" );
        }

        public function findByCategory( $category_id )
        { 
            $pdo = Database::getPDO();            
            $sql = "SELECT * FROM `product` WHERE `category_id` = $category_id";
            $statement = $pdo->query( $sql );            
            return $statement->fetchAll( PDO::FETCH_CLASS, "Product" );
        }

        //===========================================
        // Getters
        //===========================================

        /**
         * Get the value of status
         */ 
        public function getStatus()
        {
            return $this->status;
        }

        /**
         * Get the value of rate
         */ 
        public function getRate()
        {
            return $this->rate;
        }

        /**
         * Get the value of price
         */ 
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * Get the value of picture
         */ 
        public function getPicture()
        {
            return $this->picture;
        }

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * Get the value of type_id
         */ 
        public function getTypeId()
        {
            return $this->type_id;
        }

        /**
         * Get the value of category_id
         */ 
        public function getCategoryId()
        {
            return $this->category_id;
        }

        /**
         * Get the value of brand_id
         */ 
        public function getBrandId()
        {
            return $this->brand_id;
        }
    }