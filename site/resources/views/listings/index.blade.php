@extends('layout')

@section('content')
<div >
  
  <div class="page-title-cont">
    <div class="row">
      <div class="col-md-8">
        <h2 class="page-title">Listings</h2>
      </div>
      <div class="col-md-4 text-right">
        <a href="{{url('/admin/listings/add')}}" class="btn blue">Add New</a>
      </div>
    </div>
  </div>

  <div>
    <table class="table table-sorterd table-bordered table-hower">
      <thead>
        <th>SN</th>
        <th>Title</th>
        <th>Category</th>
        <th>Price</th>
        <th>Location</th>
        <th></th>
      </thead>
      <tbody>
        <?php $sn = 0; ?>
        @foreach($listings as $list)
        <tr id="list_{{$list->id}}">
          <td>{{++$sn}}</td>
          <td>{{$list->title}}</td>
          <td>{{$list->category_name}}</td>
          <td>{{$list->price}}</td>
          <td>{{$list->location}}</td>
          <td>
            <a href="{{url('admin/listings/add/'.$list->id)}}" class="btn yellow">Edit</a>

            <button div-id="list_{{$list->id}}" action="{{('admin/listings/delete/'.$list->id)}}" class="btn delete-div red">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  

  @endsection