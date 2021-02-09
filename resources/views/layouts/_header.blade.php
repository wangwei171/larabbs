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
				
			</ul>

			<!--right-->
			<ul class="navbar-nav navbar-right">
				@guest
				<li class="nav-item"><a class="nav-link" href="{{route('login')}}">登录</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('register')}}">注册</a></li>
				@else
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="{{Auth::user()->avatar}}" class="img-responsive img-circle" width="30px" height="30px">
						{{Auth::user()->name}}
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a href="{{route('users.show',Auth::id())}}" class="dropdown-item">个人中心</a>
						<a href="{{route('users.edit',Auth::id())}}" class="dropdown-item">编辑资料</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item" id="logout">
							<form action="{{route('logout')}}" method="POST">
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