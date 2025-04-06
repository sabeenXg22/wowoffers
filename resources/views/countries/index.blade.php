<!-- resources/views/countries/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Countries</h2>

        @if (count($countries) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $country)
                        <tr>
                            <td>{{ $country->id }}</td>
                            <td>{{ $country->country_name }}</td>
                            <td>
                                <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('countries.destroy', $country->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this country?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No countries found.</p>
        @endif

        <a href="{{ route('countries.create') }}" class="btn btn-success">Add Country</a>
    </div>
@endsection
