@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <!-- Search Form -->
        <form action="/medicines" method="GET" class="mb-3">
            <div class="input-group">

                <input type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search medicine..."
                    value="{{ request('search') }}">

                <button type="submit" class="btn btn-custom">
                    Search
                </button>

            </div>
        </form>

        <div>
            <h2>Medicine List</h2>
            <p class="text-muted">Manage medicine records</p>
        </div>

        <a href="/medicines/create" class="btn btn-custom">
            Add Medicine
        </a>

    </div>

    @if(session('message'))
        <div id="liveToast" style="position:fixed; top:20px; right:20px; z-index:9999; background:{{ session('type') == 'success' ? '#198754' : '#dc3545' }}; color:white; padding:12px 20px; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.2); font-size:14px;">
            {{ session('message') }}
        </div>
    @endif

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Medicine Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Expiration Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($medicines as $medicine)

                    <tr>

                        <td>{{ $medicine->id }}</td>
                        <td>{{ $medicine->medicine_name }}</td>
                        <td>{{ $medicine->category }}</td>
                        <td>{{ $medicine->quantity }}</td>

                        <td>
                            @if($medicine->quantity == 0)

                                <span class="badge bg-danger">
                                    Out of Stock
                                </span>

                            @elseif($medicine->quantity <= 10)

                                <span class="badge bg-warning text-dark">
                                    Low Stock
                                </span>

                            @else

                                <span class="badge bg-success">
                                    Available
                                </span>

                            @endif
                        </td>

                        <td>{{ $medicine->expiration_date }}</td>

                        <td>

                            <a href="/medicines/edit/{{ $medicine->id }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="/medicines/delete/{{ $medicine->id }}"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Delete this medicine?')">
                                Delete
                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="text-center">
                            No medicine records found.
                        </td>

                    </tr>

                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        const toastEl = document.getElementById('liveToast');

        if (toastEl) {

            setTimeout(() => {

                const toast = bootstrap.Toast.getOrCreateInstance(toastEl);
                toast.hide();

            }, 4000);

        }

    });
    </script>
@endsection