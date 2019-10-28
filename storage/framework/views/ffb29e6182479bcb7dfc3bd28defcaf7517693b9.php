<?php
$message = Session::get('Success');
?>
<?php if(!empty($message)): ?>
    <div class="alert alert-success"> 
    <?php echo $message; ?>

    </div>
<?php endif; ?><?php /**PATH K:\server\htdocs\laravelProject\resources\views/defaults/flash.blade.php ENDPATH**/ ?>