<!-- 搜索按钮 -->
<div class="search-button">
    <button id="search-toggle" class="search-btn">🔍</button>
    <div id="search-box" class="search-box">
        <form action="<?php echo home_url('/'); ?>" method="get">
            <input type="text" name="s" id="search-input" placeholder="搜索内容...">
            <button type="submit" id="search-submit">搜索</button>
        </form>
    </div>
</div>

<!-- 右下角的加号按钮 -->
<div class="floating-button">
    <button id="menu-toggle" class="menu-btn">+</button>
    <div id="menu" class="menu">
        <ul>
            <li><a href="<?php echo admin_url(); ?>">后台管理</a></li>
            <li><a href="<?php echo wp_login_url(); ?>">登录</a></li>
            <li><a href="<?php echo admin_url('post-new.php'); ?>">新建文章</a></li>
        </ul>
    </div>
</div>

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
    window.onload = function () {
        // 隐藏加载动画
        document.getElementById('page-loader').style.display = 'none';
    };
</script>
</body>

</html>

<style>
    /* 右下角的浮动加号按钮样式 */
    .floating-button {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 10000;
        /* 确保按钮显示在页面最上层 */
    }

    .menu-btn {
        background-color: #f39c12;
        border: none;
        color: white;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        font-size: 24px;
        cursor: pointer;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        transition: background-color 0.3s ease;
    }

    .menu-btn:hover {
        background-color: #e67e22;
    }

    /* 隐藏菜单初始状态 */
    .menu {
        display: none;
        /* 默认隐藏菜单 */
        position: absolute;
        bottom: 60px;
        /* 确保菜单出现在加号按钮的上方 */
        right: 0;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        padding: 10px;
        z-index: 10001;
        white-space: nowrap;
        /* 阻止菜单中的项目换行 */
    }

    /* 菜单显示时 */
    .menu ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: inline-block;
        /* 使列表项宽度根据内容自适应 */
    }

    .menu li {
        margin: 10px 0;
    }

    .menu a {
        text-decoration: none;
        color: #333;
        font-size: 16px;
        display: inline-block;
        padding: 5px 10px;
        border-radius: 5px;
        white-space: nowrap;
        /* 确保菜单项不换行 */
    }

    .menu a:hover {
        color: #0073aa;
        background-color: #f1f1f1;
    }
</style>

<style>
    /* 搜索按钮样式 */
    .search-button {
        position: fixed;
        bottom: 100px;
        /* 比加号按钮高 */
        right: 30px;
        z-index: 10000;
        /* 确保按钮显示在页面最上层 */
    }

    .search-btn {
        background-color: #3498db;
        border: none;
        color: white;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        font-size: 24px;
        cursor: pointer;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        transition: background-color 0.3s ease;
    }

    .search-btn:hover {
        background-color: #2980b9;
    }

    /* 搜索框初始状态为隐藏 */
    .search-box {
        display: none;
        /* 默认隐藏搜索框 */
        position: absolute;
        bottom: 70px;
        right: 0;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        padding: 10px;
        z-index: 10001;
    }

    /* 搜索框和按钮容器 */
    .search-box form {
        display: flex; /* 使用flex布局将输入框和按钮排在一行 */
        align-items: center; /* 垂直居中 */
    }

    /* 搜索框中的输入框样式 */
    #search-input {
        width: 250px; /* 调整搜索框宽度 */
        height: 40px; /* 增加高度 */
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        margin-right: 10px; /* 为按钮提供间距 */
    }

    #search-submit {
        height: 40px; /* 搜索按钮的高度 */
        padding: 5px 20px; /* 调整按钮的内边距 */
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        width: flex;
        white-space: nowrap;
    }

    #search-submit:hover {
        background-color: #2980b9;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 获取加号按钮相关的元素
        var menuToggle = document.getElementById('menu-toggle');
        var menu = document.getElementById('menu');

        // 获取搜索按钮相关的元素
        var searchToggle = document.getElementById('search-toggle');
        var searchBox = document.getElementById('search-box');

        // 点击加号按钮时切换菜单的显示和隐藏
        menuToggle.addEventListener('click', function (event) {
            event.preventDefault();
            if (menu.style.display === 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
            }
        });

        // 点击搜索按钮时切换搜索框的显示和隐藏
        searchToggle.addEventListener('click', function (event) {
            event.preventDefault();
            if (searchBox.style.display === 'block') {
                searchBox.style.display = 'none';
            } else {
                searchBox.style.display = 'block';
            }
        });

        // 点击页面其他地方时，隐藏菜单和搜索框
        document.addEventListener('click', function (event) {
            if (!menu.contains(event.target) && !menuToggle.contains(event.target)) {
                menu.style.display = 'none';
            }
            if (!searchBox.contains(event.target) && !searchToggle.contains(event.target)) {
                searchBox.style.display = 'none';
            }
        });
    });
</script>