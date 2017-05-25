<?php

require_once("php/database.php");

session_start();

$errorMessage = "";

// Prints the name of users that has already chatted with actual user, in the dropdown menu
function activeChats($email)
{

    $htmlCodeToReturn = "";
    $connection = db_connection();

    //$query = "SELECT DISTINCT * FROM chat WHERE user2='$email'
    //          UNION SELECT DISTINCT * FROM chat WHERE user1='$email' ORDER BY unread2 DESC, unread1 DESC";


    $query = "SELECT DISTINCT idChat, user1, user2, unread2 AS unread FROM chat WHERE user2='$email'
              UNION SELECT DISTINCT idChat, user1, user2, unread1 AS unread FROM chat WHERE user1='$email' ORDER BY unread DESC";

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result)) {

        $who = "";
        $idChat = $row['idChat'];

        if ($row['user1'] == $email) {
            if ($row['unread'])
                $who .= "&#x26AB;";
            else
                $who .= "&nbsp;&nbsp;&nbsp;";

            $who .= $row['user2'];
        } else {
            if ($row['unread'])
                $who .= "&#x26AB;";
            else
                $who .= "&nbsp;&nbsp;&nbsp;";

            $who .= $row['user1'];
        }

        $htmlCodeToReturn .=
            '<li>
                <form  action="chat.php" method="post">
                    <input type="hidden" name="idChat" id="idChat" value="' . $idChat . '">
                    <input class="linkButton" type="submit" name="clickedConversation" value="' . $who . '">
                </form>
            </li>';

    }

    echo mysqli_error($connection);
    mysqli_close($connection);

    return $htmlCodeToReturn;

}


/**
 * @param $from
 * @param $to
 * @param $text
 * @return bool
 */
/// Send a message to a user, saving it into the db, return true if saved correctly
/// DB:
///  idMess(AUTOINCREMENT) ,
///  idChat ( = $_SESSION['idChat'] ),
///  userFrom ( = $_SESSION['email']) - for the moment -
///  text ( parameter )
///  timestamp ( AUTO )
function sendMessage($idChat, $from, $text)
{

    $connection = db_connection();

    if (mysqli_connect_errno($connection)) {
        mysqli_close($connection);
        return false;
    }

    if ($statement = mysqli_prepare($connection, "INSERT INTO messages VALUES(DEFAULT, ?, ?, ?, DEFAULT)")) {
        $correctlySent = false;

        mysqli_stmt_bind_param($statement, "iss", $idChat, $from, $text);
        mysqli_stmt_execute($statement);

        if (mysqli_stmt_affected_rows($statement) === 1)
            $correctlySent = true;

        mysqli_stmt_close($statement);

        $query = "UPDATE chat SET unread2 = true WHERE idChat=$idChat AND user1='$from'";
        mysqli_query($connection, $query);
        // case 2: active user is user2 in db
        if (mysqli_affected_rows($connection) == 0) {
            $query = "UPDATE chat SET unread1 = true WHERE idChat=$idChat AND user2='$from'";
            mysqli_query($connection, $query);
        }


        return $correctlySent;
    }


    return false;

}


// Retrieve and return messages of the selected chat, known the idChat and who is the actual user
function myMessages($email)
{

    $htmlCodeToReturn = "";

    if (isset($_SESSION["idChat"]) && !empty($_SESSION["idChat"])) {

        $connection = db_connection();
        $idChat = $_SESSION['idChat'];

        //$query = "SELECT user_from, user_to, text FROM chat WHERE ((user_from='$email' AND user_to='$otherUser')
        //      OR (user_from='$otherUser' AND user_to='$email')) ORDER BY timestamp ASC";

        $query = "SELECT userFrom, text FROM messages WHERE idChat = $idChat ORDER BY timestamp ASC";

        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($result)) {

            if ($row['userFrom'] == $email)
                $htmlCodeToReturn .= '<div class="sentMessage">';
            else
                $htmlCodeToReturn .= '<div class="receivedMessage">';

            $htmlCodeToReturn .= "<p><b>" . $row['userFrom'] . "</b>:<br>" . $row['text'];
            $htmlCodeToReturn .= "</p></div><br>";
        }

        mysqli_close($connection);
    }
    return $htmlCodeToReturn;
}

function setMessagesRead($activeUser)
{

    if (isset($_SESSION["idChat"]) && !empty($_SESSION["idChat"])) {

        $connection = db_connection();
        $idChat = $_SESSION['idChat'];
        //$query = "UPDATE chat SET unread_to=false WHERE ( user_to= '$email' AND user_from='$otherUser' )" ;
        // case 1: active user is user1 in db
        $query = "UPDATE chat SET unread1 = false WHERE idChat=$idChat AND user1='$activeUser'";
        mysqli_query($connection, $query);
        // case 2: active user is user2 in db
        if (mysqli_affected_rows($connection) == 0) {
            $query = "UPDATE chat SET unread2 = false WHERE idChat=$idChat AND user2='$activeUser'";
            mysqli_query($connection, $query);
        }
        mysqli_close($connection);
    }

    return;
}

// Executed when a message has been sent
if (isset($_POST['sendMessage']) &&
    isset($_POST['textMessage']) &&
    !empty($_POST['textMessage'])
) {

    if (sendMessage(intval($_SESSION['idChat']), $_SESSION['email'], $_POST['textMessage']))
        $errorMessage = "message sent succesfully";
    else
        $errorMessage = "ERROR SENDING MESSAGE";

    $_POST['send'] = null;

}

// Saves the idChat in $_SESSION['idChat'] to retrieve it
if (isset($_POST['idChat']) && !empty($_POST['idChat'])) {

    $_SESSION['idChat'] = $_POST['idChat'];

}

?>

<!DOCTYPE html>
<head>
    <title>Hack your town</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/scrolling-nav.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="css/home_custom.css" rel="stylesheet">
    <link href="css/chatPage.css" rel="stylesheet">

</head>

<body>


<?php
include("navbarByAF.php");
?>

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select a conversation ...
        <span class="caret"></span>
    </button>

    <ul class="dropdown-menu">
        <?php
        echo activeChats($_SESSION['email']);
        ?>
    </ul>
</div>

<div id="chatBox" class="pre-scrollable">
    <br>
    <?php
    echo myMessages($_SESSION['email']);
    setMessagesRead($_SESSION['email']);
    echo $errorMessage . "<br>";
    ?>

</div>

<div id="sendMessageForm">
    <form action="" method="POST">
        <div class="input-group input-group-lg">
            <input type="text" class="form-control" id="text" name="textMessage" placeholder="Type here... ">
            <span class="input-group-btn">
           <button class="btn btn-default" type="submit" name="sendMessage">Send</button>
       </span>
        </div>
    </form>
</div>

</body>

<script>
    var objDiv = document.getElementById("chatBox");
    objDiv.scrollTop = objDiv.scrollHeight;
</script>

</html>
