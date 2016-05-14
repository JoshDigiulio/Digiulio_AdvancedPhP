<?php
//Delete File:
class DeleteFile 
{
    public function deleteFile($file)
    {
          unlink('./uploads/' . $file);
    }
}
