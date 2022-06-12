<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="features" class="nav-link px-2 text-white">Features</a></li>
                <li><a href="pricing" class="nav-link px-2 text-white">Pricing</a></li>
                <li><a href="faq" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="about" class="nav-link px-2 text-white">About</a></li>
            </ul>
            {*if ($user->isLoggedIn())}
                <div class="col-md-12">
                    <p>Hello <a href="profile.php?user={$user->data()->username}">{$user->data()->username}</a>!</p>
                </div>
            {else*}
                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2">Login</button>
                    <button type="button" class="btn btn-warning">Sign-up</button>
                </div>
            {*/if*}
        </div>
    </div>
</header>

