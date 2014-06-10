<head>
	<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">

	<link href="assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/bootstrap/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/bootstrap/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/bootstrap/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="assets/bootstrap/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="assets/bootstrap/ico/favicon.png">
</head>
<body>
	<div class="container">
		<form method="post" action="/SignIn">
			<h2 class="form-signin-heading">Введите логин и пароль</h2>
			<input name="login" type="text" class="input-block-level" placeholder="Логин">
			<input name="pass" type="text" class="input-block-level" placeholder="Пароль">
			<label class="checkbox">
				<input type="checkbox" value="remember-me"> Запомнить меня
			</label>
			<button class="btn btn-large btn-primary" type="submit">Войти</button>
		</form>
	</div>

	<script src="assets/jquery-2.0.3.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.js"></script>
</body>