<?php
//The class crud:
class crud
{
        //Members declared as private may only be accessed by the class that defines the member:
	private $db;
	
        //The constructor that allows us to try and gain access to the database which gains access to the $DB_con varaible:
	function __construct($DB_con)
	{
                //This database is going to attempt to create a new db conection:
		$this->db = $DB_con;
	}
	//The function that is going to be used to create new subject/topics in the message board by getting the subject varaible from the add-data.php page:
	public function create($subject)
	{       //Store the date that this subject is created in the created variable haveing the date be equal to the moment of creation.
		$created = date("Y-m-d H:i:s");
                //Try catch error checking time:
		try
		{
                        //Prepare this database to accept the sql statment below:
			$stmt = $this->db->prepare("INSERT INTO topics(subject,created) VALUES(:subject, :created)");
                        //Binds a parameter to the specified variable name:
			$stmt->bindparam(":subject",$subject);
                        //Binds a parameter to the specified variable name:
			$stmt->bindparam(":created",$created);
                        //Perform the request stms:
			$stmt->execute();
                        //If all works return the value true:
			return true;
		}
                //Represents an error raised by PDO:
		catch(PDOException $e)
		{
                       //Gets the Exception message:
			echo $e->getMessage();	
                        //If all fails return the value of false:
			return false;
		}
		
	}
	//Function used to get the topic ids:
	public function getID($id)
	{
                //Sql stament that prepare this database to gather all of the topic ids:
		$stmt = $this->db->prepare("SELECT * FROM topics WHERE topic_id=:id");
                //After the sql statment is execute place the topic ids into a array and set the ids equal to one another:
		$stmt->execute(array(":id"=>$id));
                //Fetches the next row from a result set:
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
                //Returns each result set from the above fetch request:
		return $editRow;
	}
	//Function used to update topic id's and the subject titles of those ids:
	public function update($topic_id,$subject)
	{       //Try and catch error checking time:
		try
		{
                    //Prepare this database to accept the following sql statment:
			$stmt=$this->db->prepare("UPDATE topics SET subject=:subject
													WHERE topic_id=:topic_id ");
                        //Binds a parameter to the specified variable name:
			$stmt->bindparam(":subject",$subject);
                        //Binds a parameter to the specified variable name:
			$stmt->bindparam(":topic_id",$topic_id);
                        //Perform the requested stmts:
			$stmt->execute();
			//If all goes well return true:
			return true;	
		}
                //Represents an error raised by PDO:
		catch(PDOException $e)
		{       
                        //Gets acception message:
			echo $e->getMessage();
                        //If all fails return false:
			return false;
		}
	}
	//Fuction used to delete the topics from the database:
	public function delete($topic_id)
	{
                //Prepare this database to accept this sql stmt:
		$stmt = $this->db->prepare("DELETE FROM topics WHERE topic_id=:topic_id");
                //Binds the paramaeter to the specfied varaible name:
		$stmt->bindparam(":topic_id",$topic_id);
                //Execure the sql statment:
		$stmt->execute();
                //If all goes well return true:
		return true;
                
	}
	
	
	//Function used for dataview:
	public function dataview($query)
	{
                //Preapre this database to execute a query:
		$stmt = $this->db->prepare($query);
                //Execute said query:
		$stmt->execute();
	        
                //If the query returns a rowcount which is more than 0 do the followng:
		if($stmt->rowCount()>0)
		{
                       //For every row that is true fetch the database entry for said row:
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                 <!-- Display the topic id of each row: -->
                <td><?php print($row['topic_id']); ?></td>
                <!-- Pass the id of href into the href link: -->
                <td><?php echo "<a href='posts.php?topic_id=".$row['topic_id']."'>" ?><?php print($row['subject']); ?></a></td>
                <!-- Display the time created of the: -->
                <td><?php print($row['created']); ?></td>
                <!-- Bootstrap Formatting -->
                <td align="center">
                <!-- Pass the id of href into the href link: -->
                <a href="edit-data.php?edit_id=<?php print($row['topic_id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <!-- Bootstrap Formatting -->
                <td align="center">
                <!-- Pass the id of href into the href link -->
                <a href="delete.php?delete_id=<?php print($row['topic_id']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	//Function for paging:
	public function paging($query,$records_per_page)
	{
                
		$starting_position=0;
                //If the varaible that is being passed through the page from earlier isset to true/page_no execture the following code:
		if(isset($_GET["page_no"]))
		{       //The starting positon of the pages is equl to the following math equation:
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
                //Store the starting position in the query2:
		$query2=$query." limit $starting_position,$records_per_page";
                //If all goes well return the $query2:
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		//PHP_SELF is a variable that returns the current script being executed. This variable returns the name and path of the current file (from the root folder):
		$self = $_SERVER['PHP_SELF'];
		//Preapre this database for the following execution:
		$stmt = $this->db->prepare($query);
                //Execute the stmt:
		$stmt->execute();
		//Set the total number of records equal to the stmts execute row count:
		$total_no_of_records = $stmt->rowCount();
		//If this is true do the following:
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
                        //Ceiling is used to break up the total number of records by the amount you want per page:
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
                        //The first page is well the first page:
			$current_page=1;
                        //Lets get the page number that we are on currently:
			if(isset($_GET["page_no"]))
			{
                                //Ans store it as the current page:
				$current_page=$_GET["page_no"];
			}
                        //Now lets see if the current page is 1 or not:
			if($current_page!=1)
			{
                                //If it is not 1 allow fot the previous button to be appicable:
				$previous =$current_page-1;
                                //Display a button link to return to the first page:
				echo "<li><a href='".$self."?page_no=1'>First</a></li>";
                                //Display a button link to return to the previous page:
				echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
			}
                        //As long as the pages are less than or equal to the total number of all the pages do all of the following:
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
                                //See what page we are on:
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
                                //See what page we are onL
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
                        //As long as the current page is not the last page:
			if($current_page!=$total_no_of_pages)
			{
                                //Increment the current page by 1 everytime you go to the next page:
				$next=$current_page+1;
                                //Display a button to go to the next page:
				echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
                                //Display a button to go to the last page:
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
			}
			?></ul><?php
		}
	}
		
}
