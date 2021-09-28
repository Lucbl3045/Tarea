<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
<?php
$link = mysqli_connect("localhost","root","","classicmodels");
mysqli_set_charset($link, "utf8");
if(mysqli_connect_errno())	
{
	die("no se pudo conecatar Error". mysqli_connect_errno());
}
$max_regs = 4;
 //4 registros por pagina
$sql="SELECT * FROM customers WHERE customers.customerName LIKE 'A%' LIMIT ".$max_regs.",".$max_regs;
$varRes = mysqli_query($link,$sql);
$cant_res = mysqli_num_rows($varRes);
$page = 1; 

$cantpags = ceil($cant_res / $max_regs);

?>

<table border='1'>
	<tr>
		<td>customerName</td>
		<td>customerNumber</td>
	</tr>
<?php  while ($row = mysqli_fetch_assoc($varRes)){ ?> 
	<tr>
		<td><?php echo $row['customerName']; ?></td>
		<td><?php echo $row['customerNumber']; ?></td>
	</tr>
<?php } ?> 
</table>

<?php
echo mysqli_num_rows($varRes). "<br>". mysqli_fetch_assoc($varRes);
 
?>
</body>

</html>