@extends('Layouts.Template')
@Section('content')

<div class="articelHeader">
    <h4 class="text-center">{{$dataartikel['title_artikel']}}</h4>
</div>
<article class="row articelpage d-flex flex-rows gap-2 p-4">
    <div class="col-10 img-article d-flex align-items-center p-3 ">
        <img src="{{ asset('storage/' . $dataartikel['img_artikel']) }}" class="img-fluid rounded-start w-100 border border-info rounded-4" alt="...">
    </div>
    <div class="col-11">
        <div class="articelsubheading d-flex ">
            <h4>{{$dataartikel['sub_heading']}}</h4>
            <p class="ms-auto ml-4">{{$dataartikel['created_at']}}</p>
        </div>
    </div>
    <div class="col-11">
        <div class="article">
            <div class="container">
                {!! $dataartikel->body_artikel !!}
            </div>
        </div>
    </div>
    </div>
</article>

@endSection