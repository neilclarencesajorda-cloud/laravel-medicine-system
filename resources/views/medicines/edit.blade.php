@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header custom-blue">
                Edit Medicine
            </div>

            <div class="card-body">

                <form action="/medicines/update/{{ $medicine->id }}" method="POST">
                    @csrf
                    
                    @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)

                                        <li>{{ $error }}</li>

                                    @endforeach
                                </ul>
                            </div>
                         @endif

                    <div class="mb-3">
                        <label>Medicine Name</label>
                        <input type="text"
                            name="medicine_name"
                            class="form-control"
                            value="{{ $medicine->medicine_name }}">
                    </div>

                    <div class="mb-3">
                        <label>Category</label>

                        <select name="category" class="form-select" required>

                            <option value="Tablet"
                                {{ $medicine->category == 'Tablet' ? 'selected' : '' }}>
                                Tablet
                            </option>

                            <option value="Capsule"
                                {{ $medicine->category == 'Capsule' ? 'selected' : '' }}>
                                Capsule
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Quantity</label>
                        <input type="number"
                                name="quantity"
                                class="form-control"
                                value="{{ $medicine->quantity }}">
                    </div>

                    <div class="mb-3">
                        <label>Expiration Date</label>
                        <input type="date"
                            name="expiration_date"
                            class="form-control"
                            value="{{ $medicine->expiration_date }}">
                    </div>

                    <button class="btn btn-custom">
                        Update Medicine
                    </button>

                    <a href="/medicines" class="btn btn-secondary">
                        Back
                    </a>

                </form>

            </div>

        </div>

    </div>
@endsection