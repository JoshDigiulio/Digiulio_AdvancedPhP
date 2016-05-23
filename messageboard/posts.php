<?php
//The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case the file is dbconfig.php:
include_once 'dbconfig.php';
?>
<!-- The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case the file is header.php: -->
<?php include_once 'header.php'; ?>

<?php
//The page gets the topic_id that isset:
if(isset($_GET['topic_id']))
{
    //The topic_id is stored in the id varaible:
    $id = $_GET['topic_id'];

}
?>
    <!-- What clearfix does is to force content after the floats or the container containing the floats to render below it: -->
    <div class="clearfix"></div>
    <!-- Bootstrap :: Use .container for a responsive fixed width container: -->
    <div class="container">
        <!-- Link to the add-message page with the id of the topic id's displayed to the user as well as some bootstrap styling: -->
        <a href="add-message.php?topic_id=<?php echo $id ?>" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Message</a>
    </div>
        <!-- What clearfix does is to force content after the floats or the container containing the floats to render below it: -->
    <div class="clearfix"></div><br />
        <!-- Bootstrap :: Use .container for a responsive fixed width container: -->
    <div class="container">
        <!-- Display id's to user: -->
        <h2>Topic ID : <?php echo $id ?></h2>
        <!-- Bootstrap styling: -->
        <table class='table table-bordered table-responsive'>
            <!-- Table Row: -->
            <tr>
                <!-- Table Header: -->
                <th>#</th>
                <!-- Table Header: -->
                <th>Subject</th>
                <!-- Table Header: -->
                <th>Created at</th>
                <!-- Table Header: with a column span of 2: -->
                <th colspan="2" align="center">Actions</th>
            </tr>
            <?php
            //Use this sql stmt and place it into a query varaible:
            $query = "SELECT * FROM posts where topic_id=".$id;
            //Allow the page to only have 10 max: then move onto the next page:
            $records_per_page=10;
            //Use the pcrud methog pagining function and store it in newquery:
            $newquery = $pcrud->paging($query,$records_per_page);
            //Use the prcrud method function dataview:
            $pcrud->dataview($newquery);
            ?>
            <tr>
                <!-- Column span of 7:-->
                <td colspan="7" align="center">
                    <!-- Bootstrap: -->
                    <div class="pagination-wrap">
                        <!-- Use the method pcrud and its function paginglink to get the pagination: -->
                        <?php $pcrud->paginglink($query,$records_per_page); ?>
                    </div>
                </td>
            </tr>

        </table>


    </div>
<!-- The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case it is footer.php -->
<?php include_once 'footer.php'; ?>