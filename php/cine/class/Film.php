<?php



class Film {

    private $titre;
    private $duree;
    private $dateSortie;
    private $synopsis;
    private $genre;
    private $real;
    private $casting;

    public function __construct($titre="", $duree=0, $dateSortie="", $synopsis="", Genre $genre, Real $real)
    {
        $this->titre = $titre;
        $this->duree = $duree;
        $this->dateSortie = new DateTime($dateSortie);
        $this->synopsis = $synopsis;
        $this->genre = $genre;
        $genre->ajouterFilm($this);
        $this->real = $real;
        $real->ajouterFilm($this);
        $this->casting= [];
        }


    public function getTitre()
    {
        return $this->titre;
    }
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDuree()
    {
        return date('G\hi', mktime(0,$this->duree));
    
    }
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDateSortie()
    {
        return $this->dateSortie->format('Y');
    }
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getSynopsis()
    {
        return $this->synopsis;
    }
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
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


    public function getReal()
    {
        return $this->real;
    }
    public function setReal($real)
    {
        $this->real = $real;

        return $this;
    }
    
    public function getActeurs()
    {
        return $this->acteurs;
    }
    public function setActeurs($acteurs)
    {
        $this->acteurs = $acteurs;

        return $this;
    }

    public function ajouterCasting(Casting $casting){
        $this->casting[] = $casting; //array_push($this->casting, $c)
    }
    public function getCasting()
    {
        return $this->casting;
    }

    
    public function getListCasting(){
        echo "Les acteur(trices) de ".$this->getTitre()." sont :";
        echo "<ul>";
        foreach($this->getCasting() as $cast){
            echo "<li>".$cast->getActeur()." dans le rôle de ".$cast->getRole();
        }
        echo "</ul>";
    }


    public function __toString(){
        return "<span>*****Infos Film*****</span><br>
        <span>Titre:</span> ".$this->getTitre()."<br>
        <span>Date de sortie:</span> ".$this->getDateSortie()."<br>
        <span>Durée:</span> ".$this->getDuree()."min<br>
        <span>Réalisateur:</span> ".$this->getReal()."<br>
        <span>Synopsis:</span> ".$this->getSynopsis()."<br>";
    }
    
}