<?php


class Genre {
    private $genre;
    private $films;

    public function __construct($genre="")
    {
        $this->genre = $genre;
        $this->films = [];
    }

    
    public function getGenre()
    {
        return $this->genre;
    }
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }


    public function ajouterFilm(Film $film){
        $this->films[]= $film;
    }


    public function getListFilm(){
        echo $this->getGenre()." contient : <br>";
        echo "<ul>";
        foreach($this->films as $film){
            echo "<li>".$film->getTitre()."</li>";
        }
        echo "</ul>";
    }
}