<?php

class Role {
    private $casting;
    private $role;

    public function __construct($role="")
    {
        $this->casting = [];
        $this->role = $role;
        
    }

    public function ajouterCasting(Casting $casting){
        $this->casting[] = $casting; //array_push($this->casting, $c)
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


    public function getListRole(){
        echo $this->getRole()." a été joué par: <br>";
        echo "<ul>";
        foreach($this->casting as $act){
            echo "<li>".$act->getActeur()."</li>";
        }
        echo "</ul>";
    }


    public function __toString() {

        return $this->getRole();

    }


}