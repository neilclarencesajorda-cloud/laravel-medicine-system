@extends('layouts.app')

@section('content')

    <div class="mb-4">
        <div>
            <h1 class="page-title">Dashboard</h1>

            <p class="text-muted mb-0">
                Medicine Inventory Overview
            </p>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h5 class="fw-bold text-primary-custom">
                Welcome to Butika System
            </h5>
            <p class="mb-0 text-muted">
                Manage medicine records, monitor stock levels, and track expiration dates.
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card dashboard-card shadow-sm">
                <div class="card-body">
                    <h6 class="card-label">
                        Total Medicines
                    </h6>

                    <h1 class="card-number">
                        {{ $totalMedicines }}
                    </h1>
                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card dashboard-card shadow-sm">

                <div class="card-body">

                    <h6 class="card-label">
                        Low Stock Medicines
                    </h6>

                    <h1 class="card-number">
                        {{ $lowStock }}
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card dashboard-card shadow-sm">

                <div class="card-body">

                    <h6 class="card-label">
                        Expired Medicines
                    </h6>

                    <h1 class="card-number">
                        {{ $expired }}
                    </h1>

                </div>

            </div>

        </div>

    </div>

    <div class="card shadow-sm border-0 mt-4">

        <div class="card-header bg-white">
            Medicine Statistics
        </div>

        <div class="card-body">
            <canvas id="medicineChart"></canvas>
        </div>

    </div>

@endsection

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('medicineChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Medicines', 'Low Stock', 'Expired'],
                datasets: [{
                    label: 'Medicine Report',
                    data: [
                        Number('{{ $totalMedicines }}'),
                        Number('{{ $lowStock }}'),
                        Number('{{ $expired }}')
                    ]
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>

@endsection