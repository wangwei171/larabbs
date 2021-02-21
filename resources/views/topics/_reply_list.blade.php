<ul class="list-unstyled">
	@foreach($replies as $index=>$reply)
		<li class="media">
			{{--头像 名称 回复时间 删除按钮 回复内容--}}
			<div class="media-left">
				<img src="{{$reply->user->avatar}}" style="width:48px;height: 48px;" class="media-object mr-3 img-thumbnail">
			</div>
			<div class="media-body">
				<div class="media-heading">
					<a href="">{{$reply->user->name}}</a>
					<span class="text-secondary"> • </span>
					<span class="text-secondary">{{$reply->created_at->diffForHumans()}}</span>

					@can('destroy',$reply)
					<span class="float-right">
						<form method="POST" action="{{route('replies.destroy',$reply->id)}}" onsubmit="return confirm('确定要删除吗？')">
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button class="btn btn-default btn-xs text-secondary" type="submit">
								<i class="fa fa-trash-alt"></i>
							</button>
						</form>
					</span>
					@endcan
				</div>

				<div class="text-secondary">
					{!!$reply->content!!}
				</div>
			</div>
		</li>

		@if(!$loop->last)
		<hr>
		@endif
	@endforeach
</ul>