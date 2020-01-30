<?php

    $topic = $result['data'];

    if ($topic == NULL) {
		echo "EUH... YA RIEN DANS TOPICS !";
		echo var_dump($topic);
	} else {
        
   
        
        ?><article>
        <h1><?= $topic['topic']['title']?></h1>

        <?php
        foreach($topic['messages'] as $message){
        ?>
        <div>
            <p><?= $message['text'] ?></p>
        </div>
        <div>
            <p> Par <?= $message['username'] ?> le <?= date_format(new DateTime ($message['creation_date']), "d/m/Y à H:i") ?></p>
        </div>    
            <!-- <form action="index.php?ctrl=Forum&action=deleteMessage&id=<?= $topic['topic']['id_topic']?>" method="post">
                <input type="hidden" name="id_message" id="id_message" value="<?= $message['id_message']?>" >
                <input type="submit" value="X">
            </form> -->
            <a href="index.php?ctrl=Forum&action=deleteMessage&id=<?= $topic['topic']['id_topic']?>&idMess=<?= $message['id_message']?>"><i>X</i></a>

             <!-- Update Message -->
            <form action="index.php?ctrl=Forum&action=updateMessage&id=<?= $topic['topic']['id_topic']?>" method="POST">
                <textarea name="new_text" id="new_text" cols="20" rows="3"><?= $message['text']?></textarea>
                <input type="hidden" name="id_message" id="id_message" value="<?= $message['id_message']?>" >
                <input type="submit" value="UPDATE !">
            </form>
        <?php
        }
        ?>
        </article>
    <?php
    }
    ?>


    <form action="index.php?ctrl=Forum&action=createMessage&id=<?= $topic['topic']['id_topic']?>" method="POST">
        <textarea name="message" id="message" cols="20" rows="3" placeholder="votre message"></textarea>
        <input type="submit" value="CREATE !">
    </form>

