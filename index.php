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
</head>
<style>
    body {
        background-color: rgb(37, 40, 41);
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
    }

    input[type="text"],
    textarea {
        padding: 10px;
        border: none;
        border-radius: 5px;
        box-shadow: 0 0 5px gray;
        margin-bottom: 10px;
        width: 300px;
        font-size: 18px;
        background-color: #454a4d;
    }

    input[type="submit"] {
        background-color: #0084ff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 18px;
    }

    input[type="submit"]:hover {
        background-color: #0066cc;
    }

    #messages {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
        max-height: 800px;
    }

    .message {
        background-color: #202324;
        color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        padding: 10px;
        margin-bottom: 10px;
        width: 400px;
        text-align: left;
    }

    .message h4 {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .message p {
        font-size: 14px;
        margin-top: 0;
        line-height: 1.5;
    }

    .message:last-child {
        margin-bottom: 0;
    }

    .message:nth-child(even) {
        background-color: #454a4d;
    }

    .message img {
        max-width: 100%;
        margin-top: 10px;
        border-radius: 5px;
    }

    #messages {
        overflow-y: scroll;
        max-height: 500px;
    }
</style>

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