@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow-sm">

                <div class="card-header custom-blue">
                    Add Medicine
                </div>

                <div class="card-body">

                    <form action="/medicines/store" method="POST">
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

                            <label class="form-label">
                                Medicine Name
                            </label>

                            <input type="text"
                                   name="medicine_name"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Category
                            </label>

                            <select name="category"
                                    class="form-select"
                                    required>
                                    
                                <option value="Tablet">Tablet</option>
                                <option value="Capsule">Capsule</option>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Quantity
                            </label>

                            <input type="number"
                                   name="quantity"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Expiration Date
                            </label>

                            <input type="date"
                                   name="expiration_date"
                                   class="form-control"
                                   required>

                        </div>

                        <button type="submit"
                                class="btn btn-custom">
                            Save Medicine
                        </button>

                        <a href="/medicines"
                           class="btn btn-secondary">
                            Back
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection