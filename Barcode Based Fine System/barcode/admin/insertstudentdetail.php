<?php
	include('../config.php');
	
	
	 
	
	 if(isset($_POST['detailaccept']))
	{
		 
		 $_SESSION['formdata'] =$_POST;
		
		if($_FILES['image']['name'] != "")
		{
			
			
		
			$imagename=time().$_FILES['image']['name'];
			$imagetype=$_FILES['image']['type'];
			$imagetmpname=$_FILES['image']['tmp_name'];
			$imagesize=$_FILES['image']['size'];
			
			if($imagesize<=1048576 && $imagesize>=51200)
			{
			 
			move_uploaded_file($imagetmpname,"studentimage/".$imagename);
			mysql_connect('localhost','root','');
			mysql_select_db('cashdigi');
			$cardno = $_POST['cardno'];
			$rollno = $_POST['rollno'];
			$sname = $_POST['name'];
			$year = $_POST['year'];
			$branch = $_POST['branch'];
			$phoneno = '91'.$_POST['phoneno'];
			function random_password($num)
			{
				$val="asdfghjkrtyuiopqwbASDFHHGJYUOIUYUTRWQQ@%1322345456657768879765455";
				$studentpassword="";
				for($i=1;$i<=$num;$i++)
				{
					$index=rand(0,strlen($val)-1);
					$studentpassword=$studentpassword.$val[$index];	
				}	
				
				return $studentpassword;
				
			}
	
			$studentpassword = random_password(5);
			$query = "insert into student_detail values('$cardno','$rollno','$sname','$year','$branch','$phoneno','$studentpassword','$imagename'); ";
			$rs = mysql_query($query);
			if($rs==1)
			{
				$err="<span style='color:green;'>SUCCESSFULLY INSERTED!!!!</span>";
				$qu1="insert into std_amount values('$cardno','0000.00')";
				mysql_query($qu1);
				unset($_SESSION['formdata']);
			}
			else
			{
				$err="<span style='color:red;'>NOT SAVED!!!!</span>";
			}	
			}
			else
			{
				$err="<span style='color:red;'>IMAGE SIZE MUST BE INBETWEEN 50KB AND 1024KB!!!!</span>";
			}
		
		 
		}
		else
		{
			$err="<span style='color:red;'>Please INSERT IMAGE!!!!</span>";
		}
	}

?>

<script src="<?php echo JQLIB_PATH_HTML ?>/jquery-1.11.0.js"></script>

<script type="text/javascript">
	$(document).ready(function(e) {
        $('#insertstudentdetail').submit(function(){
			try
			{	
			$('.err').remove();	
			var cardno = $('#cardno').val().trim();
			var rollno = $('#rollno').val().trim();
			var name = $('#name').val().trim();
			var year = $('#year').val().trim();
			var branch = $('#branch').val().trim();
			var phoneno = $('#phoneno').val().trim();
			//var chkname=/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
			var flag=1;
			
			if(cardno.length==0)
			{
				$('#cardno').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
				flag = 0;
			}
			 if(rollno.length==0)
			{
			   $('#rollno').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
			   flag = 0;
			}
			if(name.length==0)
			{
				$('#name').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
				flag = 0;
			}
			 if(year.length==0)
			{
			   $('#year').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
			   flag = 0;
			}
			if(branch.length==0)
			{
				$('#branch').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
				flag = 0;
			}
			 if(phoneno.length==0)
			{
			   $('#phoneno').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
			   flag = 0;
			}
			
			if(flag)
			{
			   return true;	
			}
			else
			{
				
			 return false;	
			}
			}catch(err)
			{																				
				alert(err.message)
				}
			
			});
			////////////////////////////////////////////////////////////////////////
	  //onkeyup for numeric value
	    $('#cardno').keyup( function(){
			$('.errNum').remove();
			 var x= $(this).val().trim();
			 
			 if( !($.isNumeric(x)) && x!='' )
			 {
				 $(this).closest('tr').append('<td class="errNum" style="color:red;">* Only Number</td>');
			 }
	     })
			////////////////////////////////////////////////////////////////////////
	  //onkeyup for numeric value
	    $('#rollno').keyup( function(){
			$('.errNum').remove();
			 var x= $(this).val().trim();
			 
			 if( !($.isNumeric(x)) && x!='' )
			 {
				 $(this).closest('tr').append('<td class="errNum" style="color:red;">* Only Number</td>');
			 }
			 else
			 {
			    var count=x.length	;
				 if( count > 10)
				{
					$(this).closest('tr').append('<td class="errNum" style="color:red;">* 10 Digits only</td>');
					y=x.substr(0,count-1);
					$(this).val(y);
				}
				 
			 }
	     })
		 /////////////////////////////////////////////////
		 ////////////////////////////////////////////////////////////////////////
	  //onkeyup for numeric value
	    $('#phoneno').keyup( function(){
			$('.errNum').remove();
			 var x= $(this).val().trim();
			 
			 if( !($.isNumeric(x)) && x!='' )
			 {
				 $(this).closest('tr').append('<td class="errNum" style="color:red;">* Only Number</td>');
			 }
			 else
			 {
			    var count=x.length	;
				 if( count > 10)
				{
					$(this).closest('tr').append('<td class="errNum" style="color:red;">* 10 Digits only</td>');
					y=x.substr(0,count-1);
					$(this).val(y);
				} 
			 }
	     })
	////////////////////////////////////////////////////////////////////////////
			$(':input').keypress(function(e) {
                
					if(e.which==10 || e.which==13)
					{
						e.preventDefault();
						e.stopPropagation();
						return false;	
					}
				
            });
    });

