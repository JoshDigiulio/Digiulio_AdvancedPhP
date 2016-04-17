<?php if ( isset($errors) && is_array($errors) ) : ?>
<?php foreach ($errors as $value) :  ?>
<p class="bg-danger"><?php echo $value; ?></p>
<?php endforeach; ?>

<?php endif; ?>

