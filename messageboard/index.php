<?php
//The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case the file is dbconfig.php:
include_once 'dbconfig.php';
?>
<!-- The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case the file is header.php: -->
<?php include_once 'header.php'; ?>
<!-- What clearfix does is to force content after the floats or the container containing the floats to render below it: -->
    <div class="clearfix"></div>
    <!-- Bootstrap :: Use .container for a responsive fixed width container: -->
    <div class="container">
        <!-- Link to the add-data.php file with some glyphicon styling: -->
        <a href="add-data.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Topic</a>
    </div>
<!-- What clearfix does is to force content after the floats or the container containing the floats to render below it: -->
    <div class="clearfix"></div><br />
    <!-- Bootstrap :: Use .container for a responsive fixed width container: -->
    <div class="container">
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
                <!-- Table header with a column span of 2: -->
                <th colspan="2" align="center">Actions</th>
            </tr>
            <?php
            //set a sql statment in the query varaible:
            $query = "SELECT * FROM topics";
            //Amount of paging records on each page set to a max of 10 topics per page:
            $records_per_page=10;
            //Call the methof crud and the paging function within gather the 2 variables listeed below and storing it all in a newquery varialbe:
            $newquery = $crud->paging($query,$records_per_page);
            //Utilze the crud method to call the dataview function:
            $crud->dataview($newquery);
            ?>
            <!-- Table Row: -->
            <tr>
                <!-- Table Data with a column span of 7:-->
                <td colspan="7" align="center">
                    <!-- Styling: -->
                    <div class="pagination-wrap">
                        <!-- Crud method using the paginglink function: -->
                        <?php $crud->paginglink($query,$records_per_page); ?>
                    </div>
                </td>
            </tr>

        </table>


    </div>
<!-- The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case it is footer.php -->
<?php include_once 'footer.php'; ?>