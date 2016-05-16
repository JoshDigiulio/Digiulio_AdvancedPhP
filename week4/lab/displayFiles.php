<!-- Start by calling autoload: -->
<?php require_once './autoload.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Upload List</title>
        <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

            <!-- Optional theme -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">    
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
                            
                            <tr>
                                <td>
                                    <?php echo $file; ?>
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
