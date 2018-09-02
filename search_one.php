<?php
class search_one
{
	function web($data,$count,$length,$page)
	{
		include "connect.php";
		$sel = "SELECT *FROM clodure";
		$res = $conn->query($sel);
		
		$data = $data;
		$client = getenv("HTTP_USER_AGENT");
		$length = strlen($data);
		$sn = explode(" ",$data);
		$count= count($sn);
		
		$total = mysqli_num_rows($res);
		$user_info = base64_encode(md5($client.$data));
		$num_p = 8;
		$select = "SELECT url,title,description FROM clodure WHERE  title LIKE '%$data%' OR description LIKE '%$data%'";
		$result = $conn->query($select);
		$part = mysqli_num_rows($result);
		if($part == 0)
		{
			//echo "<span class='num'>number of results found:($part)</span><br>";
		}
		else
		{
			$percentage = ($part / $total) * 100;
			echo "<span class='num'>$percentage%</span>";
		}
		if(! $result)
		{
			die("no data found".mysqli_error($conn));
		}
		$num_of_pages = ceil($part/$num_p);
		$page = $page;
		$starting_point = ($page - 1) * $num_p;
		for($i=1;$i <=$num_of_pages; $i++)
		{
			echo"<a href='./?q=$data&len=$length&page=$i&count=$count&agent=$user_info//?'> $i </a>";
		}
		//echo"$data $count $length";
		$sqli = "SELECT DISTINCT url,title,description FROM clodure  WHERE  title LIKE '%$data%' OR description LIKE '%$data%'   LIMIT  $starting_point,$num_p";
		$res = $conn->query($sqli);
		if(! $res)
		{
			die("no data found".mysqli_error($conn));
		}
		else
		{
			while($row = mysqli_fetch_array($res))
			{
				@$url = $row['url'];
				@$title = substr($row['title'],0,60);
				@$description = substr($row['description'],0,300);
				echo"<div class='result' id='web'><table class='results'>
							<tr><td>
								<span class='title'><a href='$url'>$title</a></span><br>
								<span class='url'>$url</span><br>
								<span class='description'>$description...</span><br>
							</tr></td>
						</table><br></div>";
			}
		}
		/*else
		{
			while($row = mysqli_fetch_array($result))
			{
				@$url = $row['url'];
				@$title = $row['title'];
				@$description = $row['description'];
				echo"<div class='result' id='web'><table class='results'>
							<tr><td>
								<span class='title'><a href='$url'>$title</a></span><br>
								<span class='url'>$url</span><br>
								<span class='description'>$description</span><br>
							</tr></td>
						</table><br></div>";
			}
		}*/
	}
}
$search_one = new search_one;
?>