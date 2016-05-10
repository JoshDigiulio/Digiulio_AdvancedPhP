


<!-- Once all fields of data are inputted display a success message if their are also no errors. -->
<?php if ( isset($message) && is_string($message)) : ?>
<p class="bg-success"><?php echo $message; ?></p>
<?php endif; ?>
