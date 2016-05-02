<?php
//Create IMessage interface.
    interface IMessage
    {
        //The interface should have the following methods(functions).
        //addMessage($key, $msg)
        public function addMessage($key, $msg);
        //removeMessage($key)
        public function removeMessage ($key);
        //getAllMessages()
        public function getAllMessages();  
    }
    
?>

