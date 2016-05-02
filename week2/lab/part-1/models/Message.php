<?php
    //Create a Message class that implements the IMessage interface.
    class Message implements IMessage
    {
        var $messages = array ();

        public function addMessage($key, $msg)
        {
            $this->messages[$key] = $msg;
        }

        public function removeMessage ($key)
        {
            unset($this->messages[$key]);  
        }

         public function getAllMessages()
        {
            return $this->messages;
        }
    }
    
?>
