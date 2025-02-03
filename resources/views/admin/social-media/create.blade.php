@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Create product
                <a href="{{ route('admin.social.index') }}" class="btn btn-primary float-right">
                    Go Back
                </a>

            </h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.social.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="icon">Icon</label>
                    <select class="form-control" name="icon" id="iconSelect">
                        <option value="instagram" data-icon="fa fa-instagram">Instagram</option>
                        <option value="facebook" data-icon="fa fa-facebook">Facebook</option>
                        <option value="pinterest" data-icon="fa fa-pinterest">Pinterest</option>
                        <option value="twitter" data-icon="fa fa-twitter">Twitter</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Link">Link</label>
                    <input type="text" name="link" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    @endsection
