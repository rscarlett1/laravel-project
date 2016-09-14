@extends('master')

@section('title', 'Add New Product')
@section('description', 'We will be dding a new product')

@section('styles')
<style type="text/css">

</style>

@endsection

@section('content')
<h1>Add New Product</h1>

<form id="add-product" method="post" enctype="multipart/formdata" action="/submit-product"></form>
{!! csrf_field() !!}

<div class"form-group {{ $errors->has('product_title') ? 'has-error' :''}}">
	<label>Product Titles</label>
	<input type="text" class="form-control" name="product_title" placeholder="Product Title" value="{{ old('product_title') }}">
	{!! $errors->first('product_title', '<span class="help-block">:message</span>')!!}

</div>

<div class"form-group">
	<label>Product Description</label>
	<textarea name="product_description" class="form-control" placeholder="Product Description" rows="5">{{ old('product_description')}}</textarea>
	{!! $errors->first('product_description', '<span class="help-block">:message</span>') !!}
</div>

 <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    {!! $errors->first('image', '<span class="help-block">:message</span>') !!}
  </div>

<div class="form-group">
    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
    <div class="input-group">
      <div class="input-group-addon">$</div>
      <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
      <div class="input-group-addon">.00</div>
    </div>
    {!! $errors->first('price', '<span class="help-block">:message</span>') !!}
  </div>

<div>
	<input type="number" name="quantity" value="{{ old('product_title') }}" min="2" max="5"><p>Quantity</p>
	{!! $errors->first('quantity', '<span class="help-block">:message</span>') !!}
</div>






<div class="form-group">
	<button type="submit" class="btn btn-primary">Add Product</button>
</div>

</form>



@endsection

@section('scripts')

@endsection