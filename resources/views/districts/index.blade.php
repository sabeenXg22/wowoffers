<!-- resources/views/districts/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Districts</h2>

        @if (count($districts) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>State ID</th>
                        <th>District Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($districts as $district)
                        <tr>
                            <td>{{ $district->id }}</td>
                            <td>{{ $district->state_id }}</td>
                            <td>{{ $district->district_name }}</td>
                            <td>
                                <a href="{{ route('districts.show', $district->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('districts.edit', $district->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('districts.destroy', $district->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this district?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No districts found.</p>
        @endif

        <a href="{{ route('districts.create') }}" class="btn btn-success">Add District</a>
    </div>
@endsection
