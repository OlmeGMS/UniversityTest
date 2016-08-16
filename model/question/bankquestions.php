<?php
$var="";
$var1="";
$var2="";
$var3="";
$var4="";
$var5="";
if(isset($_POST["btn1"])){
	$btn=$_POST["btn1"];
	$bus=$_POST["txtbus"];
	if($btn=="Buscar"){
 
$sql="SELECT * FROM tbl_preguntas WHERE id_materia = '$bus'";
		$cs=mysql_query($sql,$cn);
		while($resul=mysql_fetch_array($cs)){
			$var=$resul[6];
			$var1=$resul[4];
			$var2=$resul[3];
			$var6=$resul[5];
			$var3=$resul[1];
			$var4=$resul[0];
			$var5=$resul[2];
			}
 
		}
 
	}
 
?>