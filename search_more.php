<?php
class search_more
{
	function web($text,$page)
	{
		include "connect.php";
		$sel = "SELECT *FROM clodure";
		$res = $conn->query($sel);
		$data = $text;
		$client = getenv("HTTP_USER_AGENT");
		$length = strlen($data);
		$sn = explode(" ",$data);
		$count= count($sn);
		$total = mysqli_num_rows($res);
		$user_info = base64_encode(md5($client.$data));
		$num_p = 8;
		$total = mysqli_num_rows($res);
		$select = "SELECT * ,  MATCH(title, description) AGAINST('$text')  As score FROM clodure WHERE MATCH(title,description) AGAiNST ('+$text' IN BOOLEAN MODE) ORDER BY score DESC";
		$result = $conn->query($select);
		$part = mysqli_num_rows($result);
		if($part == 0)
		{
			echo "<span class='num'>number of results found:()</span><br>";
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
			$text_m = urlencode($data);
			echo"<section class='page'><a href='./?q=$text_m&len=$length&page=$i&count=$count&agent=$user_info//?'> $i </a></section>";
		}
		//echo"$text $count $length";
		$selec = "SELECT url,title,description FROM clodure WHERE MATCH(title,description) AGAiNST ('$text')  LIMIT  $starting_point,$num_p ";
		$resu = $conn->query($selec);
		$part = mysqli_num_rows($resu);
		if($part == 0)
		{
			echo "<span class='num'>number of results found:()</span><br>";
		}
		else
		{
			while($row = mysqli_fetch_array($resu))
			{
				@$url = $row['url'];
				@$title = substr($row['title'],0,45);
				@$description = substr($row['description'],0,300);
				echo"<div class='result' id='web'><table class='web'>
							<tr><td>
								<span class='title'><a href='$url'>$title....</a></span><br>
								<span class='url'>$url</span><br>
								<span class='description'>$description....</span><br>
							</tr></td>
						</table><br></div>";
				//echo "$title<br>$url<br>$description<br><br>";
			}
		}
	}
}
$search_more = new search_more;
?>
