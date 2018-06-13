<?php
include ("menu.php")
?>


<center><h2>Seznam upravljavcev</h2></center>

<?php

require '../db_connection.php';
	$db_server = $connection;

?>
	
<?php

$query = "SELECT upravljalec.ime, upravljalec.priimek, privolitve.naslov, verzija.verzija 
            FROM upravljalec, privolitve, verzija 
            WHERE upravljalec.FK_upr_priv=privolitve.id 
            AND privolitve.id=verzija.FK_ver_priv";

$result = mysqli_query($db_server, $query);

if (!$result)
{
	die ("Dostop do PB ni uspel");
}
else
{
	$st_vrstic = mysqli_num_rows($result);
	if($st_vrstic > 0) 
		print('');
}

for ($j = 0 ; $j < $st_vrstic ; ++$j)
{
	$vrstica = mysqli_fetch_row($result); ?>
	
	<?php
}
  
 
?>	

<p>	
<table>
  <tr>
   <th>Ime upravljalca</th>
    <th>Priimek</th>
    <th>Naslov privolitve</th>
    <th>Verzija</th>
	
  </tr>
  <tr>
    <td><?php echo $vrstica[0] ?></td>
    <td><?php echo $vrstica[1] ?></td>
    <td><?php echo $vrstica[2] ?></td>
    <td><?php echo $vrstica[3] ?></td>
  </tr>
</table>



  
