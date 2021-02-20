<!--navbar-->
<nav class="navbar navbar-expand-lg bg-light navbar-light navbar-static-top">

<!--container-->
	<div class="container">

<!--navbar-brand-->
		<a class="navbar-brand" href="{{url('/')}}">laraBBS</a>

<!--Toggler/collapsible Button-->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
			<span class="navbar-toggler-icon"></span>
		</button>

<!--narbar links-->
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!--left-->
			<ul class="navbar-nav mr-auto">
				<li class="nav-item {{active_class(if_route('topics.index'))}}"><a class="nav-link" href="{{route('topics.index')}}">话题</a></li>
				<li class="nav-item {{category_nav_active(1)}}"><a class="nav-link" href="{{route('categories.show',1)}}">分享</a></li>
				<li class="nav-item {{category_nav_active(2)}}"><a class="nav-link" href="{{route('categories.show',2)}}">教程</a></li>
				<li class="nav-item {{category_nav_active(3)}}"><a class="nav-link" href="{{route('categories.show',3)}}">问答</a></li>
				<li class="nav-item {{category_nav_active(4)}}"><a class="nav-link" href="{{route('categories.show',4)}}">公告</a></li>

			</ul>

			<!--right-->
			<ul class="navbar-nav navbar-right">
				@guest
				<li class="nav-item"><a class="nav-link" href="{{route('login')}}">登录</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('register')}}">注册</a></li>
				@else

				<li class="nav-item">
					<a class="nav-link mt-1 mr-3 font-weight-bold" href="{{route('topics.create')}}">
						<i class="fa fa-plus"></i>
					</a>
				</li>

				<li class="nav-item notification-badge">
					<a class="badge badge-pill mr-3 nav-link badge-{{Auth::user()->notification_count>0?'hint':'secondary'}} text-white" href="{{route('notifications.index')}}">
						{{Auth::user()->notification_count}}
					</a>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="{{Auth::user()->avatar}}" class="img-responsive img-circle" width="30px" height="30px">
						{{Auth::user()->name}}
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a href="{{route('users.show',Auth::id())}}" class="dropdown-item"><i class="far fa-user mr-2"></i>个人中心</a>
						<a href="{{route('users.edit',Auth::id())}}" class="dropdown-item"><i class="far fa-edit mr-2"></i>编辑资料</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item" id="logout">
							<form action="{{route('logout')}}" method="POST" onsubmit="return confirm('您确定要退出吗？')">
								{{csrf_field()}}
								<button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
							</form>
						</a>
					</div>

				</li>
				@endguest
			</ul>
		</div>
	</div>
	
</nav>