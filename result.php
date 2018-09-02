<?php
$search1 = $_POST['search_request'];
if(isset( $search1))
{
	$search = urlencode($search1);
	header("Location: result/?qd=$search");
}
else
{
	header("Location: ./");
}
?>