<?php

//File Upload:
class FileUpload 
{
    private function testFile($keyName) 
    {
        if (!isset($_FILES[$keyName]['error']) || is_array($_FILES[$keyName]['error'])) 
        {
            throw new RuntimeException('Oops! something went wrong!.');
        }
        
        switch ($_FILES[$keyName]['error']) 
        {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file selected.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('File to larage.');
            default:
                throw new RuntimeException('Oops! something went wrong.');
        }
    }

    private function validSize($keyName) 
    {
        if ($_FILES[$keyName]['size'] > 5000000) 
        {
            throw new RuntimeException('The file is to big.');
        }
    }
    
    private function validExten($keyName)
    {
            //Make sure file has one of these extensions:
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $validExts = array(
                'txt' => 'text/plain', //ok
                'html' => 'text/html', //ok
                'pdf' => 'application/pdf', //ok
                'doc' => 'application/msword', //ok
                'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', //ok
                'xls' => 'application/vnd.ms-excel', //ok
                'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', //ok
                'jpg' => 'image/jpeg', //ok
                'png' => 'image/png', //ok
                'gif' => 'image/gif' //ok
                
            );
            $ext = array_search($finfo->file($_FILES[$keyName]['tmp_name']), $validExts, true);
            
            if (false === $ext) 
            {
                throw new RuntimeException('Oops! something went wrong.');
            }
            else 
            {
                $this->setFileName($ext, $keyName);
            }
    }
    
    private function setFileName($ext, $keyName)
    {
                // You should name it uniquely.
                // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
                // On this example, obtain safe unique name from its binary data.

            $fileName = sha1_file($_FILES[$keyName]['tmp_name']);
            $location = sprintf('./uploads/%s.%s', $fileName, $ext);
            $this->moveFile($location, $keyName);
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
