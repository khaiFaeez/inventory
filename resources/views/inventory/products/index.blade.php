@extends('layouts.app', ['page' => 'List of Products', 'pageSlug' => 'products', 'section' => 'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Products</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">New product</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <th scope="col">Branch</th>
                            <th scope="col">Serial Number</th>
                                <th scope="col">Category</th>
                                <th scope="col">Brand</th>
                                
                                <th scope="col">Stock</th>
                                <th scope="col">Status</th>
                                <th scope="col">User ID</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                    <td>{{ $product->client->name }}</td>
                                    <td>{{ ($product->serial_number) }}</td>
                                        <td><a href="{{ route('categories.show', $product->category) }}">{{ $product->category->name }}</a></td>
                                        <td>{{ $product->brand->name }}</td>
                                        
                                        <td>{{ $product->model->name }}</td>
                                        <td>
                                        @if ( $product->status == 'FREE')
                                                <span class="text-success">FREE</span>
                                            @elseif ( $product->status == 'USED')
                                                <span class="text-info">USED</span>
                                            @endif


                                        </td>
                                        <td>{{ ($product->stock) }}</td>
                                        <td class="td-actions text-right">
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Images">
                                                <i class="tim-icons icon-camera-18"></i>
                                            </a>
                                            <a href="{{ route('products.show', $product) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $product) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('products.destroy', $product) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Product" onclick="confirm('Are you sure you want to remove this product? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end">
                        {{ $products->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
