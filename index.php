<title>세븐나이츠2 쿠폰입력 사이트</title>
<html>
<body>
<?PHP
$id = $_GET["id"];
$pid = $_GET["pid"];
$CouponCode = 'SENAYAHO|GOGOSENA|danjangnimluv|COMINGSOON|kingadel|BIGUPDATE|NEWSCENARIO|DUDUDUNGA|legendsena|gumankm|VELVET|EVENTMATJIB|EVAN|8RAID8|4RAID4|dugudugu|LADY|WOWSENA|LADYKILLER|oneshot|KEEEEE|Imsohot|Happycoco|Reinforce|OLDRUDY|update|senaforever|SEYAHO|sknights2|HISENA2|7infinite7|tpqmsskdlcm2|GREATEVENT|2SEVEN2|SK2FORUM|senainssa|2S2E2V2E2N|COCOJOA|CHECKCHECK|2STHGINNEVES|SENAMOON|KEKESENA2';
$Coupon = explode( '|', $CouponCode );
$url = 'https://couponview.netmarble.com/coupon/sknightsmmo/1290/apply';
$tirmCode = str_replace(' ', '+',$pid);
	

function aes256De($destr)
{
	return trim;
	//return trim(openssl_decrypt($destr, 시크릿 키));
}
	

	if ( $pid <> '') {
		$deid = aes256De($tirmCode);
			for($i=0; $i<= 41; $i=$i+1)
	{
	$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => "pid=" .$deid. "&channelCode=100&couponCode=" .$Coupon[$i]. "&worldId=&nickname=",
		]
	];
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	
	$data1 = explode('","couponSetting', explode( '"resultCode":"', $result )[1])[0];
	
	
	if ( $data1 == 'COUPON_ALREADY_USE' ){
	echo( $i +1 .". " . $Coupon[$i]. " : 이미 사용하신 쿠폰입니다.<br>");
	}

	if ( $data1 == 'NOT_EXISTS_PID' ){
	echo("계정코드가 올바르지 않습니다.<br>");
	break;
	}
	
	if ( $data1 == 'SUCCESS' ){
	$data2 = explode('","rewardDesc', explode( '"rewardTitle":"', $result )[1])[0];
	$data3 = explode('","creationStddatetime', explode( '"rewardImageUrl":"', $result )[1])[0];
	echo( $i +1 .". " . $Coupon[$i]. " : " . $data2 . "<br>");
	echo "<img src ='" . $data3 . "'><br>";
	}
	
	
	
	}
	} else if( $id <> '' ) {
	for($i=0; $i<= 41; $i=$i+1)
	{

	$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => "pid=" .$id. "&channelCode=100&couponCode=" .$Coupon[$i]. "&worldId=&nickname=",
		]
	];
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	
	$data1 = explode('","couponSetting', explode( '"resultCode":"', $result )[1])[0];
	
	
	if ( $data1 == 'COUPON_ALREADY_USE' ){
	echo( $i +1 .". " . $Coupon[$i]. " : 이미 사용하신 쿠폰입니다.<br>");
	}

	if ( $data1 == 'NOT_EXISTS_PID' ){
	echo("계정코드가 올바르지 않습니다.<br>");
	break;
	}
	
	if ( $data1 == 'SUCCESS' ){
	$data2 = explode('","rewardDesc', explode( '"rewardTitle":"', $result )[1])[0];
	$data3 = explode('","creationStddatetime', explode( '"rewardImageUrl":"', $result )[1])[0];
	echo( $i +1 .". " . $Coupon[$i]. " : " . $data2 . "<br>");
	echo "<img src ='" . $data3 . "'><br>";
	}
	
	}
	}
	
	


?>

	<?php if( $id == '' and $pid == '' ):?>
	<form name=test onsubmit="return check()" action="./index.php">
	<input type="text" name="id" placeholder="계정 코드"  />
	<input type="submit" value="개인링크 생성">
	</form>
	</body>
	<?php endif; ?>
	
	<?php if( $id == '' and $pid == '' ):?>
	<form name=test onsubmit="return check()" action="./link.php">
	<input type="text" name="id" placeholder="계정 코드" />
	<input type="submit" value="공유링크 생성">
	</form>
	<img src ='https://sgimage.netmarble.com/images/netmarble/sknightsmmo/20201116/jb6p1605495447473.jpg'><br>
	</body>
	<?php endif; ?>
	
	
</html>