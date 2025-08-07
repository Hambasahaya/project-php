@extends('Layouts.Admin')
@section('admincontent')

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex w-100 justify-content-between">
                @if (Route::currentRouteName() == 'article.upd')
                <h6> Article update </h6>
                @endif
                @if (Route::currentRouteName() == 'category.upd')
                <h6> Category update </h6>
                @endif
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-4">
                    @if (Route::currentRouteName() == 'article.upd')
                    <div class="d-flex w-1000 justify-content-center">
                        <img src="{{ asset('storage/' . $artikelupd['img_artikel']) }}" alt="" srcset="" class="img-fluid border-1 rounded-2">
                    </div>
                    @endif
                    @if(isset($categoryupd) && $categoryupd!=null && Route::currentRouteName() == 'category.upd')
                    <form action="{{route('category.upd')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$categoryupd['id']}}">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">category Name</label>
                            <input type="text" class="form-control" name="Category_name" value="{{$categoryupd['Category_name']}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Post Category</button>
                    </form>
                    @endif
                    @if(isset($artikelupd) && $artikelupd!=null && Route::currentRouteName() == 'article.upd')
                    <form action="/articleUpdate" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$artikelupd['id']}}">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title_artikel" value="{{$artikelupd['title_artikel']}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">sub heading</label>
                            <input type="text" class="form-control" name="sub_heading" value="{{$artikelupd['sub_heading']}}">
                        </div>
                        <select class="form-select form-select-sm" aria-label="Small select example" name="id_category">
                            <option selected>Category artikel</option>
                            @foreach($category as $cate)
                            <option value="{{$cate['id']}}">{{$cate['Category_name']}}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <input id="body_artikel" type="hidden" name="body_artikel" value="{{$artikelupd['body_artikel']}}">
                            <trix-editor input="body_artikel"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <div class="input-group input-group-sm mb-3">
                                <input type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="img_artikel">
                            </div>
                            <button type="submit" class="btn btn-primary">Post Article</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endSection