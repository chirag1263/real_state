
@extends('layout')

@section('content')


<h2 class="page-title">Enquiries</h2>
<ul class="nav nav-tabs">
	<li class="{{(Input::get('type') == 1)?'active':''}}"><a href="{{url('admin/enquiries?type=1')}}">Projects</a></li>
	<li class="{{(Input::get('type') == 2)?'active':''}}"><a href="{{url('admin/enquiries?type=2')}}">Listings</a></li>
</ul>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>SN</th>
			<th>{{(Input::get('type') == 1)?'Project':'Listing'}} Name</th>
			<th>Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Message</th>
		</tr>
	</thead>
	<tbody>
		@foreach($enquiries as $index => $list)
			<tr>
				<td>{{$index+1}}</td>
				<td>
					@if($list->type == 1)
						{{$list->project_name}}
					@else
						{{$list->list_name}}
					@endif
				</td>
				<td>{{$list->name}}</td>
				<td>{{$list->email}}</td>
				<td>{{$list->phone}}</td>
				<td>{{$list->message}}</td>
			</tr>
		@endforeach
	</tbody>
</table>


@endsection