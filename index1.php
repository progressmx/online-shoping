<script type="text/javascript" src="js/perc.js">
</script>
<style type="text/css">
#search
{
	position:absolute;
}
#perc
{
	font-size:12px;
	color:white;
	font-family:Arial;
	text-align:center;
}
</style>
<body onload="show()" >
<form  action="process" method="post" onsubmit=" return validate()">
<input type="text" id="text" name="text" onkeypress="show()" onblur="show()">
<input type="submit" id="search" name="search" class="search" value="search"><br>
<div id="perc">
</div>
<p id="ms4"></p>
<p id="error"></p><br>
</form>
</body>