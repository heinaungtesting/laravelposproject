@extends('admin.layouts.master')
@section('admin')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Payment List</h1>
        </div>
        <div class="">
            <div class="row">
                <div class="col-4 offset-1">
                    <div class="card">
                        <div class="card-body shadow">
                            <form action="{{ route('payment') }}" method="post" class="p-3 rounded">
                                @csrf
                                <input type="text" class="form-control  @error('account_number') is-invalid @enderror"
                                    name="account_number"
                                    id="" placeholder="Enter Account Number...">
                                @error('account_number')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                                <input type="text" class="form-control  @error('account_name') is-invalid @enderror"
                                    name="account_name"
                                    id="" placeholder="Enter Account Name...">
                                @error('account_name')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                                <select name="type" id="" class="form-control">
                                    <option value="yuucho">yuucho</option>
                                    <option value="paidy">Paidy</option>
                                    <option value="merucari">Merucari</option>
                                </select>
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
                                <th>Account Number</th>
                                <th>Account Name</th>
                                <th>Type</th>
                                <th>Created_at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payment as $item)
                                <tr>

                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->account_number}}</td>
                                    <td>{{ $item->account_name}}</td>
                                    <td>{{ $item->type}}</td>
                                    <td>{{ $item->created_at->format('j-F-Y') }}</td>
                                    <td>
                                        <a href="{{ route('updated', $item->id) }}" class="btn btn-sm btn-outline-primary"><i
                                                class="fa-solid fa-pen-to-square"></i>Update</a>
                                        <a href="{{ route('deleted', $item->id) }}" class="btn btn-sm btn-outline-danger"><i
                                                class="fa-solid fa-trash"></i>Delete</a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <span class="d-flex justify-content-end">{{ $payment->links() }}</span>
                </div>

            </div>
        </div>
    </div>
@endsection
