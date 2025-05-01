@extends('layouts.app')

@section('content')
	<div class="container pt-5">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<h1 class="mb-3">新規会員登録</h3>

					<hr class="mb-4">

					<form method="POST" action="{{ route('register') }}">
						@csrf

						<div class="form-group row mb-3">
							<label for="name" class="col-md-5 col-form-label text-md-left fw-medium">氏名<span
									class="ms-1 ecmart-require-input-label"><span class="ecmart-require-input-label-text">必須</span></span></label>

							<div class="col-md-7">
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror ecmart-login-input"
									name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="山田太郎">

								@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>氏名を入力してください</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group row mb-3">
							<label for="email" class="col-md-5 col-form-label text-md-left fw-medium">メールアドレス<span
									class="ms-1 ecmart-require-input-label"><span class="ecmart-require-input-label-text">必須</span></span></label>

							<div class="col-md-7">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror ecmart-login-input"
									name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="xxxx@xxxx.com">

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>メールアドレスを入力してください</strong>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group row mb-3">
							<label for="postal_code" class="col-md-5 col-form-label text-md-left fw-medium">郵便番号<span
									class="ms-1 ecmart-require-input-label"><span class="ecmart-require-input-label-text">必須</span></span></label>

							<div class="col-md-7">
								<input id="postal_code" type="text"
									class="form-control @error('postal_code') is-invalid @enderror ecmart-login-input" name="postal_code"
									value="{{ old('postal_code') }}" required autocomplete="postal_code" placeholder="000-0000">

								@error('postal_code')
									<span class="invalid-feedback" role="alert">
										<strong>郵便番号を入力してください</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group row mb-3">
							<label for="address" class="col-md-5 col-form-label text-md-left fw-medium">住所<span
									class="ms-1 ecmart-require-input-label"><span class="ecmart-require-input-label-text">必須</span></span></label>

							<div class="col-md-7">
								<input id="address" type="text"
									class="form-control @error('address') is-invalid @enderror ecmart-login-input" name="address"
									value="{{ old('address') }}" required autocomplete="address" placeholder="〇〇県〇〇市〇〇区〇〇町〇〇">

								@error('address')
									<span class="invalid-feedback" role="alert">
										<strong>住所を入力してください</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group row mb-3">
							<label for="phone" class="col-md-5 col-form-label text-md-left fw-medium">電話番号<span
									class="ms-1 ecmart-require-input-label"><span class="ecmart-require-input-label-text">必須</span></span></label>

							<div class="col-md-7">
								<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror ecmart-login-input"
									name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="000-0000-0000">

								@error('phone')
									<span class="invalid-feedback" role="alert">
										<strong>電話番号を入力してください</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group row mb-3">
							<label for="password" class="col-md-5 col-form-label text-md-left fw-medium">パスワード<span
									class="ms-1 ecmart-require-input-label"><span class="ecmart-require-input-label-text">必須</span></span></label>

							<div class="col-md-7">
								<input id="password" type="password"
									class="form-control @error('password') is-invalid @enderror ecmart-login-input" name="password" required
									autocomplete="new-password">

								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group row mb-4">
							<label for="password-confirm" class="col-md-5 col-form-label text-md-left fw-medium">パスワード（確認用）<span
									class="ms-1 ecmart-require-input-label"><span class="ecmart-require-input-label-text">必須</span></span></label>

							<div class="col-md-7">
								<input id="password-confirm" type="password" class="form-control ecmart-login-input"
									name="password_confirmation" required autocomplete="new-password">
							</div>
						</div>

						<hr class="mb-4">

						<button type="submit" class="btn ecmart-submit-button w-100 text-white">
							アカウント作成
						</button>
					</form>
			</div>
		</div>
	</div>
@endsection
