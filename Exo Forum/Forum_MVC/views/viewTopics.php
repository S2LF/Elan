<?php
		
	$topics = $result["data"];
	

	if ($topics == NULL) {
		echo "EUH... YA RIEN DANS TOPICS !";
		echo var_dump($topics);
	} else {
		?>
		
		<h1>Liste des Topics</h1>
		
			<?php
			foreach($topics as $topic){
			?>
			<article>
				<h1><a href="index.php?ctrl=Forum&action=viewOneTopic&id=<?= $topic['id_topic']?>"><?= $topic['title'] ?></a></h1>
				<p>Crée par <a href="index.php?id=<?= $topic['id_user'] ?>"><?= $topic['username'] ?></a> le <?= date_format(new DateTime ($topic['creation_date']), "d/m/Y à H:i") ?></p>
				<a href="index.php?ctrl=Forum&action=deleteTopic&id=<?= $topic['id_topic']?>"><i>X</i></a>
			</article>
			<?php
			}
			?>


	<?php
	}
	?>

	<form action="index.php?ctrl=Forum&action=createTopic" method="POST">
        <input type="text" 	name="title" id="title" cols="20" rows="3" placeholder="Titre du sujet"></input>
        <input type="submit" value="CREATE TOPIC !">
    </form>
