<!DOCTYPE html>
<html>
	<header>
		<link href="../css/search.css" rel="stylesheet">
		<meta  http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<title><?php echo $data;?></title>
	</header>
<body onload="show()">
	<div class="search_part">
		<?php if(isset($data)):?>
			<content class="values">
			<form action="process2" method="post" onsubmit="return validate();">
			<input type="text" value="<?php echo $data?>" id="text" placeholder="enter your search" name="text" onkeypress="show()" onblur="show()">
			<button type="submit" name="search" id="search" class="search">search</button><br>
			</form>
			</content>
			<?php else:?>
				<?php header("Location: ../?error='no_data_found'")?>
		<?php endif;?>
	</div>
</body>
</html>