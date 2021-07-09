@extends('layout')

@section('content')
    <div >
        
        <div class="page-title-cont">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="page-title">Media Partners</h2>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{url('/admin/partners/add')}}" class="btn blue">Add New</a>
                </div>
            </div>
        </div>

        <div>
            <table class="table table-sorterd table-bordered table-hower">
                <thead>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Logo</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php $sn = 0; ?>
                    @foreach($partners as $list)
                    <tr id="partner_{{$list->id}}">
                        <td>{{++$sn}}</td>
                        <td>{{$list->name}}</td>
                        <td>
                            @if($list->logo)
                            <img src="{{url($list->logo)}}" style="width:100px">
                            @endif
                        </td>
                        <td>
                            <a href="{{url('admin/partners/edit/'.$list->id)}}" class="btn yellow">Edit</a>
                            <button div-id="partner_{{$list->id}}" action="{{('admin/partners/delete/'.$list->id)}}" class="btn red delete-div">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

@endsection