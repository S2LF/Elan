<?php

//Rendu monnaie en billets 10, 5 et pièces de 2 et 1 - Somme due, montant versé
$sommeDue = 151;
$montantVerse = 200;
$nb10 = 0;
$nb5 = 0;
$nb2 = 0;

echo "Montant à payer : ".$sommeDue." €<br/>";
echo "Montant versé : ".$montantVerse." €<br/>";
$reste = $montantVerse - $sommeDue;
echo "Reste à payer : ".$reste." €<br/>";

while($reste >= 10){
	$nb10 = $nb10 + 1;
	$reste = $reste - 10;
}

while($reste >= 5){
	$nb5 = $nb5 + 1;
	$reste = $reste - 5;
}

while($reste >= 2){
	$nb2 = $nb2 + 1;
	$reste = $reste - 2;
}

echo "Rendue de monnaie : " . $nb10 . " billets de 10 - " . $nb5 . " billets de 5 - " . $nb2 . " pièces de 2 - " . $reste." pièces de 1";


//Méthode avec fonction
renduMonnaie(152,200);

function renduMonnaie($montantAPayer, $montantVerse){
	$nb10 = 0;
	$nb5 = 0;
	$nb2 = 0;

	echo "Montant à payer : ".$montantAPayer." €<br/>";
	echo "Montant versé : ".$montantVerse." €<br/>";
	$reste = $montantVerse - $montantAPayer;
	echo "Reste à payer : ".$reste." €<br/>";

	while($reste >= 10){
		$nb10 = $nb10 + 1;
		$reste = $reste - 10;
	}

	while($reste >= 5){
		$nb5 = $nb5 + 1;
		$reste = $reste - 5;
	}

	while($reste >= 2){
		$nb2 = $nb2 + 1;
		$reste = $reste - 2;
	}

	echo "Rendue de monnaie : ".$nb10." billets de 10 - ".$nb5." billets de 5 - ".$nb2." pièces de 2 - ".$reste." pièces de 1";	
}

//Méthode 2
$aPayer = 152;
$verse = 200;
$reste = $verse - $aPayer;

$nb10 = floor($reste / 10);
$reste = $reste - 10 * $nb10;
$nb5 = floor($reste / 5);
$reste = $reste - 5 * $nb5;
$nb2 = floor($reste / 2);
$reste = $reste - 2 * $nb2;

echo "Billets de 10 : $nb10<br/>";
echo "Billets de 5 : $nb5<br/>";
echo "Pièces de 2 : $nb2<br/>";
echo "Pièces de 1 : $reste<br/>";

//=====================================================================================

//Initialiser un tableau de x marques de voitures. Parcourir le tableau et afficher le contenu (1 élément par ligne)

$voitures = array( 	);

echo "Il y a ". count($voitures) . " marques de voitures contenues dans le tableau :<br/>";

//méthode foreach
echo "<ul>";
foreach($voitures as $voiture){
	echo "<li>$voiture</li>";
}
echo "</ul>";

//méthode for
echo "<ul>";
for($i = 0;$i<count($voitures);$i++){
	echo "<li>$voitures[$i]</li>";
}
echo "</ul>";

//var_dump($cars);
//count($cars) compte nombre d'éléments contenu dans le tableau $cars


//=====================================================================================

//A partir d'une fonction personnalisée et à partir d'un tableau de prénom + langue du pays (clé et valeur), dire bonjour aux différentes personnes dans leur langue respective (francais = "salut", anglais = "hello", espagnol = "hola")

$prenom_langue = array("Micka"=>"FRA","Virgile"=>"ESP","Marie-Claire"=>"ENG","Michel"=>"FRA");

foreach($prenom_langue as $prenom => $langue) {
    direBonjour($prenom,$langue);
}

function direBonjour($prenom, $langue){
	switch($langue){
		case "FRA" : echo "Salut ".$prenom."<br/>";break;
		case "ESP" : echo "Hola ".$prenom."<br/>";break;
		case "ENG" : echo "Hello ".$prenom."<br/>";break;
		default : echo "Langue non gérée pour " . $prenom . "<br/>";
	}
}

//variante : trier d'abord le tableau par ordre alphabétique du prénom

$prenom_langue = array("Micka"=>"FRA","Virgile"=>"ESP","Marie-Claire"=>"ENG","Michel"=>"FRA");

ksort($prenom_langue); //trier le tableau dans l'ordre alpha de la clé (k = key)

foreach($prenom_langue as $prenom => $langue) {
    direBonjour($prenom,$langue);
}

function direBonjour($prenom, $langue){
	switch($langue){
		case "FRA" : echo "Salut ".$prenom."<br/>";break;
		case "ESP" : echo "Hola ".$prenom."<br/>";break;
		case "ENG" : echo "Hello ".$prenom."<br/>";break;
		default : echo "Langue non gérée pour ".$prenom."<br/>";
	}
}

