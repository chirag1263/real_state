@extends('layout')

@section('content')
    <div >
        
        <div class="page-title-cont">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="page-title">Filters</h2>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{url('/admin/filters/add')}}" class="btn blue">Add New</a>
                </div>
            </div>
        </div>

        <div>
            <table class="table table-sorterd table-bordered table-hower">
                <thead>
                    <th>SN</th>
                    <th>Filter</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php $sn = 0; ?>
                    @foreach($filters as $list)
                    <tr id="filter_{{$list->id}}">
                        <td>{{++$sn}}</td>
                        <td>{{$list->filter_name}}</td>
                        <td>
                            <a href="{{url('admin/filters/edit/'.$list->id)}}" class="btn yellow">Edit</a>
                            <button div-id="filter_{{$list->id}}" action="{{('admin/filters/delete/'.$list->id)}}" class="btn red delete-div">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

@endsection