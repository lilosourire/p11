<!-- menu du footer -->
<?php wp_footer(); ?>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
</body>
<footer>
    <?php if (has_nav_menu('footer-menu')): ?>
    <?php wp_nav_menu(
        array(
            'theme_location' => 'footer-menu',
            'menu_class' => 'my-footer-menu',
        )
    ); ?>
    <?php endif;
    ?>
<?php
get_template_part('templates-part/modale-contact');
?>
    </footer>