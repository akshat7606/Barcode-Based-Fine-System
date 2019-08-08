<?php 
     
	session_start();
	if (   ($_SESSION['id']== NULL  &&  $_SESSION['salt']==NULL)  ||  ($_SESSION['id'] !=  $_SESSION['salt'])  )
    {
       echo 0;
	   exit();
    }
	
?>
<a href="logout.php"> L	ogout</a>
 <table border='1' align='center'>
		   <tr>
   		   		<td align='center' colspan='4'>TRANSACTION DETAIL</td>
		   </tr>
			<tr>
				<td align='center'>CARD NUMBER</td>
				<td>TYPE OF CHARGE</td>
				<td>AMOUNT</td>
				<td>DATE</td>
			</tr>
<?php  

	 foreach($_SESSION['transID'] as $val)
  	 {
		mysql_connect('localhost','root','');
		mysql_select_db('cashdigi');
		$showtransaction = "select * from transaction where id = '$val'";
		$date = date('d-M-y');
		
		$rs = mysql_query($showtransaction);
		while($r=mysql_fetch_assoc($rs))
		{?>
			<tr>
            	<td><?php echo  $r['cardno']?></td>
                <td><?php getName( $r['chargeid'] )?></td>
                <td><?php echo  $r['amount']?></td>
                <td><?php echo  $date;?></td>	
            </tr>
            <?php
		}
	 }
	 
	 /*
	    function for geting charge name 
		argument taken ( chargeid )
		output charge name
	 */
	  function getName( $id )
	 {
		 $sql = "select types from pay_types where id = '$id'";
		 $data = mysql_query($sql);
		 $data = mysql_fetch_assoc($data);
		 echo $data['types'];
	 }
	 
	 
	//unset the session transid value to null
	unset($_SESSION['transID']); 
?>       
            
            
	</table>
