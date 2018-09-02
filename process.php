<html>
	<?php
	$client = getenv("HTTP_USER_AGENT");
	$conn = NEW mysqli("localhost","root","","clodure");
	if(! $conn)
	{
		die("no database found".mysqli_errno());
	}
	if(isset($client))
	{
		$os = "Windows";
		$regex = "/$os/i";
		//preg_match($regex,$client,$matches);
		if(preg_match($regex,$client))
		{
			if(isset($_POST['search']))
			{
				$data =time();
				$user_info = base64_encode(md5($client.$data));
				$data = $_POST['text'];
				$data = $conn->real_escape_string($data);
				$explode = explode(" ",$data);
				$count = count($explode);
				$length = strlen($data);
				echo "number of words:$count<br>string length is:$length";
				$final_data = urlencode($data); 
				header("Location: search/?q=$final_data&len=$length&$page=1&count=$count&agent=$user_info&//??");
			}
			else
			{
				header("Location: ./?error=error");
			}
		}
		else
		{
			header("Location: ./?agent=not_accepted");
		}
	}
	else
	{
		echo"the pages that u try to view are not for robots";
	}
	?>
	<script type="text/javascript">
	</script>
</html>