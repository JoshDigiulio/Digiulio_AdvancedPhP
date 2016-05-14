<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        include './autoload.php';
        $message = new Message();
        //Add a Message -- Sucessfull 
        $message->addMessage('Sucess lets add a message!');
        
        //Get all messages -- Sucessfull
        var_dump($message->getAllMessages('Sucess here are all of the messages.'));
        var_dump($message instanceof IMessage);
        //Remove messages -- Sucessfull
        var_dump($message->removeMessage('Sucess remove a message!'));
        
        ?>
    </body>
</html>
