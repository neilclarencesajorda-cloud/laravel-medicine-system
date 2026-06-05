@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

    @if(session('message'))
    <div id="liveToast" style="position:fixed; top:20px; right:20px; z-index:9999; background:{{ session('type') == 'success' ? '#198754' : '#dc3545' }}; color:white; padding:12px 20px; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.2); font-size:14px; min-width:200px;">
        {{ session('message') }}
        <script>setTimeout(()=>document.getElementById('liveToast').style.display='none',3000)</script>
    </div>
    @endif

    <div class="row g-4">

        <!-- Profile Info Card -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header custom-blue text-white">
                    <i class="bi bi-person-circle me-2"></i>Profile Information
                </div>
                <div class="card-body">
                    <form action="/profile/update" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 text-center">
                            @if(Auth::user()->profile_picture)
                                <img src="{{ asset('profiles/' . Auth::user()->profile_picture) }}"
                                    width="120" height="120"
                                    class="rounded-circle border">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&size=120&background=31487A&color=fff"
                                    class="rounded-circle border">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ Auth::user()->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ Auth::user()->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Profile Picture</label>
                            <input type="file" name="profile_picture" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-custom w-100">
                            <i class="bi bi-save me-2"></i>Update Profile
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Change Password Card -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header custom-blue text-white">
                    <i class="bi bi-lock me-2"></i>Change Password
                </div>
                <div class="card-body">
                    <form action="/profile/change-password" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <div class="input-group">
                                <input type="password" name="current_password" id="currentPassword" class="form-control" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('currentPassword', this)">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <div class="input-group">
                                <input type="password" name="new_password" id="newPassword" class="form-control" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('newPassword', this)">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <div class="input-group">
                                <input type="password" name="new_password_confirmation" id="confirmPassword" class="form-control" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirmPassword', this)">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        @if($errors->has('current_password'))
                            <div class="alert alert-danger">{{ $errors->first('current_password') }}</div>
                        @endif

                        <button type="submit" class="btn btn-custom w-100">
                            <i class="bi bi-lock me-2"></i>Change Password
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
function togglePassword(fieldId, btn) {
    const input = document.getElementById(fieldId);
    const icon = btn.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
    }
}
</script>
@endsection