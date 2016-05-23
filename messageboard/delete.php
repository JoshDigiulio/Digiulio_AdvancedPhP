<?php
//The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case the file is dbconfig.php:
include_once 'dbconfig.php';
//isset( ), This is an inbuilt function that checks if a variable has been set or not. In between the round brackets, you type what you want isset( ). Which is $_POST['btn-del']:
if(isset($_POST['btn-del']))
{
        //Get the vraible that is passed into the page that is delete_id and set it to the variable id:
	$id = $_GET['delete_id'];
        //$crud is a PHP object created somewhere, and delte is a function defined in that object that is being called with the variable $id being passed to it:
	$crud->delete($id);
        //Redirect the delete-message.php page to the delete.php page if the delete request is true/deleted:
	header("Location: delete.php?deleted");	
}

?>
<!-- The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case the file is header.php: -->
<?php include_once 'header.php'; ?>
<!-- What clearfix does is to force content after the floats or the container containing the floats to render below it: -->
<div class="clearfix"></div>
<!-- Bootstrap :: Use .container for a responsive fixed width container: -->
<div class="container">

	<?php
        //If the varaible that has been passed through the page from earlier $pcrud->delete($id); isset to true/deleted execture the following code:
	if(isset($_GET['deleted']))
	{
		?>
         <!-- Bootstrap :: This alert box indicates a positive informative change or action: -->
        <div class="alert alert-success">
         <!-- User Display: -->
    	<strong>Success!</strong> record was deleted... 
		</div>
        <?php
	}
	else
	{
		?>
        <!-- Bootstrap :: This alert box indicates a failed informative change or action: -->
        <div class="alert alert-danger">
        <!-- User Display: -->
    	<strong>Sure !</strong> to remove the following record ? 
		</div>
        <?php
	}
	?>	
</div>
<!-- Bootstrap :: What clearfix does is to force content after the floats or the container containing the floats to render below it: -->
<div class="clearfix"></div>
<!-- Bootstrap :: Use .container for a responsive fixed width container: -->
<div class="container">
 	
	 <?php
         //If the varaible that has been passed through the page from earlier $pcrud->delete($id); isset to true/deleted execture the following code:
	 if(isset($_GET['delete_id']))
	 {
		 ?>
         <!-- Bootstrap :: Styling -->
         <table class='table table-bordered'>
         <tr>
         <!-- Table Header: -->
         <th>#</th>
         <!-- Table Header: -->
         <th>Subject</th>
         <!-- Table Header: -->
         <th>Created at</th>
         </tr>
         <?php
         //Preapre this database to execute a sql stmt below:
         $stmt = $DB_con->prepare("SELECT * FROM topics WHERE topic_id=:id");
         //Execute the sql stmt and get the id variables that were set from delete_id:
         $stmt->execute(array(":id"=>$_GET['delete_id']));
         //While any row is true fetech the information from the database:
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
             <!-- Fills in the id row: -->
             <td><?php print($row['topic_id']); ?></td>
             <!-- Fills in the id row: -->
             <td><?php print($row['subject']); ?></td>
             <!-- Fills in the id row: -->
             <td><?php print($row['created']); ?></td>
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
	 }
	 ?>
</div>
    <!-- Bootstrap :: Use .container for a responsive fixed width container: -->
<div class="container">
<p>
<?php
//If the varaible that has been passed through the page from earlier $pcrud->delete($id); isset to true/deleted execture the following code:
if(isset($_GET['delete_id']))
{
	?>
         <!-- The method attribute specifies how to send form-data :: or as HTTP post transaction (with method="post"): -->
  	<form method="post">
         <!-- Displays the row id to the user: -->
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <!-- A submit deletebutton with the Bootstrap styling and a glyphicon trash symbol:  -->   
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
    <!-- Index page redirect link as well as more bootstrap styling for the button as well as another glyph icon: -->
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>  
	<?php
}
else
{
	?>
    <!-- Index page redirect link as well as more bootstrap styling for the button as well as another glyph icon: -->
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
    <?php
}
?>
</p>
</div>	
<!-- The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case it is footer.php -->
<?php include_once 'footer.php'; ?>