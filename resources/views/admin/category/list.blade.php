@extends('admin.layouts.master')
@section('admin')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category List</h1>
        </div>
        <div class="">
            <div class="row">
                <div class="col-4 offset-1">
                    <div class="card">
                        <div class="card-body shadow">
                            <form action="{{ route('created') }}" method="post" class="p-3 rounded">
                                @csrf
                                <input type="text" class="form-control  @error('categoryname') is-invalid @enderror"
                                    name="categoryname"
                                    id="" placeholder="Category Name...">
                                @error('categoryname')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                                <input type="submit" value="Create" class="btn btn-outline-primary mt-3">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <table class="table table-hover shadow-sm">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Created Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($category)!=0)
                            @foreach ($category as $item)
                                <tr>

                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->created_at->format('j-F-Y') }}</td>
                                    <td>
                                        <a href="{{ route('updated', $item->id) }}" class="btn btn-sm btn-outline-primary"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{ route('deleted', $item->id) }}" class="btn btn-sm btn-outline-danger"><i
                                                class="fa-solid fa-trash"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4"><h4 class="text-muted text-center">There is no data</h4></td>
                            </tr>

                            @endif

                        </tbody>
                    </table>

                    <span class="d-flex justify-content-end">{{ $category->links() }}</span>
                </div>

            </div>
        </div>
    </div>
@endsection
