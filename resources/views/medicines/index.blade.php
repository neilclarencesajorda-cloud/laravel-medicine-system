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

        <div class="position-fixed top-0 end-0 p-3" style="z-index:9999;">

            <div id="liveToast"
                class="toast show text-white border-0 shadow rounded-3
                bg-{{ session('type') }}"
                style="min-width:250px; max-width:300px; width:300px;">

                <div class="d-flex">

                    <div class="toast-body">
                        {{ session('message') }}
                    </div>

                    <button type="button"
                            class="btn-close btn-close-white me-2 m-auto"
                            data-bs-dismiss="toast">
                    </button>

                </div>

            </div>

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