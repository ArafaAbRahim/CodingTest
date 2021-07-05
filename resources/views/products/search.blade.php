@extends('layouts.app')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Product</h1>
        <a href="{{ route('product.index') }}" class="float-right btn btn-primary">+ All Product</a>
    </div>

    <div class="card-body">
        <div class="table-response">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th width="550px">Description</th>
                    <th>Variant</th>
                    <th width="150px">Action</th>
                </tr>
                </thead>

                <tbody>
                
                @foreach($products as $key=>$product)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ nl2br($product->description) }}</td>
                        <td>
                            <div>
                                <dl class="row mb-0" style="height: 80px; overflow: hidden" id="variant">

                                    <dt class="col-sm-3 pb-0">
                                        SM/ Red/ V-Nick
                                    </dt>
                                    <dd class="col-sm-9">
                                        <dl class="row mb-0">
                                            <dt class="col-sm-4 pb-0">Price : {{ number_format(200,2) }}</dt>
                                            <dd class="col-sm-8 pb-0">InStock : {{ number_format(50,2) }}</dd>
                                        </dl>
                                    </dd>
                                </dl> 
                            </div>                               
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('product.edit', $product) }}" class="btn btn-success">Edit</a>
                            </div>
                        </td>
                        </tr>
                @endforeach
                
            
                

                </tbody>

            </table>
        </div>

    </div>

@endsection