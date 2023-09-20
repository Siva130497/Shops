<!DOCTYPE html>
<html>
<head>
    <title>Sales</title>
</head>
<body style="text-align: center">
    <h1>Sales</h1>

    <a href="{{ route('sales.create') }}" class="btn btn-primary">Add Sale</a>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Date</th>
                <th>Location</th>
                <th>Type</th>
                <th>Payment</th>
                <th>Customer ID</th>
                <th>Product ID</th>
                <th>Count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->date }}</td>
                    <td>{{ $sale->location }}</td>
                    <td>{{ $sale->type == 1 ? 'MalProff' : 'Fargerike' }}</td>
                    <td>{{ $sale->pay == 1 ? 'Credit' : 'Cash' }}</td>
                    <td>{{ $sale->customer_id }}</td>
                    <td>{{ $sale->product_id }}</td>
                    <td>{{ $sale->count }}</td>
                    <td>
                        <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-info">View</a> <br>
                        <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-primary">Edit</a> <br>
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <style>
        table{
            border: 1px solid black;
            width: 100%;
            margin-top: 10px;
        }
        td, th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
            text-align: center;
        }
    </style>
</body>
</html>
