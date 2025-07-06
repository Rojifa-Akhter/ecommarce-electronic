@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <!-- Total Orders -->
    <div class="col-md-4">
        <div class="bg-dark p-4 rounded shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-warning text-black p-3 rounded-circle">
                    <i class="bi bi-truck fs-4"></i>
                </div>
                <div>
                    <small class="text-muted">Total Orders</small>
                    <h5 class="mb-0 text-white">4,654 <span class="text-success fs-6">↑ 23%</span></h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Earnings -->
    <div class="col-md-4">
        <div class="bg-dark p-4 rounded shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-warning text-black p-3 rounded-circle">
                    <i class="bi bi-coin fs-4"></i>
                </div>
                <div>
                    <small class="text-muted">Total Earnings</small>
                    <h5 class="mb-0 text-white">$600 <span class="text-danger fs-6">↓ 23%</span></h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Users -->
    <div class="col-md-4">
        <div class="bg-dark p-4 rounded shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-warning text-black p-3 rounded-circle">
                    <i class="bi bi-people fs-4"></i>
                </div>
                <div>
                    <small class="text-muted">Total User</small>
                    <h5 class="mb-0 text-white">15,788 <span class="text-success fs-6">↑ 33%</span></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts -->
<div class="row g-4">
    <div class="col-md-8">
        <div class="bg-dark rounded p-4 shadow-sm">
            <div class="d-flex justify-content-between mb-2">
                <h6 class="text-white">Analytics</h6>
                <div class="text-end">
                    <span class="badge bg-warning text-dark me-1">User</span>
                    <span class="badge bg-success">Order</span>
                </div>
            </div>
            <canvas id="barChart" height="180"></canvas>
        </div>
    </div>

    <div class="col-md-4">
        <div class="bg-dark rounded p-4 shadow-sm">
            <h6 class="text-white mb-3">Most earnings</h6>
            <canvas id="pieChart" height="180"></canvas>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'User',
                    data: [40000, 30000, 20000, 50000, 60000, 15000, 12000, 41000, 53000, 39000, 47000, 43000],
                    backgroundColor: '#39ff14'
                },
                {
                    label: 'Order',
                    data: [30000, 20000, 10000, 40000, 50000, 14000, 10000, 38000, 52000, 34000, 42000, 41000],
                    backgroundColor: '#f5c542'
                }
            ]
        },
        options: {
            plugins: {
                legend: { labels: { color: 'white' } }
            },
            scales: {
                x: { ticks: { color: 'white' } },
                y: { ticks: { color: 'white' } }
            }
        }
    });

    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: ['January', 'February', 'March', 'April'],
            datasets: [{
                data: [5636.02, 3436.02, 9546.02, 1245.02],
                backgroundColor: ['#FF6384', '#36A2EB', '#4BC0C0', '#FFCE56']
            }]
        },
        options: {
            plugins: {
                legend: { labels: { color: 'white' } }
            }
        }
    });
</script>
@endpush
