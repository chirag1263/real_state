@extends('layout')

@section('content')
    <div >
        
        <div class="page-title-cont">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="page-title">Faqs</h2>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{url('/admin/faqs/add')}}" class="btn blue">Add New</a>
                </div>
            </div>
        </div>

        <div>
            <table class="table table-sorterd table-bordered table-hower">
                <thead>
                    <th>SN</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php $sn = 0; ?>
                    @foreach($faqs as $list)
                    <tr id="faq_{{$list->id}}">
                        <td>{{++$sn}}</td>
                        <td>{{$list->question}}</td>
                        <td>{{$list->answer}}</td>
                        <td>
                            <a href="{{url('admin/faqs/edit/'.$list->id)}}" class="btn yellow">Edit</a>
                            <button div-id="faq_{{$list->id}}" action="{{('admin/faqs/delete/'.$list->id)}}" class="btn red delete-div">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

@endsection