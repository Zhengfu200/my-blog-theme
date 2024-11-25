<footer>
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    <p>Theme by zhengfu200</p> <!--可删除-->
</footer>

<?php wp_footer(); ?>

<!-- 页面载入动画 -->
<div class="page-loader" id="page-loader">
    <div class="loader"></div>
</div>

<script>
    // 等待页面完全加载
    window.onload = function() {
        // 隐藏加载动画
        document.getElementById('page-loader').style.display = 'none';
    };
</script>
</body>
</html>
