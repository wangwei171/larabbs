@extends('layouts.app')

@section('title','我的通知')

@section('content')

<div class="container">
	<div class="col-md-10 offset-md-1">
		<div class="card">
			<div class="card-body">
				<h3><i class="fa fa-bell" aria-hidden="true"></i>  我的通知</h3>
				<hr>


				@if($notifications->count())
					<div class="list-unstyled">
						@foreach($notifications as $notification)
							@include('notifications.types._'.Str::snake(class_basename($notification->type)))
						@endforeach

						
						{!!$notifications->render()!!}
						
					</div>
				@else
					<div>没有通知消息</div>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection