@include('shared._error')

<div>
	<form method="post" action="{{route('replies.store')}}" accept-charset="UTF-8">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="hidden" name="topic_id" value="{{$topic->id}}">
		<div class="form-group">
			<textarea rows="3" placeholder="发表你的见解" name="content" class="form-control"></textarea>
		</div>
		<button class="btn btn-primary btn-sm"><i class="fa fa-share mr-1"></i>回复</button>
	</form>
</div>

<hr>