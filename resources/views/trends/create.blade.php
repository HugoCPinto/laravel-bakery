@extends('layouts.app')

@section('content')
    <style>
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 0 20px;
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 26px;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .actions {
            margin-top: 25px;
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .btn-cancel {
            margin-left: 10px;
            text-decoration: none;
            color: #555;
        }

        .btn-cancel:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container">
        <h1>Add New Trend</h1>

        <form action="{{ route('trends.store') }}" method="POST">
            @csrf

            <label for="name">Trend Name</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Description</label>
            <input type="text" id="description" name="description" required>

            <div class="actions">
                <button type="submit" class="btn-submit">Save Trend</button>
                <a href="{{ route('trends.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection
