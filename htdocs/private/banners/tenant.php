<div class="banner">
    <header>
        <div class="bannerContainer">
            <div>
                <a href="index.php">
                    <span class="material-symbols-outlined">home</span>
                    <p>Home</p>
                </a>
                <a href="/API/auth/logout.php">
                    <span class="material-symbols-outlined">logout</span>
                    <p>Log out</p>
                </a>
            </div>
            <div class="burger">
                <p class="username">
                    <?php echo(ucwords($username)); ?>
                </p>
                <span class="material-symbols-outlined">menu</span>
            </div>
        </div>
        <div>
            <nav class="mainNav">
                <menu>
                    <li><a href="/index.php">Home</a></li>
                    <li><a href="/logged-in/tenant/index.php">Properties</a></li>
                    <li><a href="/logged-in/tenant/maintenance-viewer.php">Maintenance</a></li>
                    <li><a href="/logged-in/tenant/account.php">Account Settings</a></li>
                    <li><a href="/property-search.php">Search</a></li>
                </menu>
            </nav>
        </div>
    </header>
</div>

<script src = "/js/burger-menu.js" defer></script>