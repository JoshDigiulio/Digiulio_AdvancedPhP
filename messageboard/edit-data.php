<?php
//The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case the file is dbconfig.php:
include_once 'dbconfig.php';
//isset( ), This is an inbuilt function that checks if a variable has been set or not. In between the round brackets, you type what you want isset( ). Which is $_POST['btn-upadate']:
if(isset($_POST['btn-update']))
{
        //Get the value of edit_id and set it to the topic id:
	$topic_id = $_GET['edit_id'];
        //I used the Post method to submit the form:
	$subject = $_POST['subject'];
        //$crud is a PHP object created somewhere, and upade is a function defined in that object that is being called with the variable $topic_id and $subject being passed to it:
	if($crud->update($topic_id,$subject))
	{
                //Stores this message in msg to show to the user later on with the redirect link to the index page:
		$msg = "<div class='alert alert-info'>
				<strong>WOW!</strong> Record was updated successfully <a href='index.php'>HOME</a>!
				</div>";
	}
	else
	{
                //Stores this message in  msg to show to the user later on:
		$msg = "<div class='alert alert-warning'>
				<strong>SORRY!</strong> ERROR while updating record !
				</div>";
	}
}
//Get the vraible that is passed into the page that is edit_id:
if(isset($_GET['edit_id']))
{
        //Get the vraible that is passed into the page that is delete_id and set it to the variable id:
	$id = $_GET['edit_id'];
        //Use the extract function in the crud method to get id's
	extract($crud->getID($id));	
}

?>
<!-- The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case the file is header.php: -->
<?php include_once 'header.php'; ?>
<!-- What clearfix does is to force content after the floats or the container containing the floats to render below it: -->
<div class="clearfix"></div>
<!-- Bootstrap :: Use .container for a responsive fixed width container: -->
<div class="container">
<?php
//Once the page gets a msg from earlier display said message to the user:
if(isset($msg))
{
        //User dispaly:
	echo $msg;
}
?>
</div>
<!-- What clearfix does is to force content after the floats or the container containing the floats to render below it: -->
<div class="clearfix"></div><br />
<!-- Bootstrap :: Use .container for a responsive fixed width container: -->
<div class="container">
	          <!-- The method attribute specifies how to send form-data :: or as HTTP post transaction (with method="post"): -->
     <form method='post'>
    <!-- Bootstrap Styling: -->
    <table class='table table-bordered'>
 
        <tr>
            <!-- Table Data: -->
            <td>Subject</td>
            <!-- Displays the subject(s) to the user: -->
            <td><input type='text' name='subject' class='form-control' value="<?php echo $subject; ?>" required></td>
        </tr>
        <!-- Table Row: -->
        <tr>
            <!-- Sets the column span equal to 2: -->
            <td colspan="2">
                    <!-- A submit update button with the Bootstrap styling:  -->   
                <button type="submit" class="btn btn-primary" name="btn-update">
                    <!-- Glyphicon for edit button: -->
    			<span class="glyphicon glyphicon-edit"></span>  Update this Record
				</button>
                        <!-- Index page redirect link as well as more bootstrap styling for the button as well as another glyph icon: -->
                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>
<!-- The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case it is footer.php -->
<?php include_once 'footer.php'; ?>