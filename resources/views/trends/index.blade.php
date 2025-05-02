@extends('layouts.app')

@section('content')
    <style>
        /* Keep the previous styles from before */
        .container {
            max-width: 960px;
            margin: 40px auto;
            padding: 0 20px;
            font-family: Arial, sans-serif;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
        }

        .add-button {
            background-color: #28a745;
            color: #fff;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .add-button:hover {
            background-color: #218838;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 16px;
            box-shadow: 2px 2px 6px rgba(0,0,0,0.05);
            transition: box-shadow 0.2s;
        }

        .card:hover {
            box-shadow: 4px 4px 12px rgba(0,0,0,0.1);
        }

        .card h2 {
            margin: 0 0 8px 0;
            font-size: 20px;
        }

        .card p {
            margin: 0;
            color: #555;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>

    <div class="container">
        <div class="header">
            <h1>Trends</h1>
            <a href="{{ route('trends.create') }}" class="add-button">+ Add Trend</a>
        </div>

        @if($trends->count())
            <div class="grid">
                @foreach($trends as $trend)
                    <div class="card">
                        <h2>{{ $trend->name }}</h2>
                        <p>{{ $trend->description }}</p>
                        <form action="{{ route('trends.destroy', $trend->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this trend?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <p>No trends found. Add one above!</p>
        @endif
    </div>
@endsection
