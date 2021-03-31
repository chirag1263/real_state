@extends('layout')

@section('content')
<div >
  
  <div class="page-title-cont">
    <div class="row">
      <div class="col-md-8">
        <h2 class="page-title">Ratings Pending for Approval</h2>
      </div>
    </div>
  </div>

  <div>
    <table class="table table-sorterd table-bordered table-hower">
      <thead>
        <th>SN</th>
        <th>Agent</th>
        <th>Rating</th>
        <th>Review</th>
        <th>Given By</th>
        <th>#</th>
      </thead>
      <tbody>
        <?php $sn = 0; ?>
        @foreach($reviews as $row)
        <tr id="rating_{{$row->id}}">
          <td>{{++$sn}}</td>
          <td>{{$row->sf .' '. $row->sl}}</td>
          <td>{{$row->rating}}</td>
          <td>{{$row->review}}</td>
          <td>{{$row->first_name .' '. $row->last_name}}</td>
          <td>
            @if($row->status == 0)
              <button class="btn btn-sm btn-primary delete-div" action="{{('/admin/rating_reviews/approve/'.$row->id)}}" div-id="rating_{{$row->id}}">Approve</button>
              <button class="btn btn-sm btn-danger delete-div" action="{{('/admin/rating_reviews/approve/'.$row->id.'?status=2')}}" div-id="rating_{{$row->id}}"><i class="fa fa-remove"></i></button>
            @endif
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  

  @endsection