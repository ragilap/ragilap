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
            <form action="{{ route('admin.social.update',$social->id) }}" method="post">
                @csrf
                @method('put')
                {{-- @dd($social->icon) --}}
                <div class="form-group">
                    <label for="icon">Icon</label>
                    <select class="form-control" name="icon" id="iconSelect">
                        <option value="instagram"  {{($social->icon ?? $social->icon) == 'instagram' ? 'selected' : ''}} data-icon="fa fa-instagram">Instagram</option>
                        <option value="facebook"  {{($social->icon ?? $social->icon) == 'facebook' ? 'selected' : ''}} data-icon="fa fa-facebook">Facebook</option>
                        <option value="pinterest"  {{($social->icon ?? $social->icon) == 'pinterest' ? 'selected' : ''}} data-icon="fa fa-pinterest">Pinterest</option>
                        <option value="twitter" {{($social->icon ?? $social->icon) == 'twitter' ? 'selected' : ''}} data-icon="fa fa-twitter">Twitter</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Link">Link</label>
                    <input type="text" name="link" value="{{$social->link}}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    @endsection
