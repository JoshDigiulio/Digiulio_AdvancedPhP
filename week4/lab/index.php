<!-- Start by calling autoload: -->
<?php require_once './autoload.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

            <!-- Optional theme -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">    
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
