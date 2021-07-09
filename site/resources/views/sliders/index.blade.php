@extends('layout')

@section('content')
    <div >
        
        <div class="page-title-cont">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="page-title">Home Slider</h2>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{url('/admin/sliders/add')}}" class="btn blue">Add New</a>
                </div>
            </div>
        </div>

        <div>
            <table class="table table-sorterd table-bordered table-hower">
                <thead>
                    <th>SN</th>
                    <th>Small Heading</th>
                    <th>Main Heading</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php $sn = 0; ?>
                    @foreach($sliders as $list)
                    <tr id="slider_{{$list->id}}">
                        <td>{{++$sn}}</td>
                        <td>{{$list->small_heading}}</td>
                        <td>{{$list->main_heading}}</td>
                        <td>{{$list->description}}</td>
                        <td>
                            @if($list->slider_image)
                            <img src="{{url($list->slider_image)}}" style="width:100px">
                            @endif
                        </td>
                        <td>
                            <a href="{{url('admin/sliders/edit/'.$list->id)}}" class="btn yellow">Edit</a>
                            <button div-id="slider_{{$list->id}}" action="{{('admin/sliders/delete/'.$list->id)}}" class="btn red delete-div">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

@endsection