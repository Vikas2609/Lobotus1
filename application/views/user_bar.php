<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Hi <?php echo $user_name ?></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <?php echo anchor('login/logout','Logout') ?>
            </li>
        </ul>
    </div>
</nav>