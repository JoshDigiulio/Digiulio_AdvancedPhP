<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
                require_once './autoload.php';
        
                 $message = new Message();
                 
                 $message->addMessage('Hello', 'First message');
                 $message->addMessage('Hello Two', 'Second message');
                 
                 var_dump($message->getAllMessages());
                 
                 $message->removeMessage('Hello');
                 var_dump($message->getAllMessages());
                
        
        ?>
        
     
        
    </body>
</html>
