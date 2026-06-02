@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card shadow-sm">

        <div class="card-header custom-blue">
            Profile Information
        </div>

        <div class="card-body">

            @if(session('message'))

                <div class="alert alert-success">
                    {{ session('message') }}
                </div>

            @endif

            <form action="/profile/update"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="mb-3 text-center">

                    @if(Auth::user()->profile_picture)

                        <img src="{{ asset('profiles/' . Auth::user()->profile_picture) }}"
                            width="120"
                            height="120"
                            class="rounded-circle border">

                    @else

                        <img src="https://via.placeholder.com/120"
                            class="rounded-circle border">

                    @endif

                </div>

                <div class="mb-3">
                    <label>Name</label>

                    <input type="text"
                        name="name"
                        class="form-control"
                        value="{{ Auth::user()->name }}">
                </div>

                <div class="mb-3">
                    <label>Email</label>

                    <input type="email"
                        name="email"
                        class="form-control"
                        value="{{ Auth::user()->email }}">
                </div>

                <div class="mb-3">
                    <label>Profile Picture</label>

                    <input type="file"
                        name="profile_picture"
                        class="form-control">
                </div>

                <button type="submit"
                        class="btn btn-custom">
                    Update Profile
                </button>

            </form>

        </div>

    </div>
</div>

@endsection
