<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        @if(isset($dataartikel) && $dataartikel!=null)
        @foreach($dataartikel as $artikeldata)
        <a href="/artikelpage/{{$artikeldata['id']}}">
            <div class="carousel-item active">
                <img src="{{ asset('storage/' . $artikeldata['img_artikel']) }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-flex p-4">
                    <h5>{{$artikeldata['title_artikel']}}</h5>
                </div>
                <div class="board">
                </div>
            </div>
        </a>
        @endforeach
        @endif
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-black rounded-4" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-black rounded-4" aria-hidden="true"></span>
        <span class="visually-hidden ">Next</span>
    </button>
</div>