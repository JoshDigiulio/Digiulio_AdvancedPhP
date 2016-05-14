<html>
    <head>
    <meta charset="UTF-8">
    <title></title>
         <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

         <!-- Optional theme -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous"> 
    </head>
<br />






<div class="container">
    <h1>Add Address</h1>
    <form action="#" method="post">   
        
       <!-- Creates my address form and the input values needed for it. -->
       Full Name: <input name="fullname" value="<?php echo $fullname; ?>" /> <br />
       Email: <input name="email" value="<?php echo $email; ?>" /> <br />
       Address: <input name="addressline1" value="<?php echo $addressline1; ?>" /> <br />
       City: <input name="city" value="<?php echo $city; ?>" /> <br />
       State: <input name="state" value="<?php echo $state; ?>" /> <br />
       Zip Code: <input name="zip" value="<?php echo $zip; ?>" /> <br />
       Birthday : <input type="date" name="birthday" value="<?php echo $birthday; ?>" />
      

       <!-- Navigation button -->
       <input type="submit" value="submit" class="btn btn-primary" />
       <input type="button" onclick="location.href='index.php';" value="Back" class="btn btn-primary" />
       
       
    </form>
</div>
</html>