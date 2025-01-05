@extends('layouts.admin')

@section('content')
<style>
    :root {
        --brown-100: #f5e8d3;
        --brown-200: #e6d0b3;
        --brown-300: #d7b894;
        --brown-400: #c8a075;
        --brown-500: #b98855;
        --brown-600: #a97036;
        --brown-700: #8d5d2d;
        --brown-800: #714a24;
        --brown-900: #55371b;
    }
    body {
        background-color: var(--brown-100);
        color: var(--brown-900);
        font-family: 'Courier New', monospace;
    }
    .pixelated {
        image-rendering: pixelated;
        border: 2px solid var(--brown-900);
        box-shadow: 4px 4px 0 var(--brown-900);
        transition: all 0.1s;
        background-color: var(--brown-200);
    }
    .pixelated:hover {
        transform: translate(-2px, -2px);
        box-shadow: 6px 6px 0 var(--brown-900);
    }
    .pixelated-btn {
        padding: 5px 10px;
        font-family: 'Courier New', monospace;
        text-transform: uppercase;
        font-weight: bold;
        background-color: var(--brown-400);
        color: var(--brown-900);
        border: none;
        cursor: pointer;
    }
    .pixelated-btn:hover {
        background-color: var(--brown-500);
    }
    .pixelated-select {
        appearance: none;
        padding: 5px 30px 5px 10px;
        background-color: var(--brown-300);
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3E%3Cpath d='M0 0h8v2H0zM0 3h8v2H0zM0 6h8v2H0z' fill='%23000'/%3E%3C/svg%3E");
        background-position: right 10px center;
        background-repeat: no-repeat;
        background-size: 8px;
    }
    .pixelated-table {
        border-collapse: separate;
        border-spacing: 2px;
        width: 100%;
    }
    .pixelated-table th, .pixelated-table td {
        border: 2px solid var(--brown-900);
        padding: 8px;
        background-color: var(--brown-200);
    }
    .pixelated-table th {
        background-color: var(--brown-400);
    }
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    h1 {
        color: var(--brown-800);
        text-align: center;
        margin-bottom: 20px;
    }
    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin-top: 20px;
    }
    .pagination li {
        margin: 0 5px;
    }
    .pagination a, .pagination span {
        display: inline-block;
        padding: 5px 10px;
        background-color: var(--brown-300);
        color: var(--brown-900);
        text-decoration: none;
    }
    .pagination .active span {
        background-color: var(--brown-500);
    }
    .btn-primary {
        background-color: #7c4700;
        border-color: #3b2a1c;
        color: #fff;
        font-size: 12px;
        padding: 10px 20px;
        text-transform: uppercase;
        transition: all 0.2s ease;
    }
    .btn-primary:hover {
        background-color: #3b2a1c;
        border-color: #7c4700;
        color: #ffd700;
        transform: translate(-2px, -2px);
        box-shadow: 4px 4px 0 #000;
    }
</style>

<div class="container pixelated">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Order Management</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
    </div>

    <form action="{{ route('admin.orders.index') }}" method="GET" class="mb-4">
        <select name="status" onchange="this.form.submit()" class="pixelated pixelated-select">
            <option value="">All Orders</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Shipped</option>
            <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
        </select>
    </form>

    <table class="table pixelated-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                <td>₾{{ number_format($order->total_amount, 2) }}</td>
                <td>{{ ucfirst($order->shipping_status) }}</td>
                <td>
                    <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $orders->links() }}

    <a href="{{ route('admin.orders.report') }}" class="btn btn-primary pixelated pixelated-btn">Generate Sales Report</a>
</div>
@endsection
