@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<span>
					<a href="{{ route('mypage') }}">マイページ</a> > <a href="{{ route('mypage.cart_history') }}">注文履歴</a>
				</span>
				<h1 class="mt-3">注文履歴詳細</h1>
				<h3 class="mt-3">ご注文情報</h3>

				<hr>

				{{-- @php
					dump($cart_info);
				@endphp --}}

				<div class="row">
					<div class="col-5 mt-2">
						注文番号
					</div>
					<div class="col-7 mt-2">
						{{ $cart_info->code }}
					</div>

					<div class="col-5 mt-2">
						注文日時
					</div>
					<div class="col-7 mt-2">
						{{ $cart_info->updated_at }}
					</div>

					<div class="col-5 mt-2">
						合計金額
					</div>
					<div class="col-7 mt-2">
						{{ $cart_info->price_total }}円
					</div>

					<div class="col-5 mt-2">
						合計数量
					</div>
					<div class="col-7 mt-2">
						{{ $cart_info->qty }}個
					</div>
				</div>

				<hr class="mt-4">

				<div class="row">
					@foreach ($cart_contents as $product)
						<div class="col-md-5 mt-2">
							<a href="{{ route('products.show', $product->id) }}" class="ml-4">
								@if ($product->options->image)
									<img src="{{ asset($product->options->image) }}" class="img-fluid w-75">
								@else
									<img src="{{ asset('img/dummy.png') }}" class="img-fluid w-75">
								@endif
							</a>
						</div>
						<div class="col-md-7 mt-2">
							<div class="flex-column">
								<div class="row">
									<div class="col-2 mt-2">
										商品名
									</div>
									<div class="col-10 mt-2">
										{{ $product->name }}
									</div>
									<div class="col-2 mt-2">
										数量
									</div>
									<div class="col-10 mt-2">
										{{ $product->qty }}個
									</div>

									<div class="col-2 mt-2">
										小計
									</div>
									<div class="col-10 mt-2">
										{{ $product->qty * $product->price }}円
									</div>

									<div class="col-2 mt-2">
										送料
									</div>

									<div class="col-10 mt-2">
										@if ($product->options->carriage)
											800円
										@else
											0円
										@endif
									</div>

									<div class="col-2 mt-2">
										合計
									</div>

									<div class="col-10 mt-2">
										@if ($product->options->carriage)
											{{ $product->qty * $product->price + 800 }}
										@else
											{{ $product->qty * $product->price }}円
										@endif
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection
