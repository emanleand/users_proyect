<?php

/**
* @category user management
* @package Front
* @author emanleand@gmail.com
* @since 2020/02/03
*/

?>
<!-- <link type='text/css' rel="stylesheet" href="/appweb/leo/sec/gestion_pig/assets/css/main.css"> -->

<?php require_once('Html/header.php'); ?>
<section class="main">		
    <!-- Register User -->
    <?php require_once('Html/register_user.php'); ?>
    
    <!-- Login User -->
    <?php require_once('Html/login_user.php'); ?>
    
    <!-- List User -->
    <?php require_once('Html/list_user.php'); ?>

    <!-- Edit User -->
    <?php require_once('Html/edit_user.php'); ?>
</section>
<?php require_once('Html/footer.php'); ?>