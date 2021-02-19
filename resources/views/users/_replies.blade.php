@if(count($replies))
	<ul class="list-group mt-4 border-0">
		@foreach($replies as $reply)
			<li class="list-group-item pl-2 pr-2 border-left-0 border-right-0 @if($loop->first) border-top-0 @endif">
				<a href="{{$reply->topic->link(['#reply'.$reply->id])}}">
					{{$reply->topic->title}}
				</a>

				<div class="mt-2 mb-2">
				{!!$reply->content!!}
				</div>

				<div class="text-secondary">
					<i class="fa fa-clock"></i>回复于{{$reply->updated_at->diffForHumans()}}
				</div>
			</li>

		@endforeach
	</ul>

@else
	<div>暂无数据</div>
@endif

<div class="mt-4">
	{!!$replies->appends(Request::except('page'))->render()!!}
</div>