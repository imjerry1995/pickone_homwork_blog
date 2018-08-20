<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ action('PostController@index') }}">Jerry's Blog</a>
        <ul class="nav navbar-nav navbar-right">
			<li>
				<a href="{{ action('PostController@index') }}">文章列表</a>
			</li>
			@if(Auth::check())
				<li>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">個人資料</a></li>
                            <li><a href="#">新增文章</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}">登出</a></li>
                        </ul>
                    </div>
                </li>
			@else
				<li>
					<a href="{{ route('login') }}">登入</a>
				</li>
			@endif
		</ul>
    </div>
</nav>