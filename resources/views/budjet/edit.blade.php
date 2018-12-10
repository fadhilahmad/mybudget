@extends('layouts.app')
@section('content')
<div class="container">
  <form method="post" action="{{action('BudjetController@update', $id)}}">
    <div class="form-group row">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Item</label>
      <div class="col-sm-10">
          <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="item" name="item" value="{{$budjet->item}}">
      </div>
    </div>
      
    <div class="form-group row">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Price</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="price" name="price" value="{{$budjet->price}}">
      </div>
    </div>
      
    <div class="form-group row">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Tag</label>
      <div class="col-sm-10">
          <select class="form-control form-control-lg" id="lgFormGroupInput" name="tag">
              <option value="{{$budjet->tag}}">{{$budjet->tag}}</option>
              <option value="Food">Food</option>
              <option value="Bill">Bill</option>
              <option value="Fuel">Fuel</option>
              <option value="Ciggarete">Ciggarete</option>
              <option value="Other">Other</option>
          </select>
      </div>
    </div>
      
    <div class="form-group row">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control form-control-lg" id="lgFormGroupInput" name="date" value="{{$budjet->date}}">
      </div>
    </div>
      
    <div class="form-group row">
      <div class="col-md-2"></div>
      <input type="submit" class="btn btn-primary">
    </div>
  </form>
</div>
@endsection