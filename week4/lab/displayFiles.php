<!-- Start by calling autoload: -->
<?php require_once './autoload.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Upload List</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Bootstrap Theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        //Instance of a class:
        $util = new Util();
        //Check the folder for the file name:
        $directory = scandir('./uploads');
        ?>
            <table class="table">
                <thead>
                 <!-- Headers -->
                <td>File Name</td>
                <td></td>
                <td></td>
                </thead>
                    <?php foreach ($directory as $file) : ?>
                        <?php if (!is_dir($file)) : ?>
                            <?php 
                                $finfo = new finfo(FILEINFO_MIME_TYPE);
                                $size = filesize('./uploads/' . $file);                            
                            ?>
                            <tr>
                                <!-- Populate files names -->
                                <td>
                                   <?php echo basename($file);  ?>" target="_blank"> <?php echo basename($file);  ?> 
                                </td>
                                
                                
                                <td> 
                                    <form action="read.php" method="get">
                                    <input value="<?php echo $file; ?>" name="fileName" type="hidden" />
                                    <input type="submit" value="See More Info" class="btn btn-primary"/>
                                    </form>
                                    
                                </td>
                            </tr>
                            
                    <?php endif; ?>
                    <?php endforeach; ?>
                    </table>
        <!-- Templates -->
        <?php include './templates/error-messages.php'; ?>
        <?php include './templates/success-messages.php'; ?>
        <!-- Navigation -->
        <div><a href="./index.php">Add files</a></div>


    </body>
</html>
