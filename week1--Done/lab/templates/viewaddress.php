
<!-- If their are more than 0 address populate the view address's page with the data. -->
<?php if ( count($address) > 0 ) : ?>
<!-- Table Headers for data. -->
<h1>Addresses</h1>
<table class="table">
    <tr>
    <th>Full Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Zip</th>
    <th>Date of Birth</th>
    </tr>
    
<!-- Place the correct values into the correct table columns. -->
<?php foreach( $address as $key => $values ) : ?>
    <tr>
    <td><?php echo $values['fullname']; ?></td>
        
    <td><?php echo $values['email']; ?></td>
        
    <td><?php echo $values['addressline1']; ?></td>
        
    <td><?php echo $values['city']; ?></td>
        
    <td><?php echo $values['state']; ?></td>
        
    <td><?php echo $values['zip']; ?></td>
        
    <td><?php echo date("F j, Y",strtotime($values['birthday'])); ?></td>
       
    </tr>
    
<?php endforeach; ?>
</table>
<?php endif; ?>
