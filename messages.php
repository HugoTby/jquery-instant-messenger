<?php
$bdd = new PDO('mysql:host=localhost;dbname=messagerie;charset=utf8;','ajaxuser','root');

$recupMsg = $bdd->query("SELECT * FROM messages");
while ($message = $recupMsg->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="message">
            <h4><?= $message['pseudo']; ?></h4>
            <p><?= $message['message']; ?></p>
        </div>
    <?php
}

?>