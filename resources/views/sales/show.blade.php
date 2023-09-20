<!DOCTYPE html>
<html>
<head>
    <title>Sale Details</title>
</head>
<body style="text-align: center">
    <h1>Sale Details</h1>

    <table class="table">
        <tr>
            <th>Date:</th>
            <td>{{ $sale->date }}</td>
        </tr>
        <tr>
            <th>Location:</th>
            <td>{{ $sale->location }}</td>
        </tr>
        <tr>
            <th>Type:</th>
            <td>{{ $sale->type == 1 ? 'MalProff' : 'Fargerike' }}</td>
        </tr>
        <tr>
            <th>Payment:</th>
            <td>{{ $sale->pay == 1 ? 'Credit' : 'Cash' }}</td>
        </tr>
        <tr>
            <th>Customer ID:</th>
            <td>{{ $sale->customer_id }}</td>
        </tr>
        <tr>
            <th>Product ID:</th>
            <td>{{ $sale->product_id }}</td>
        </tr>
        <tr>
            <th>Count:</th>
            <td>{{ $sale->count }}</td>
        </tr>
    </table>

    <a href="{{ route('sales.index') }}" class="btn btn-secondary">Back to Sales</a>

    <style>
        table{
            border: 1px solid black;
            margin-left: 650px;
            margin-bottom: 20px;
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
