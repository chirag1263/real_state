
@extends('layout')

@section('content')


<h2 class="page-title">My Wishlist</h2>

<ul class="nav nav-tabs">
	<li class="{{(Input::get('type') == 1)?'active':''}}"><a href="{{url('/wishlist?type=1')}}">Projects</a></li>
	<li class="{{(Input::get('type') == 2)?'active':''}}"><a href="{{url('/wishlist?type=2')}}">Listings</a></li>
</ul>


@if(isset($projects))
	@if(sizeof($projects) > 0)
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>SN</th>
					<th>Project Title</th>
					<th>Address</th>
					<th>Cost</th>
				</tr>
			</thead>
			<tbody>
				@foreach($projects as $index => $project)
					<tr>
						<td>{{$index+1}}</td>
						<td><a href="{{url('project-details/'.$project->item_id)}}" target="_blank">{{$project->title}}</a></td>
						<td>{{$project->short_address}}</td>
						<td>{{$project->cost}}</td>

					</tr>
				@endforeach
				
			</tbody>
		</table>
		</ul>
	@else
		No wishlist item found
	@endif
	
@endif

@if(isset($listings))
	@if(sizeof($listings) > 0)
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>SN</th>
					<th>List Title</th>
					<th>Address</th>
					<th>Cost</th>

				</tr>
			</thead>
			<tbody>
				@foreach($listings as $index => $list)
					<tr>
						<td>{{$index+1}}</td>
						<td><a href="{{url('listing-details/'.$list->item_id)}}" target="_blank">{{$list->title}}</a></td>
						<td>{{$list->short_address}}</td>
						<td>{{$list->cost}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		No wishlist item found
	@endif
	
@endif


@endsection