//méthode avec 2 tableaux associatifs
$prenomsLangues = array("Mickaël" => "FRA", "Virgile" => "ESP", "Marie-Claire" => "ENG"); 	
$salutation = array("FRA" => "Salut", "ESP" => "Hola", "ENG" => "Hello");				

ksort($prenomsLangues);	//trier sur la clé (k = key)

foreach($prenom_langue as $prenom => $langue){
	if(array_key_exists($langue, $salutation)){
		echo $salutation[$langue]." $prenom<br>";
	}else{
		echo "Langue non gérée";
	}
}

$images = 
	["https://www.competencephoto.com/photo/art/grande/31056991-29406133.jpg?v=1553260189",
	 "https://resize-elle.ladmedia.fr/rcrop/638,,forcex/img/var/plain_site/storage/images/loisirs/evasion/paysage-ensoleille/90705820-1-fre-FR/Ces-paysages-ensoleilles-boosteront-votre-moral-toute-l-annee.jpg"
	];

shuffle($images);

foreach($images as $image){
	echo "<img src='$image' alt='blabla'>";
}

//=====================================================================================

//Calculer la moyenne générale d'un élève dont les notes sont renseignées dans un tableau (pas de coefficient). Elle devra être affichée avec 2 décimales.

$notes = [10,12,8,19,3,16,11,13,9];
$nbNotes = count($notes);
$somme = 0;

echo "Les notes obtenues par l'élève sont : ";

echo implode(", ", $notes);

foreach($notes as $note){
	echo $note." ";
}

$sommeNotes = array_sum($notes);
echo "<br/>La moyenne générale de l'élève est donc de : ".round($sommeNotes / $nbNotes, 2);
//ou echo number_format($sommeNotes / $nbNotes, 2, '.' ,' '); 

echo calculerMoyenne($notes2);

function calculerMoyenne($tableauNotes){
	$moyenne = round(array_sum($tableauNotes) / count($tableauNotes),2);
	return $moyenne;
}

//=====================================================================================

//Calculer l'âge exact d'une personne à partir de sa date de naissance (en années, mois, jours)

$date1 = new DateTime('1985-01-17'); 
$date2 = new DateTime("now"); 
$interval = $date1->diff($date2); 

echo $interval->format('%y ans %m mois %d jours'); 

//ou echo $interval->y . " ans " . $interval->m . " mois " . $interval->d . " jours"; 

//=====================================================================================


<?php

// instanciation de 2 objets Livre
$livre1 = new Livre("Le Seigneur des Anneaux...", 300, "Tolkien", "Mordor", "Fantasy", 35.99);
$livre2 = new Livre("Harry Potter", 350, "Rowling", "Hachette", "SF", 30.50);

echo $livre1->getTitre()." vaut ". $livre1->getPrix() . " €<br>";
$livre1->setPrix(50);
echo $livre1->getTitre()." vaut ". $livre1->getPrix() . " €<br>";
$livre1->setTitre("Le Seigneur des Anneaux : la communauté de l'Anneau");
echo $livre1->getTitre()." vaut ". $livre1->getPrix() . " €<br>";



class Livre {
	
	// attributs ou propriétés de la classe
	private $_titre;
	private $_nbPages;
	private $_auteur;
	private $_edition;
	private $_genre;
	private $_prix;
	
	// constructeur
	public function __construct($titre, $nbPages, $auteur, $edition, $genre, $prix) {
		$this->_titre = $titre;
		$this->_nbPages = $nbPages;
		$this->_auteur = $auteur;
		$this->_edition = $edition;
		$this->_genre = $genre;
		$this->_prix= $prix;
	}
	
	// Getters et setters (accesseurs et mutateurs)
	
	// GETTERS
	public function getTitre(){
		return $this->_titre;		
	}
	
	public function getNbPages(){
		return $this->_nbPages;		
	}
	
	public function getAuteur(){
		return $this->_auteur;		
	}
	
	public function getEdition(){
		return $this->_edition;		
	}
	
	public function getGenre(){
		return $this->_genre;		
	}
	
	public function getPrix(){
		return $this->_prix;		
	}
	
	// SETTERS
	public function setTitre($titre){
		$this->_titre = $titre;
	}
	
	public function setNbPages($nbPages){
		$this->_nbPages = $nbPages;
	}
	
	public function setAuteur($auteur){
		$this->_auteur = $auteur;
	}
	
	public function setEdition($edition){
		$this->_edition = $edition;
	}
	
	public function setGenre($genre){
		$this->_genre = $genre;
	}
	
	public function setPrix($prix){
		$this->_prix = $prix;
	}
	
}