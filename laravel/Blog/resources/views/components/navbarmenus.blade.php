<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <a class="navbar-brand" href="/">Rio Blogs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                @foreach($category as $categorydata)
                <a class="nav-link" href="#{{$categorydata['Category_name']}}">{{$categorydata['Category_name']}}</a>
                @endforeach
            </div>
            <div class="navbar-nav ms-auto">
                @auth
                <a href="{{ route('userprofile') }}"><i class="bi bi-person-circle"></a>
                @endauth
                @guest
                <a href="{{ route('login') }}">Login/Register</a>
                @endguest
            </div>
        </div>
    </div>
</nav>