</div>
<footer>
    <div class="footer-content">
        <div class="footer-contacts">
            <h3 class="footer-heading">
                <?php echo __('Контактная информация:', 'pinsk-view'); ?>
            </h3>
            <p>
                <?php echo __('+375 29 341 22 15', 'pinsk-view'); ?>
            </p>
            <p>
                <?php echo __('KsuS702@gmail.com', 'pinsk-view'); ?>
            </p>
        </div>
        <div class="footer-cont">
        <div class="footer-logo">
<!--            <a href="/">-->
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 34 10" style="enable-background:new 0 0 34 10;" xml:space="preserve">
                    <text transform="matrix(0.9767 0 0 1 0.6841 8.9863)" class="logosvg-footer">ПіНСК</text>
                </svg>
        </div>
<!--            </a>-->
            <p>
                <?php echo __('&copy; 2017-2018 Ксения Бердник. Все права защищены.', 'pinsk-view'); ?>
            </p>
        </div>
        <div class="social">
            <h3 class="footer-heading">
                <?php echo __('Социальные сети:', 'pinsk-view'); ?>
            </h3>
            <a href="http://facebook.com/" class="social-icon facebook-icon"></a>
            <a href="http://twitter.com/" class="social-icon twitter-icon"></a>
            <a href="http://vk.com/" class="social-icon vk-icon"></a>
        </div>

    </div>
</footer>
<?php wp_footer(); ?>



<script type="text/javascript" src="http://pinsk/simplebox_util.js"></script>
<script type="text/javascript">
    (function() {
        var boxes = [],
            els, i, l;
        if (document.querySelectorAll) {
            els = document.querySelectorAll('a[rel=simplebox]');
            Box.getStyles('simplebox_css', 'http://pinsk/simplebox.css');
            Box.getScripts('simplebox_js', 'http://pinsk/simplebox.js', function() {
                simplebox.init();
                for (i = 0, l = els.length; i < l; ++i)
                    simplebox.start(els[i]);
                simplebox.start('a[rel=simplebox_group]');
            });
        }
    })();
</script>
</body>

</html>
