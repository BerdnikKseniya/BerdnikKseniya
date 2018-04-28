<?php 
/*
    Template Name: Registration
*/
?>
<?php get_header();?>
<div class="main-heading">
    <h1>
        <?php the_title(); ?>
    </h1>
</div>

<div class="registration">
    <?php custom_registration_function(); ?>
</div>
<?php get_footer(); ?>
