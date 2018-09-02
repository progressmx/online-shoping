<html>
<script type="text/javascript" src="js/validate.js">
</script>
<head>
	<title>iris</title>
	<link href="css/font/font-awesome.min.css" rel="stylesheet"/>
	<link href="css/css.css" rel="stylesheet"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"></meta>
	<meta name="description" content ="iris search engine" charset="UTF-8"></meta>
</head>
<body>
	<section class="search">
		<form action="process"  method="post" onsubmit="return validate()">
			<input type="text" name="text" id="text" placeholder="search iris" name="text"></input>
			<button type="submit" name="search" id="search" ><i class="fa fa-search" ></i></button>
			<p id="ms4"></p>
			<p id="error"></p><br>
		</form>	
		<div class="popular">
				<!----<span><i class="fa fa-list"></i></span>!--->
		</div>
	</section>
	<section class="footer">
		<footer>
			<a href="#">terms</a>
			<a href="#">advertisement</a>
			<a href="#">suggestions</a>
			<a href="#">privacy</a>
			<a href="#">help</a>
			<a href="#">about</a></br>
		</footer>
	</section>
</body>
</html>