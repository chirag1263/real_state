@if(isset($projects))
	@if(sizeof($projects) > 0)
		<ul class="list-items">
			@foreach($projects as $project)
			<li><a href="{{url('project-details/'.$project->item_id)}}" target="_blank">{{$project->title}}</a></li>
			@endforeach
		</ul>
	@else
		No wishlist item found
	@endif
	
@endif

@if(isset($listings))
	@if(sizeof($listings) > 0)
		<ul class="list-items">
			@foreach($listings as $list)
			<li><a href="{{url('listing-details/'.$list->item_id)}}" target="_blank">{{$list->title}}</a></li>
			@endforeach
		</ul>
	@else
		No wishlist item found
	@endif
	
@endif