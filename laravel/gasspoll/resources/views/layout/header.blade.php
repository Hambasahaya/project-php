<!-- header -->
@extends("layout.layout")
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="/img/bg3.svg" alt="" width="130px" height="65px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto ">
                <a class="nav-link" aria-current="page" href="/">Home</a>
                <a class="nav-link" href="#ketegory">Category</a>
                <a class="nav-link" href="/product">Product</a>
                @auth
                <a class="nav-link" href="/cart"><i class="bi bi-bag"></i></a>
                @endauth
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </div>
            <div class="navbar-nav">
                <div class="d-grid gap-2 d-md-flex justify-content-center">
                    @auth
                    <a href="/user" class="btn btn-primary" id="homebtn" type="button"><i class="bi bi-person-circle"></i></a>
                    @else
                    <a href="/login" class="btn btn-primary" id="homebtn" type="button">Login</a>
                    @endauth
                </div>

            </div>
        </div>
    </div>
</nav>
<!-- endheader -->