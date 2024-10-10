@extends('admin.layouts.master')
@section('admin')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category List</h1>
        </div>
        <div class="">
            <div class="row">
                <div class="col-4 offset-1">
                    <a href="{{route('categorylist')}}" class="btn btn-sm btn-dark">back</a>
                            <form action="{{route('edit',$category->id)}}" method="post" class="p-3 rounded">
                                @csrf
                                <input type="text" value="{{old('categoryname',$category->name)}}" class="form-control  @error('categoryname') is-invalid @enderror"
                                    name="categoryname"
                                    id="" placeholder="Category Name...">
                                @error('categoryname')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                                <input type="submit" value="Update" class="btn btn-outline-primary mt-3">
                            </form>
                        </div>
                    </div>
                </div>

               v

            </div>
        </div>
    </div>
@endsection
