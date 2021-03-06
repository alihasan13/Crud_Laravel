<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('public/assets/images/favicon.png')); ?>">
    <title>Laravel CRUD Operation</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(asset('public/assets/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/plugins/bootstrap/css/select2.css')); ?>" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo e(asset('public/assets/plugins/chartist-js/dist/chartist.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/plugins/chartist-js/dist/chartist-init.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')); ?>" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('public/css/style.css')); ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo e(asset('public/css/colors/blue.css')); ?>" id="theme" rel="stylesheet">
    <link href="<?php echo e(asset('public/css/dataTable.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/css/sweetalert.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('public/js/sweetalert.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/jquery.js')); ?>"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    
<![endif]-->
    <!-- typehead for auto search -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

</head>
<?php /**PATH K:\server\htdocs\laravelProject\resources\views/defaults/header.blade.php ENDPATH**/ ?>