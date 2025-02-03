@extends('layouts.admin')

@section('content')
        <div class="card">
            <div class="card-header">
                <h3>Edit user
                    <a href="{{ route('admin.users.crud') }}" class="btn btn-primary float-right">
                        Go Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
@endsection
