<!DOCTYPE html>
<html>
<head>
    <title>{{ isset($sale) ? 'Edit Sale' : 'Create Sale' }}</title>
</head>
<body style="text-align: center">
    <h1>{{ isset($sale) ? 'Edit Sale' : 'Create Sale' }}</h1>

    <form action="{{ isset($sale) ? route('sales.update', $sale->id) : route('sales.store') }}" method="POST" class="form-box">
        @csrf
        @if(isset($sale))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ isset($sale) ? $sale->date : old('date') }}">
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ isset($sale) ? $sale->location : old('location') }}">
        </div>

        <div class="form-group col-md-12">
            <label for="type">Type:</label>
            <select name="type" id="type" class="form-control">
                <option value="1" {{ (isset($sale) && $sale->type == 1) ? 'selected' : '' }}>MalProff</option>
                <option value="2" {{ (isset($sale) && $sale->type == 2) ? 'selected' : '' }}>Fargerike</option>
            </select>
        </div>

        <div class="form-group">
            <label for="pay">Payment:</label>
            <select name="pay" id="pay" class="form-control">
                <option value="1" {{ (isset($sale) && $sale->pay == 1) ? 'selected' : '' }}>Credit</option>
                <option value="2" {{ (isset($sale) && $sale->pay == 2) ? 'selected' : '' }}>Cash</option>
            </select>
        </div>

        <div class="form-group">
            <label for="customer_id">Customer ID:</label>
            <input type="text" name="customer_id" id="customer_id" class="form-control" value="{{ isset($sale) ? $sale->customer_id : old('customer_id') }}">
        </div>

        <div class="form-group">
            <label for="product_id">Product ID:</label>
            <input type="text" name="product_id" id="product_id" class="form-control" value="{{ isset($sale) ? $sale->product_id : old('product_id') }}">
        </div>

        <div class="form-group">
            <label for="count">Count:</label>
            <input type="text" name="count" id="count" class="form-control" value="{{ isset($sale) ? $sale->count : old('count') }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($sale) ? 'Update' : 'Create' }}</button>
    </form>

    <style>
        form{
            align-items: center;
        }
        .form-group{
            margin: 20px;
        }
    </style>
</body>
</html>
