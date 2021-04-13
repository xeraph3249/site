<?PHP
$id = $_GET["id"];

	function aes256En($enstr)
	{
		return trim ;
	//	return trim(openssl_encrypt($enstr, 시크릿 키));
	}
	$pid = aes256En($id);
	Header("Location:./index.php?pid=" . $pid . ""); 

?>