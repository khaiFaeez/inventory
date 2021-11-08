@extends('layouts.app', ['page' => 'New Product', 'pageSlug' => 'products', 'section' => 'inventory'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">New Product</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('products.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">Product Information</h6>
                            <div class="pl-lg-4">                 
                   

                            <input type="hidden" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('serial_number') ? ' is-invalid' : '' }}" placeholder="Name" value="{{ auth()->user()->name }}" readonly>
                           
                                <div class="form-group{{ $errors->has('client_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Branch</label>
                                    <select name="client_id" id="input-category" class="form-select4 form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                        @foreach ($clients as $client)
                                            @if($client['id'] == old('document'))
                                                <option value="{{$client['id']}}" selected>{{$client['name']}}</option>
                                            @else
                                                <option value="{{$client['id']}}">{{$client['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'client_id'])
                                </div>
                            


                                <div class="form-group{{ $errors->has('serial_number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">serial_number</label>
                                    <input type="text" name="serial_number" id="input-serial_number" class="form-control form-control-alternative{{ $errors->has('serial_number') ? ' is-invalid' : '' }}" placeholder="Name" value="{{ old('serial_number') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'serial_number'])
                                </div>
                         <div class="row">
                            <div class="col-4">  
                                <div class="form-group{{ $errors->has('product_category_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Category</label>
                                    <select name="product_category_id" id="input-category" class="form-select form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                        @foreach ($categories as $category)
                                            @if($category['id'] == old('document'))
                                                <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                                            @else
                                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'product_category_id'])
                                </div>
                            </div><div class="col-4"> 
                                <div class="form-group{{ $errors->has('brand_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Brand</label>
                                    <select name="brand_id" id="input-brand" class="form-select2 form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                        @foreach ($brands as $brand)
                                            @if($brand['id'] == old('document'))
                                                <option value="{{$brand['id']}}" selected>{{$brand['name']}}</option>
                                            @else
                                                <option value="{{$brand['id']}}">{{$brand['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'brand_id'])
                                </div>
                                </div><div class="col-4"> 
                                <div class="form-group{{ $errors->has('model_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Model</label>
                                    <select name="model_id" id="input-model" class="form-select3 form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                        @foreach ($mod as $model)
                                            @if($model['id'] == old('document'))
                                                <option value="{{$model['id']}}" selected>{{$model['name']}}</option>
                                            @else
                                                <option value="{{$model['id']}}">{{$model['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'model_id'])
                                </div>
                                </div></div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">Description</label>
                                    <input type="text" name="description" id="input-description" class="form-control form-control-alternative" placeholder="Description" value="{{ old('description') }}" required>
                                    @include('alerts.feedback', ['field' => 'description'])
                                </div>
                                <div class="row">
                                    <div class="col-4">                                    
                                        <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock">Staff ID</label>
                                            <input type="text" name="stock" id="input-stock" class="form-control form-control-alternative" placeholder="Stock" value="{{ old('stock') }}" required>
                                            @include('alerts.feedback', ['field' => 'stock'])
                                        </div>
                                    </div>                            
                                    <div class="col-4">                                    
                                        <div class="form-group{{ $errors->has('stock_defective') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock_defective">Defective Stock</label>
                                            <input type="number" name="stock_defective" id="input-stock_defective" class="form-control form-control-alternative" placeholder="Defective Stock" value="{{ old('stock_defective') }}" required>
                                            @include('alerts.feedback', ['field' => 'stock_defective'])
                                        </div>
                                    </div>
                                    <div class="col-4">                                    
                                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-price">Price</label>
                                            <input type="number" step=".01" name="price" id="input-price" class="form-control form-control-alternative" placeholder="Price" value="{{ old('price') }}" required>
                                            @include('alerts.feedback', ['field' => 'price'])
                                        </div>
                                    </div>                            
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        new SlimSelect({
            select: '.form-select'
        })
        new SlimSelect({
            select: '.form-select2'
        })
        new SlimSelect({
            select: '.form-select3'
        })
        new SlimSelect({
            select: '.form-select4'
        })
    </script>
@endpush