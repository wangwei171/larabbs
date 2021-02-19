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

					<span class="float-right">
						<a href="">
							<i class="fa fa-trash-alt"></i>
						</a>
					</span>
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