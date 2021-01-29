@extends('layout')

@section('content')
    <div >
        
        <div class="page-title-cont">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="page-title">List Categories</h2>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{url('/admin/list-categories/add')}}" class="btn blue">Add New</a>
                </div>
            </div>
        </div>

        <div>
            <table class="table table-sorterd table-bordered table-hower">
                <thead>
                    <th>SN</th>
                    <th>Category Name</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php $sn = 0; ?>
                    @foreach($lists as $list)
                    <tr>
                        <td>{{++$sn}}</td>
                        <td>{{$list->category_name}}</td>
                        <td>
                            <a href="{{url('admin/list-categories/add/'.$list->id)}}" class="btn yellow">Edit</a>
                            <a href="{{url('admin/list-categories/delete/'.$list->id)}}" class="btn red" onclick="return confirm('Are you sure to delete?');">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

@endsection