<?php

    class CoreModel
    {
        //===========================================
        // Propriétés communes à tous nos Models
        //===========================================

        // On utilise la visibilité "protected" pour permettre
        // aux classes qui héritent de CoreModel de modifier ces valeurs
        protected $id;
        protected $name;
        protected $created_at;
        protected $updated_at;
        
        // Rappels 
        //  private   : moi (la classe) uniquement
        //  protected : moi (la classe), et ma famille (mes classes enfants)
        //  public    : tout le monde
        
        //===========================================
        // Getters des propriétés communes à tous nos Models
        //===========================================

        /**
         * Get the value of updated_at
         */ 
        public function getUpdatedAt()
        {
            return $this->updated_at;
        }

        /**
         * Get the value of created_at
         */ 
        public function getCreatedAt()
        {
            return $this->created_at;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
            return $this->name;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }
    }
