<?php

//File Upload:
class FileUpload 
{
    private function testFile($keyName) 
    {
        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if (!isset($_FILES[$keyName]['error']) || is_array($_FILES[$keyName]['error'])) 
        {
            throw new RuntimeException('Oops! something went wrong!.');
        }
        // Check $_FILES['upfile']['error'] value.
        switch ($_FILES[$keyName]['error']) 
        {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file selected.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('File to large.');
            default:
                throw new RuntimeException('Oops! something went wrong.');
        }
    }
    // You should also check filesize here.
    private function validSize($keyName) 
    {
        if ($_FILES[$keyName]['size'] > 1000000) 
        {
            throw new RuntimeException('The file is to big.');
        }
    }
    
    private function validExten($keyName)
    {
        // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
                // Check MIME Type by yourself.
            //Make sure file has one of these extensions:
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $validExts = array(
                'txt' => 'text/plain', 
                'html' => 'text/html', 
                'pdf' => 'application/pdf', 
                'doc' => 'application/msword', 
                'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
                'xls' => 'application/vnd.ms-excel', 
                'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 
                'jpg' => 'image/jpeg', 
                'png' => 'image/png', 
                'gif' => 'image/gif' 
                
            );
            
            $ext = array_search($finfo->file($_FILES[$keyName]['tmp_name']), $validExts, true);
            
            if (false === $ext) 
            {
                throw new RuntimeException('Oops! something went wrong.');
            }
            else 
            {
                $this->isFileUploaded($ext, $keyName);
            }
    }
    
    public function isFileUploaded($ext, $upfile) 
    {
        $salt = uniqid(mt_rand(), true);
        $fileName = 'img_' . sha1($salt . sha1_file($_FILES[$upfile]['tmp_name']));
        
        $location = sprintf('./uploads/%s.%s', $fileName, $ext);
        $this->moveFile($location, $upfile);
    }
    
    private function moveFile($location, $keyName)
    {
        if (!is_dir('./uploads')) 
        {
                mkdir('./uploads');
        }

            if (!move_uploaded_file($_FILES[$keyName]['tmp_name'], $location)) 
            {
                throw new RuntimeException('Failed to move uploaded file.');
            }
            
    }

    
    public function submitFile($keyName) 
    {
        $this->testFile($keyName);
        $this->validSize($keyName);
        $this->validExten($keyName);
    }

}
