<?php
  session_start();
  
  $cardno=$_REQUEST['id'];
  
    mysql_connect('localhost','root','');
	mysql_select_db('cashdigi');
	$query1 = "select * from student_detail where cardno= $cardno";
	$rs = mysql_query($query1);

?>

  <table border="1" align="center" style="margin-top:100px">
     <tr>
        <td>Card No</td>
        <td>Roll No</td>
        <td>Name</td>
        <td>Year</td>
        <td>Branch</td>
        <td>Phone No</td>
        <td>image</td>
     </tr>
     <?php 
	        if(mysql_num_rows($rs)){
	        while($r=mysql_fetch_assoc($rs)){?>
         <tr>
           <td><?php echo $r['cardno']?></td>
           <td><?php echo $r['rollno']?></td>
           <td><?php echo $r['sname']?></td>
           <td><?php echo $r['year']?></td>
           <td><?php echo $r['branch']?></td>
           <td><?php echo $r['phno']?></td>
           <td><img src="studentimage/<?php echo $r['studentimage']?>" style="height:100px; width:100px;"></td>
        </tr>
     
     <?php } 
		}else{?>
          <tr>
             <td colspan="7" align="center">No Record Found</td>
          </tr>
        
        <?php }?>
     
  </table>