<li class="media @if(!$loop->last) border-bottom @endif">
	<div class="media-left">
		<img class="media-object img-thumbnail mr-3" src="{{$notification->data['user_avatar']}}" style="width:48px;height: 48px;">
	</div>

	<div class="media-body">
		<div class="meida-heading mt-0 mb-1 text-secondary">
			<a href="{{route('users.show',$notification->data['user_id'])}}">{{$notification->data['user_name']}}</a>
			  评论了
			<a href="{{$notification->data['topic_link']}}">{{$notification->data['topic_title']}}</a>

			<span class="float-right">
				<i class="fa fa-clock"></i>
				{{$notification->created_at->diffForHumans()}}
			</span>
		</div>

		<div>
			{!!$notification->data['reply_content']!!}
		</div>
	</div>
</li>