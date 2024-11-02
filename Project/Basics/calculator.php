<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$result=0;
if(isset($_post["btn_add"]))
{
	$num1=$_post["txt_num1"];
	$num2=$_post["txt_num2"];
	$result=$snum1+$num2;
}
if(isset($_post["btn_sub"]))
{
	$num1=$_post["txt_num1"];
	$num2=$_post["txt_num2"];
	$result=$num1-$num2;
}
if(isset($_post["btn_mul"]))
{
	$num1=$_post["txt_num1"];
	$num2=$_post["txt_num2"];
	$result=$num1*$num2;
}
if(isset($_post["btn_div"]))
{
	$num1=$_post["txt_num1"];
	$num2=$_post["txt_num2"];
	$result=$num1/$num2;
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body><form action="" method="post"><table width="500" border="1">
<tr>
<td width="68">Number 1</td>
<td width="168"><label for="txt_num1"></label>
  <input type="text" name="txt_num1" id="txt_num1" /></td>
<td width="68">Number 2</td>
<td width="168"><label for="txt_num2"></label>
  <input type="text" name="txt_num2" id="txt_num2" /></td>
</tr>
<tr>
<td colspan="4"><div align="center">
  <input type="submit" name="btn_sub" id="btn_sub" value="-" />
  <input type="submit" name="btn_mul" id="btn_mul" value="*" />
  <input type="submit" name="btn_div" id="btn_div" value="/" />
  <input type="submit" name="btn_add" id="btn_add" value="+" />
</div></td>
</tr>
<tr>
<td>Result</td>
<td colspan="3"><?php echo $result ?></td>
</tr>
</table>
</form>
</body>
</html>