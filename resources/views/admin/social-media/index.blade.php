@extends('layouts.admin')

@section('content')
        <div class="card">
            <div class="card-header">
                <h3>Social List
                    <a href="{{ route('admin.social.create') }}" class="btn btn-primary float-right">
                        Create
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Platform</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($socials as $social)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $social->icon }}</td>
                                    <td>{{ $social->link }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.social.edit', $social->id) }}" class="btn btn-info">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form onclick="return confirm('are you sure ?');" action="{{ route('admin.social.destroy', $social->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
