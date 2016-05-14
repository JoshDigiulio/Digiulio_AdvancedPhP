<?php
//Remove file:
class Remove 
{
    public function removeFile($file)
    {
        unlink('./uploads/' . $file);
    }
}
