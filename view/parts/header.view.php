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
                    <a class="nav-link" href="<?= getLink('about'); ?>">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= getLink('contactus'); ?>">Find us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="login">Login</a>
                </li>
                <li class="hidden" id="loginBlock">
                    <form action="/controller/AccessController.php" method="post" name="form">
                        <label for="username">Name: </label><input type="text" name="username" id="username" placeholder="username">
                        <label for="password">Password: </label><input type="password" name="password" id="password">
                        <input type="hidden" name="referer" value="<?= $_SERVER['REQUEST_URI'] ?>">
                        <input class="hidden" type="submit">
                    </form>
                </li>
                <li >
                    <span id='loginFormMessageBox'></span>
                </li>
            </ul>
            <span id="cart">
            <a href="#" onclick="gotoCart(localStorage.getItem('cartItem'))">
                В корзине
            </a>
            <span>
                0
            </span>
      </span>
        </div>
    </div>
</nav>

<script src="/js/header.js"></script>
<script src="/js/loginForm.js"></script>
<script src="/js/gotoCart.js"></script>