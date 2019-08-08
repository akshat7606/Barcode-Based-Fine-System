<?php

	mysql_connect('localhost','root','');
	mysql_select_db('cashdigi');
	
	echo  mysql_insert_id();
	
?>
<script>
  var x=false;
</script>
<form onSubmit="return(x)" id="frm">

<input type="text" id="t1" name ="t1" />
<input type="button" id="b1" name="b1" onClick=" x = true ;  frm.submit();"  value="SAVE"/> 

</form>