</script>
<?php include ('header.php');?>
<h1 align="center"> INSERT STUDENT DETAIL </h1>

 <?php if ( isset($err) ){  ?>   
 <div id="msg" style="background-color:#F96; color:#0CF; height:25px; width:100%;" align="center"><?php echo $err;unset($err); ?></div>
  <?php } ?> 

<!-- Container -->
<div id="container">
  <div class="shell"> 
    
    <!-- Small Nav --> 
    <!--<div class="small-nav">
			<a href="#">Dashboard</a>
			<span>&gt;</span>
			Current Articles
		</div>--> 
    <!-- End Small Nav --> 
    
    <!-- Message OK --> 
    <!--<div class="msg msg-ok">
			<p><strong>Your file was uploaded succesifully!</strong></p>
			<a href="#" class="close">close</a>
		</div>--> 
    <!-- End Message OK --> 
    
    <!-- Message Error --> 
    <!--<div class="msg msg-error">
			<p><strong>You must select a file to upload first!</strong></p>
			<a href="#" class="close">close</a>
		</div>--> 
    <!-- End Message Error --> 
    <br />
    <!-- Main -->
    <div id="main">
      <div class="cl">&nbsp;</div>
      
      <!-- Content -->
      <div id="content"> 
        
        <!-- Box -->
        <div class="box"> 
          <!-- Box Head -->
          <div class="box-head">
            <h2 class="left">INSERT STUDENT DETAIL</h2>
          </div>
          <!-- End Box Head --> 
          
          <!-- Table -->
          <div class="table">
          <form action="" method="post" id="insertstudentdetail" enctype="multipart/form-data">
<table align="center">
	<tr>
    	<td><label>CARDNO.</label></td>
        <td><input type="text" id="cardno" name="cardno" placeholder="CARDNO" value="<?php echo $_SESSION['formdata']['cardno']?>"/></td>
    </tr>
    <tr>
    	<td><label>UNIVERSITY ROLL NUMBER / FACULTY ID</label></td><td><input type="text" id="rollno" name="rollno" placeholder="ROLLNO"  value="<?php echo $_SESSION['formdata']['rollno']?>" /></td>
    </tr>
    <tr>
    	<td><label>NAME</label></td><td><input type="text" id="name" name="name" placeholder="NAME"  value="<?php echo $_SESSION['formdata']['name']?>"/></td>
    </tr>
    <tr>
    	<td><label>YEAR OF ADMISSION / JOINING</label></td><td><input type="text" id="year" name="year" placeholder="YEAR OF ADMISSION"  value="<?php echo $_SESSION['formdata']['year']?>"/></td>
    </tr>
    <tr>
    	<td><label>BRANCH</label></td><td><input type="text" id="branch" name="branch" placeholder="BRANCH"  value="<?php echo $_SESSION['formdata']['branch']?>"/></td>
    </tr>
    <tr>
    	<td><label>PHONE NUMBER</label></td><td><input type="text" id="phoneno" name="phoneno" placeholder="PHONE NUMBER"  value="<?php echo $_SESSION['formdata']['phoneno']?>"/></td>
    </tr>
     <tr>
    	<td><label>STUDENT IMAGE / FACULTY IMAGE</label></td><td><input type="file" name="image"/></td>
    </tr>
    <tr>
    	<td><input type="submit" id="detailaccept" name="detailaccept"  /></td>
        <td><input type="button" onclick="form.reset();window.location='home.php'" id="cancel" name="cancel" value="BACK"/></td>
    </tr>
</table>
<?php unset($_SESSION['formdata'])?>
</form>
            <!-- Pagging -->
            
            <!-- End Pagging --> 
            
          </div>
          <!-- Table --> 
          
        </div>
        
      </div>
      <!-- End Content --> 
      
      
      <div class="cl">&nbsp;</div>
    </div>
    <!-- Main --> 
  </div>
</div>
<!-- End Container -->
<?php include('footer.php')?>