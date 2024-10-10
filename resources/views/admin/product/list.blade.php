@extends('admin.layouts.master')
@section('admin')
    <div class="container">
        <div class="d-flex justify-content-between my-2">
            <div class=""><button class="btn btn-secondary rounded shadow-sm"><i class="fa-solid fa-database"></i>Product
                    Count( {{ count($product) }} )</button>
                <a href="{{route('productlist')}}" class="btn btn-outline-primary rounded shadow-sm ">All Products</a>
                <a href="{{route('productlist','lowamt')}}" class="btn btn-outline-danger rounded shadow-sm ">Low Amount Products List</a></div>
            <form action="{{ route('productlist') }}" method="get">
                @csrf
                <div class="input-group">
                    <input type="text" value="{{ request('key') }}" name="key" id="" class="form-control"
                        placeholder="Enter Search Key...">
                    <button type="submit" class="btn bg-dark text-white"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-hover shadow-sm">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Category</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            @if (count($product) != 0)
                                <tr>

                                    <td><img src="{{ asset('product/' . $item->image) }}"
                                            class="img-thumbnail rounded shadow-sm" style="width:100px" alt=""></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}$</td>
                                    <td class="col-2">
                                        <button type="button" class="btn btn-secondary position-relative">
                                            {{ $item->stock }}
                                            @if ($item->stock <= 3)
                                                <span
                                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                    lower amt stock

                                                </span>
                                            @endif
                                        </button>
                                    </td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>
                                        <a href="{{ route('updated', $item->id) }}"
                                            class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('updated', $item->id) }}"
                                            class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen"></i></a>
                                        <a href="{{ route('updated', $item->id) }}"
                                            class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                                    </td>

                                </tr>
                            @else
                                <tr>
                                    <td colspan="7">
                                        <h5 class="text-muted text-center">There is no Product</h5>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
