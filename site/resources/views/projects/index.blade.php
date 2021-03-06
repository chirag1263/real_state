@extends('layout')

@section('content')
<div >
  
  <div class="page-title-cont">
    <div class="row">
      <div class="col-md-8">
        <h2 class="page-title">Projects</h2>
      </div>
      <div class="col-md-4 text-right">
        <a href="{{url('/admin/projects/add')}}" class="btn blue">Add New</a>
      </div>
    </div>
  </div>

  <div>
    <table class="table table-sorterd table-bordered table-hower">
      <thead>
        <th>SN</th>
        <th>Title</th>
        <th>Location</th>
        <th></th>
      </thead>
      <tbody>
        <?php $sn = 0; ?>
        @foreach($projects as $project)
        <tr id="list_{{$project->id}}">
          <td>{{++$sn}}</td>
          <td>{{$project->title}}</td>
          <td>{{$project->location}}</td>
          <td>
            <a href="{{url('admin/projects/add?id='.$project->id)}}" class="btn yellow">Edit</a>

            <button div-id="list_{{$project->id}}" action="{{('admin/projects/delete/'.$project->id)}}" class="btn delete-div red">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  

  @endsection