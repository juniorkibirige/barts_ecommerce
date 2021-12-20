<style>
    .navbar-expand-lg .navbar-nav .nav-link {
        padding-right: .5rem;
        padding-left: .5rem;
    }

    .navbar-expand-lg .navbar-nav {
        flex-direction: row;
    }
</style>
<nav class="navbar bg-dark navbar-dark navbar-expand-lg justify-content-center float-md-end">
    <div class="container-fluid">
        <div class="navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?php if ($active == '/') echo 'javascript:void(0)';
                                else echo '/'; ?>" class="nav-link <?php if ($active == '/') echo 'active'; ?>" aria-current="page">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?php if ($active == 'products') echo 'javascript:void(0)';
                                else echo '/products'; ?>" class="nav-link <?php if ($active == 'products') echo 'active'; ?>">Products</a>
                </li>
                <li class="nav-item">
                    <a href="<?php if ($active == 'about') echo 'javascript:void(0)';
                                else echo '/about'; ?>" class="nav-link <?php if ($active == 'about') echo 'active'; ?>">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
