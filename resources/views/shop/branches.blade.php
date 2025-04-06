<!-- resources/views/branches/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>All Branches</h2>

    @if(count($branches) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Shop ID</th>
                    <th>Branch Name</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($branches as $branch)
                    <tr>
                        <td>{{ $branch->id }}</td>
                        <td>{{ $branch->shop_id }}</td>
                        <td>{{ $branch->branch_name }}</td>
                        <td>{{ $branch->location }}</td>
                        <td>
                            <a href="{{ route('branches.show', $branch->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this branch?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No branches found.</p>
    @endif
@endsection
