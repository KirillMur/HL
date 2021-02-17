<nav class="navbar navbar-expand-lg navbar-dark header">
    <div class="container-fluid">
        <a class="navbar-brand red" href="<?= getLink('main'); ?>">HEADER!</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= getLink('main'); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= getLink('carClass'); ?>">Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Insurances</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= getLink('about'); ?>">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= getLink('contactus'); ?>">Find us</a>
                </li>
            </ul>
            <span class="navbar-text">
        Navbar text with an inline element
      </span>
        </div>
    </div>
</nav>