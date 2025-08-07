@if(session("success_lowongan"))
<x-showalert
    type="success"
    title="Well done!"
    footer="{{session('success_lowongan')}}">
</x-showalert>
@endif
@if(session("gagal_lowongan"))
<x-showalert
    type="danger"
    title="Well fail!"
    footer="{{session('gagal_lowongan')}}">
</x-showalert>
@endif
<x-viewJobs :id="$id" />