<!-- Start by calling autoload: -->
<?php require_once './autoload.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Bootstrap Theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        
        <form enctype="multipart/form-data" action="#" method="POST">
            Upload file: <input name="uploadfile" type="file" />
            <input type="submit" value="Save file" />
        </form>
        <?php
        
        //Instace of a class:
        $util = new Util();
        //Errors array -- keep track of any:
        $errors = array();
        //If a request is being made to save data to the database:
        if ($util->isPostRequest())
        {          
            try 
            {
                $fileuploaded = new FileUpload();
                $keyName = 'uploadfile';
                
                $fileuploaded->submitFile($keyName);
                $message = 'Your file has been uploaded.';
            } 
            catch (Exception $ex) 
            {
                $errors[] = $ex->getMessage();
            }                
        }
        
        
        
        ?>
        
        <!-- Templates -->
        <?php include './templates/error-messages.php'; ?>
        <?php include './templates/success-messages.php'; ?>
        <!-- Navigation -->
        <div><a href="displayFiles.php">File Table</a></div>
    </body>
</html>
