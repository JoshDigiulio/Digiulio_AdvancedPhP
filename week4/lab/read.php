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
        <?php
        // http://php.net/manual/en/class.directoryiterator.php
        //DIRECTORY_SEPARATOR 

        $folder = './uploads';
        if ( !is_dir($folder) )
        {
            die('Folder <strong>' . $folder . '</strong> does not exist' );
        }
        
        if (array_key_exists('deleteFile', $_POST)) 
        {
            $fileName = $folder . "/" . filter_input(INPUT_POST, 'deleteFile');
            if (file_exists($fileName))
            {
               
                unlink($fileName);
                header( "Location: displayFiles.php" );
                
            }
            else
            {
                header( "Location: read.php" );
            }
        }
        
        $directory = new DirectoryIterator($folder);

        $fileNameGet = filter_input(INPUT_GET, 'fileName');
        
        ?>
                     
        <?php foreach ($directory as $fileInfo) : ?>        
            <?php if ( $fileInfo->isFile() && $fileInfo->getFilename() == $fileNameGet ) : ?>
                                 
                <h2><?php echo $fileInfo->getFilename(); ?></h2>
                <p> Download <a href="./uploads/<?php echo basename($fileInfo);  ?>" target="_blank"> <?php echo basename($fileInfo);  ?> </a></p>   
                
                <p>This file is a <?php echo $fileInfo->getExtension(); ?></p>
                
                
                <p>This file was uploaded on <?php echo date("l F j, Y, g:i a", $fileInfo->getMTime()); ?></p>
                
                
                <p>This file is <?php echo $fileInfo->getSize(); ?> byte's</p>
                
                <a href="displayFiles.php">File Table</a>
                 </br>
                  <a href="index.php">Add File</a>       
                  </br>

                  
                  
                  
                  <form method="post">
                    <input type="hidden" value="<?php echo $fileInfo ?>" name="deleteFile" />
                    <input type="submit" value="Delete File" class="btn btn-danger"/>
                </form>
                
                </br>
                
                <?php if ( $fileInfo->getExtension() == "txt" ) : ?>
                    <textarea rows="20" cols="50">//<?php echo file_get_contents($fileInfo->getPathName());?></textarea>
                <?php endif; ?> 
                    
                <?php if ( $fileInfo->getExtension() == "html") : ?>
                    <a href="//<?php echo $fileInfo->getPathname(); ?>" download>Download</a>
                <?php endif; ?>
                    
                <?php if ( $fileInfo->getExtension() == "doc") : ?>
                    <a href="//<?php echo $fileInfo->getPathname(); ?>" download>Download</a>
                <?php endif; ?>
                    
                <?php if ( $fileInfo->getExtension() == "docx") : ?>
                    <a href="//<?php echo $fileInfo->getPathname(); ?>" download>Download</a>
                <?php endif; ?>
                    
                <?php if ( $fileInfo->getExtension() == "xls") : ?>
                    <a href="//<?php echo $fileInfo->getPathname(); ?>" download>Download</a>
                <?php endif; ?>
                    
                <?php if ( $fileInfo->getExtension() == "xlsx") : ?>
                    <a href="//<?php echo $fileInfo->getPathname(); ?>" download>Download</a>
                <?php endif; ?>
                    
                 <?php if ( $fileInfo->getExtension() == "pdf" ) : ?>
                    <embed src="//<?php echo $fileInfo->getPathname(); ?>" type="application/pdf" width="500" height="500"/>
                 <?php endif; ?>   
                    
                <?php if ( $fileInfo->getExtension() == "jpg" ) : ?>
                    <img src="<?php echo $fileInfo->getPathname(); ?>" />
                <?php endif; ?>
                   
                <?php if ( $fileInfo->getExtension() == "png") : ?>
                    <img src="<?php echo $fileInfo->getPathname(); ?>" />
                <?php endif; ?>
                    
                <?php if ($fileInfo->getExtension() == "gif" ) : ?>
                    <img src="<?php echo $fileInfo->getPathname(); ?>" />
                <?php endif; ?>
              
            <?php endif; ?>
        <?php endforeach; ?>
        

    </body>
</html>
