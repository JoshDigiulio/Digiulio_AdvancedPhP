
<!-- If errors are found place them into a stacking array. -->
<?php if ( isset($errors) && is_array($errors) ) : ?>

<!-- For each error found display the errors message to the user in red. -->
<?php foreach ($errors as $value) :  ?>
<p class="bg-danger"><?php echo $value; ?></p>


<?php endforeach; ?>
<?php endif; ?>

