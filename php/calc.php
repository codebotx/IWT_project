<html>
<body>
<?php
if(isset(($_POST["add"])))
{
	$n1= $_POST["num1"]; 
	$n2=$_POST["num2"]; 
	$var_submit=$_POST["add"];
	$n3=$n1+$n2;
	echo "First number: $n1";
	echo "<br>";
	echo "Second number: $n2";
	echo "<br>";
	echo "<br>";
	echo "Operation: $var_submit";
	echo "<br>";
	echo "Result: $n3";	

}
else if(isset(($_POST["sub"])))
{
	$n1= $_POST["num1"]; 
	$n2=$_POST["num2"]; 
	$var_submit=$_POST["sub"];
	if($n1>$n2){
		$n3=$n1-$n2;
	}
	else if($n2>$n1){
		$n3=$n2-$n1;
	}
	else {
		$n3=0;
	}
	
	echo "First number: $n1";
	echo "<br>";
	echo "Second number: $n2";
	echo "<br>";
	echo "<br>";
	echo "Operation: $var_submit";
	echo "<br>";
	echo "Result: $n3";	

}

else if(isset(($_POST["mul"])))
{
	$n1= $_POST["num1"]; 
	$n2=$_POST["num2"]; 
	$var_submit=$_POST["mul"];
	$n3=$n1*$n2;
	echo "First number: $n1";
	echo "<br>";
	echo "Second number: $n2";
	echo "<br>";
	echo "<br>";
	echo "Operation: $var_submit";
	echo "<br>";
	echo "Result: $n3";	

}

else if(isset(($_POST["div"])))
{
	$n1= $_POST["num1"]; 
	$n2=$_POST["num2"]; 
	$var_submit=$_POST["div"];
	$n3=$n1/$n2;
	echo "First number: $n1";
	echo "<br>";
	echo "Second number: $n2";
	echo "<br>";
	echo "<br>";
	echo "Operation: $var_submit";
	echo "<br>";
	echo "Result: $n3";	

}
?>



</body>
</html>