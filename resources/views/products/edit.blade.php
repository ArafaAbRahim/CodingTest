@extends('layouts.app')

@section('content')
 


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Product </h1>
        <a href="{{ route('product.index') }}" class="float-right btn btn-primary">+ All Product</a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <form class="card shadow mb-5" action="{{ route('product.update', $product) }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6 mt-4 pl-4">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name="title" value="{{ old('title') ?: $product->title }}"
                                        class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Product SKU</label>
                                    <input type="text" name="sku" value="{{ old('sku') ?: $product->sku }}"
                                        class="form-control @error('sku') is-invalid @enderror">
                                    @error('sku')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" id="" cols="30" rows="3"
                                            class="form-control @error('description') is-invalid @enderror">{{ old('description') ?: $product->description }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4 pr-4">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Product Image</label>
                                    <input type="file" name="file_path" value="{{ old('file_path') }}" class="form-control @error('file_path') is-invalid @enderror">
                                    @error('file_path')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>                                                                                                            
                       
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
@endsection
