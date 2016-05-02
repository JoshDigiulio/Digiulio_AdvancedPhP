<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        include './autoload.php';
        $errorMessage = new ErrorMessage();
        //Test to see if adding a message has a problem.
        $errorMessage->addMessage('A Error has occured.');

        //Test to see if getting all the messages has a problem.
        var_dump($errorMessage->getAllMessages('Cannont get all of the messages.'));
        var_dump($errorMessage instanceof IMessage);
        //Test to see if removing a message has a problem.
        var_dump($errorMessage->removeMessage('Which Message is going to be removed?'));
        
        ?>
    </body>
</html>
