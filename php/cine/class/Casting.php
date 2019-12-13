<?php

class Casting {
    private $film;
    private $acteur;
    private $role;

    public function __construct(Film $film, Acteur $acteur, Role $role)
    {
        $this->film = $film;
        $this->acteur = $acteur;
        $this->role = $role;
        $film->ajouterCasting($this);
        $acteur->ajouterCasting($this);
        $role->ajouterCasting($this);
    }

    


    /**
     * Get the value of film
     */ 
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * Set the value of film
     *
     * @return  self
     */ 
    public function setFilm($film)
    {
        $this->film = $film;

        return $this;
    }

    /**
     * Get the value of acteur
     */ 
    public function getActeur()
    {
        return $this->acteur;
    }

    /**
     * Set the value of acteur
     *
     * @return  self
     */ 
    public function setActeur($acteur)
    {
        $this->acteur = $acteur;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
}