<div class="container">
    <div class="headersidebar">
        <h4>Trending Category</h4>
    </div>
    <div class="sidebar-menu d-flex flex-column gap-2 mt-4">
        @foreach($trendingcategory as $categorytrn)
        <a href="{{$categorytrn['id']}}">{{$categorytrn->Category->Category_name}}</a>
        @endforeach
    </div>
</div>