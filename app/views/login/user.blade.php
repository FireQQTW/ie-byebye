<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?=Config::get('app.site');?> Login</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('admin._partials.adminCss')

</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="icon-leaf green"></i>
									<span class="red"><?=Config::get('app.site');?></span>
									<span class="white">房客登入</span>
								</h1>
								<!-- <h4 class="blue">&copy; SleepingDesign</h4> -->
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												Please Enter Your Information
											</h4>

											<div class="space-6"></div>
											{{ Form::open(array('route'	=>	'user.login', 'method'	=>	'post')) }}
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															{{ Form::text('username', Input::old('username'), array('class'	=>	'form-control', 'placeholder'	=>	'Username')) }}
															<i class="icon-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															{{ Form::password('password', array('class'	=>	'form-control', 'placeholder'	=>	'Password')) }}
															<i class="icon-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															{{ Form::checkbox('remember-me', '1', Input::old('remember-me'), array('id'	=>	'remember-me', 'class'	=>	'ace')) }}
															<span class="lbl"> Remember Me</span>
														</label>
														{{ HTML::ButtonWithIcon('<i class="icon-key"></i> Login', array('class' => 'width-35 pull-right btn btn-sm btn-primary', 'type'	=>	'submit')) }}
													</div>

													<div class="space-4"></div>
												</fieldset>
											{{Form::close()}}
										</div><!-- /widget-main -->
									</div><!-- /widget-body -->
									@if ($errors->any() || Session::has('message'))
									<div class="alert alert-danger">
										<ul>
											{{ implode('', $errors->all('<li>:message</li>'))}}
											@if(Session::has('message'))
												<li>{{Session::get('message')}}</li>
											@endif
										</ul>
									</div>
									@endif
								</div><!-- /login-box -->

							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->
		</body>
</html>
