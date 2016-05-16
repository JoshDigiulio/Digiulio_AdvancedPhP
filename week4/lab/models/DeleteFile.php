<?php
//Delete File:
class DeleteFile 
{
    public function deleteFile($file)
    {
          if (unlink('./uploads/' . $file)) 
          {
                
                throw new RuntimeException('Not Deleted' . $file);
          } 
          else 
          {
                throw new RuntimeException('Deleted' . $file);
          }
    }   
}
