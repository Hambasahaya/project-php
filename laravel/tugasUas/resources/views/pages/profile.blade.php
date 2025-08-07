@extends('pages.layout.template')

@section('content')
    <main id="main" class="main" style="background-color:#f75c41">

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="card info-card sales-card" style="background-color:white">
                        <div class="rounded-top text-white d-flex flex-row" style="background-color: #FFA500; height:130px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 120px;">
                                <img src="{{ auth()->user()->avatar == null ? asset('avatar/default.jpg') : asset('storage/avatar/' . auth()->user()->avatar) }}"
                                    alt="Generic placeholder image" class="img-fluid img-thumbnail mb-2"
                                    style="width: 150px; z-index: 1">
                            </div>
                            <div class="ms-3" style="margin-top: 60px;">
                                <h5>{{ ucfirst(auth()->user()->name) }}</h5>
                                <p>{{ ucfirst(auth()->user()->email) }}</p>
                                @if (session('updated'))
                                    <span class="badge text-bg-primary mt-3">{{ session('updated') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="px-4 pt-5">
                            <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-4">
                                            <label for="avatar">Image Profile</label>
                                            <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                                id="avatar" name="avatar" value="{{ auth()->user()->avatar }}">
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('avatar'))
                                    <span>{{ $errors->first('avatar') }}</span>
                                @endif

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-4">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" value="{{ auth()->user()->name }}">
                                            @if ($errors->has('name'))
                                                <span class="text-white">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-4">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ auth()->user()->email }}">
                                            @if ($errors->has('email'))
                                                <span class="text-white">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-4">
                                            <label for="password">New Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                name="password">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="password_confirmation">Password
                                                Confirmation</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password_confirmation" name="password_confirmation">
                                        </div>
                                        @if ($errors->has('password'))
                                            <span>{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <button type="submit" class="mb-3 btn btn-primary px-5"
                                    style="border-radius: 25px; border: 0; background-color: #FF6347; box-shadow: none; transition: background-color 0.3s;"
                                    onmouseover="this.style.backgroundColor='#f75c41'; this.style.boxShadow='0px 0px 1.5px gray';"
                                    onmouseout="this.style.backgroundColor='#FF6347'; this.style.boxShadow='none';">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
