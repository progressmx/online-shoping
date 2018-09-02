<?php
include'connect.php';
$find = "make";
function s_ch($word)
		{
		include'connect.php';
			$sel = "SELECT title,description FROM clodure";
			$rs = $conn->query($sel);
			if(!$rs)
			{
				die("words not found".mysqli_error($conn));
			}
			else
			{
				while($rw  = mysqli_fetch_array($rs))
				{
					@$ttl =explode(" ",$rw['title']);
					@$desc= explode(" ",$rw['description']);
					$shortest = -1;
					
					foreach($ttl as $title)
					{
						foreach($desc as $descr)
						{
							$drty = $title." ".$descr;
							$regex = "/[^a-zA-Z0-9]/";
							$clean = preg_replace($regex," ",$drty);
							$clean = explode(" ",$clean);
							$in= explode(" ",$word);
							foreach($clean as $cleaner)
							{
								foreach($in as $wordz)
								{
									$lev = levenshtein($wordz,$cleaner);
									if ($lev == 0) {
										$closest = $cleaner;
										$shortest = 0;
										break;
									}
									if ($lev <= $shortest || $shortest < 0) {
										$closest  = $cleaner;
										$shortest = $lev;
									}
								}
							}
						}
					}
				}
				if ($shortest == 0) {
					echo "Exact match found for: $word<br>";
				} else {
					echo "searched-terms: $word\n<br>";
					echo "Did you mean: $closest?\n<br>";
				}
			}
		}
		s_ch($find);
?>