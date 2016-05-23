<?php
//The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case the file is dbconfig.php:
include_once 'dbconfig.php';
//isset( ), This is an inbuilt function that checks if a variable has been set or not. In between the round brackets, you type what you want isset( ). Which is $_POST['btn-save']:
if(isset($_POST['btn-save']))
{   //I used the Post method to submit the form:
    $message = $_POST['message'];
    //I used the Post method to submit the form:
    $topic_id = $_POST['topic_id'];
    //$pcrud is a PHP object created somewhere, and create is a function defined in that object that is being called with the variable $topic_id and $message being passed to it:
    if($pcrud->create($topic_id,$message))
    {   //Redirect the page to the add-message.php page if the data is inserted into the database. And prompt for the message later in the code signifiying that the data has been added:
        header("Location: add-message.php?inserted");
    }
    else
    {
        //Redirect the page to the add-message.php page if the data is not inserted into the database. And prompt form the message later in the code signifiying that the data has not been added:
        header("Location: add-message.php?failure");
    }
}
?>
<!-- The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case the file is header.php: -->
<?php include_once 'header.php'; ?>
<!-- What clearfix does is to force content after the floats or the container containing the floats to render below it: -->
    <div class="clearfix"></div>


<?php
//If the varaible that has been passed through the page from earlier $pcrud->create($topic_id,$message) isset to true/inserted execture the following code:
if(isset($_GET['inserted']))
{
    ?>
    <!-- Bootstrap :: Use container for a responsive fixed width container: -->
    <div class="container">
        <!-- Bootstrap :: This alert box indicates a neutral informative change or action: -->
        <div class="alert alert-info">
            <!-- Message displayed to user and then a option to click to be redirected to the home page of the site: -->
            <strong>WOW!</strong> Record was inserted successfully <a href="index.php">HOME</a>!
        </div>
    </div>
    <?php
}
//If the vatiable that has been passed through the page from earlier $pcrud->create($topic_id,$message) isset to true/failure execute the following code:
else if(isset($_GET['failure']))
{

    ?>
    <!-- Bootstrap :: Use container for a responsive fixed width container: -->
    <div class="container">
        <!-- Bootstrap :: This alert box indicates a warning that might need attention: -->
        <div class="alert alert-warning">
            <!-- Message displayed to user: -->       
            <strong>SORRY!</strong> ERROR while inserting record !
        </div>
    </div>
    <?php
}
//Pass the rows varaible into the pcrud class and have the displaytopics method utlize the varaible for later. 
$rows = $pcrud->displaytopics();
?>
    <!-- Bootstrap :: What clearfix does is to force content after the floats or the container containing the floats to render below it: -->
    <div class="clearfix"></div><br />
    <!-- Bootstrap :: Use .container for a responsive fixed width container: -->
    <div class="container">

        <!-- The method attribute specifies how to send form-data :: or as HTTP post transaction (with method="post"): -->
        <form method='post'>
            <!-- Bootstrap :: Adds border on all sides of the table and cells: -->
            <table class='table table-bordered'>
                <!-- Table Row: -->
                <tr>
                    <!-- Table Data: -->
                    <td>Topic</td>
                    <!-- Select lists are used if you want to allow the user to pick from multiple options. In this case the topic_id's : -->
                    <td><select name='topic_id' class='form-control' required>
                    <?php
                    //For every row in the database execute the following line untill all rows have been populated:
                    foreach ($rows as $row) {
                        //In order to get both the label and the value using just PHP, you need to have both arguments as part of the value. ex  <option value="Text:5"> Text </option> :
                        echo "<option value=".$row['topic_id'].">".$row['subject']."</option>";
                    }
                    ?>
                        </select>
                    </td>

                </tr>
                <!-- Table Row: -->
                <tr>
                    <!-- Table Data: -->
                    <td>Message</td>
                    <!-- The data being entered is text with the name of subject and it is a required field: -->
                    <td><input type='text' name='message' class='form-control' required></td>
                </tr>
                <!-- Table Row: -->
                <tr>
                    <!-- Table Data with a column span across of 2. -->
                    <td colspan="2">
                        <!-- A submit button with the Bootstrap styling and its name if needed to be called is "btn-save":  -->   
                        <button type="submit" class="btn btn-primary" name="btn-save">
                            <!-- Bootstrap :: glyphicon glyphicon-plus is located on the buttons within the message board: -->
                            <span class="glyphicon glyphicon-plus"></span> Create New Topic
                        </button>
                        <!-- Index page redirect link as well as more bootstrap styling for the button as well as another glyph icon: -->
                        <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
                    </td>
                </tr>

            </table>
        </form>


    </div>
<!-- The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case it is footer.php -->
<?php include_once 'footer.php'; ?>