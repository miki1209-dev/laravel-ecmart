<nav class="navbar navbar-expand-md navbar-light shadow-sm ecmart-header-container">
	<div class="container">
		<a href="{{ url('/') }}" class="navbar-brand">
			<img src="{{ asset('img/logo.png') }}">
		</a>
		<form action="{{ route('products.index') }}" method="GET" class="row g-1">
			<div class="col-auto">
				<input name="keyword" class="form-control ecmart-header-search-input" placeholder="商品名を入力してください">
			</div>
			<div class="col-auto">
				<button type="submit" class="btn ecmart-header-search-button">
					<i class="fas fa-search ecmart-header-search-icon"></i>
				</button>
			</div>
		</form>
		{{-- スマホハンバーガーメニュー --}}
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ms-auto mr-5 mt-2">
				@guest
					<li class="nav-item mr-5">
						<a href="{{ route('register') }}" class="nav-link">登録</a>
					</li>
					<li class="nav-item mr-5">
						<a href="{{ route('login') }}" class="nav-link">ログイン</a>
					</li>
					<hr>
					<li class="nav-item mr-5">
						<a class="nav-link" href="{{ route('login') }}"><i class="far fa-heart"></i></a>
					</li>
					<li class="nav-item mr-5">
						<a class="nav-link" href="{{ route('login') }}"><i class="fas fa-shopping-cart"></i></a>
					</li>
				@else
					<li class="nav-item mr-5">
						<a href="{{ route('mypage.favorite') }}" class="nav-link">
							<i class="fas fa-heart mr-1"></i>
						</a>
					</li>
					<li class="nav-item mr-5">
						<a href="{{ route('carts.index') }}" class="nav-link">
							<i class="fas fa-shopping-cart mr-1"></i>
						</a>
					</li>
					<li class="nav-item mr-5">
						<a href="{{ route('mypage') }}" class="nav-link">
							<i class="fas fa-user mr-1"></i><label>マイページ</label>
						</a>
					</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>
