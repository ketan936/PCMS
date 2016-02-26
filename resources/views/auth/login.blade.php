@include('/includes/meta')
<body class="home-background" >

<div class="home-landing-block">
	<h1>PCMS</h1>
	<p>A PantryCar Backend Suite</p>
	<div class="bottom-line"></div>
</div>

<div class="container-fluid login-section">
	<div class="row">
		<div class="col-md-7 col-md-offset-3 mt20">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/verify') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<div class="col-md-5">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" required="1">
							</div>
							<div class="col-md-5">
								<input type="password" class="form-control" name="password" required="1">
							</div>
							<div class="col-md-2 text-right">
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
						</div>
					</form>
				</div>
	</div>
</div>

@include('includes/footer')