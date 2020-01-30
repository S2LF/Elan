<?php

	$topics = $result["data"];
	

	if ($topics == NULL) {
		echo "EUH... YA RIEN DANS TOPICS !";
		echo var_dump($topics);
	} else {
		?>
		
		
			<?php
			foreach($topics as $topic){
			?>
			<article>
				<h1><a href="index.php?ctrl=Forum&action=viewOneTopic&id=<?= $topic['id_topic']?>"><?= $topic['title'] ?></a></h1>
				<p>Crée par <a href="index.php?id=<?= $topic['id_user'] ?>"><?= $topic['username'] ?></a> le <?= $topic['creation_date'] ?></p>
			</article>
			<?php
			}
			?>


	<?php
	}
	