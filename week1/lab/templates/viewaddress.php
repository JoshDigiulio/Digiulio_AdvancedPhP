<?php if ( count($address) > 0 ) : ?>
<h1>Addresses</h1>
<ul>
<?php foreach( $address as $key => $values ) : ?>
    <li>
    <?php echo $values['fullname']; ?> 
        <br>
    <?php echo $values['email']; ?> 
        <br>
    <?php echo $values['addressline1']; ?> 
        <br>
    <?php echo $values['city']; ?> 
        <br>
    <?php echo $values['state']; ?> 
        <br>
    <?php echo $values['zip']; ?> 
        <br>
    <?php echo $values['birthday']; ?> 
        <hr> </hr>
    </li>
    
<?php endforeach; ?>
</ul>
<?php endif; ?>
