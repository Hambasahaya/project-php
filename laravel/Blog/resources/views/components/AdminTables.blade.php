@extends('Layouts.Admin')
@section('admincontent')

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex w-100 justify-content-between">
                @if (Route::currentRouteName() == 'adminpages.article')
                <h6> Article </h6>
                @endif
                @if (Route::currentRouteName() == 'adminpages.category')
                <h6> Category </h6>
                @endif
                <div class="btn-group btn-group-sm gap-2" role="group" aria-label="Small button group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        @if (Route::currentRouteName() == 'adminpages.article')
                        Create New Article
                        @endif
                        @if (Route::currentRouteName() == 'adminpages.category')
                        Create New Category
                        @endif
                    </button>
                    @if (Route::currentRouteName() == 'adminpages.article')
                    <a href="{{route('downloadartikel')}}" class="btn btn-primary">Dowmload data artikel</a>
                    @endif
                    @if (Route::currentRouteName() == 'adminpages.category')
                    <a href="{{route('downloadcate')}}" class="btn btn-primary">Dowmload data category</a>
                    @endif
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                @if (Route::currentRouteName() == 'adminpages.category')
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id category</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">category name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                                <th></th>
                                @endif
                                @if (Route::currentRouteName() == 'adminpages.article')
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">category</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Views</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($dataArtikel)&& $dataArtikel!==null && Route::currentRouteName() == 'adminpages.article')
                            @foreach($dataArtikel as $dataArticel)
                            <tr>
                                <td>
                                    <div class="d-flex px-2">
                                        <div>
                                        </div>
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm">{{$dataArticel['title_artikel']}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$dataArticel->category['Category_name']}}</p>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{$dataArticel['created_at']}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="me-2 text-xs font-weight-bold">{{$dataArticel['click_count']}}</span>
                                    </div>
                                </td>
                                <td class="align-items-center ">
                                    <div class="btn-group btn-group-sm w-100" role="group" aria-label="Small button group">
                                        <a href="/articleUpd/{{$dataArticel['id']}}" class="btn btn-outline-warning">Update</a>
                                        <a href="/articleDel/{{$dataArticel['id']}}" type="button" class="btn btn-outline-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            @if(isset($dataCategory)&& $dataCategory!==null && Route::currentRouteName() == 'adminpages.category')
                            @foreach($dataCategory as $CategoryData)
                            <tr>
                                <td>
                                    <div class="ms-auto p-4 ">
                                        <h6 class="mb-0 text-sm">{{$CategoryData['id']}}</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="ms-auto p-4 ">
                                        <h6 class="mb-0 text-sm">{{$CategoryData['Category_name']}}</h6>
                                    </div>
                                </td>

                                <td class="align-items-center ">
                                    <div class="btn-group btn-group-sm w-100" role="group" aria-label="Small button group">
                                        <a href="/category/{{$CategoryData['id']}}" class="btn btn-outline-warning">Update</a>
                                        <a href="/categoryDel/{{$CategoryData['id']}}" type="button" class="btn btn-outline-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (Route::currentRouteName() == 'adminpages.article')
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Artikel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    @endif
                    @if (Route::currentRouteName() == 'adminpages.category')
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Category Artikel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    @endif
                </div>
                <div class="modal-body">
                    @if (Route::currentRouteName() == 'adminpages.category')
                    <form action="{{route('category.newcategory')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"> category name</label>
                            <input type="text" class="form-control" name="Category_name">
                        </div>
                        <button type="submit" class="btn btn-primary">Create New Category</button>
                        @endif
                        @if (Route::currentRouteName() == 'adminpages.article')
                        <form action="{{route('admin.newarticle')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title_artikel">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Sub Heading</label>
                                <input type="text" class="form-control" name="sub_heading">
                            </div>
                            <div class="mb-3">
                                <select class="form-select form-select-sm" aria-label="Small select example" name="id_category">
                                    <option selected>Category artikel</option>
                                    @foreach($category as $cate)
                                    <option value="{{$cate['id']}}">{{$cate['Category_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <input id="body_artikel" type="hidden" name="body_artikel">
                                <trix-editor input="body_artikel"></trix-editor>
                            </div>
                            <div class="mb-3">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="img_artikel">
                                </div>
                                <button type="submit" class="btn btn-primary">Post Article</button>
                            </div>
                            @endif
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endSection