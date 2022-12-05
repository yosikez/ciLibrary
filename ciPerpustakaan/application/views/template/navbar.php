<nav class="navbar">
    <div class="nav-brand">
        <i class='bx bx-library bx-sm'></i>
        <a href="<?= base_url('librarians') ?>">Library</a>
    </div>
    <div class="nav-actions">
        <?php if(@$_SESSION['auth']) { ?>
        <a href="<?= base_url('logout') ?>">Logout</a>
        <?php } else { ?>
            <a href="<?= base_url('login') ?>">Login</a>
        <?php } ?>
    </div>
</nav>
