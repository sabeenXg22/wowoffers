<!-- resources/views/states/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>States</h2>

        @if (count($states) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>State Name</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($states as $state)
                        <tr>
                            <td>{{ $state->id }}</td>
                            <td>{{ $state->state_name }}</td>
                            <td>{{ $state->country_id}}</td>
                            <td>
                                <a href="{{ route('states.show', $state->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('states.edit', $state->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('states.destroy', $state->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this state?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No states found.</p>
        @endif

        <a href="{{ route('states.create') }}" class="btn btn-success">Add State</a>
    </div>
@endsection
