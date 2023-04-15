<?php
$bdd = new PDO('mysql:host=localhost;dbname=messagerie;charset=utf8;', 'ajaxuser', 'root');
if (isset($_POST['valider'])) {
    if (!empty($_POST['pseudo']) and !empty($_POST['message'])) {
        $pseudo = htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
        $message = nl2br(htmlspecialchars(($_POST['message']), ENT_QUOTES));

        $insertMsg = $bdd->prepare("INSERT INTO `messages` (`pseudo`, `message`) VALUES(?, ?)");
        $insertMsg->execute(array($pseudo, $message));
    } else {
        echo 'Veuillez compléter tous les champs [!]';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>JQUERY test</title>
    <link rel="stylesheet" href="style.min.css">
</head>
<body>
    <form id="form1" method="post" align="center">
        <input type="text" name="pseudo" />
        <br><br>
        <textarea name="message"></textarea>
        <br><br>
        <input type="submit" name="valider" value="Confirmer" />
    </form>
    <section id="messages">

    </section>

    <script>
        setInterval('load_messages()', 500);

        function load_messages() {
            $('#messages').load('messages.php');
        }
    </script>
</body>

</html>