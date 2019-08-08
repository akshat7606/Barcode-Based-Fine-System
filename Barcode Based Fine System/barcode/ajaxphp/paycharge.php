<?php

	session_start();
	error_reporting(0);
	
	 if (   ($_SESSION['id']== NULL  &&  $_SESSION['salt']==NULL)  ||  ($_SESSION['id'] !=  $_SESSION['salt'])  )
    {
	   $errorNO="0";
	   $errMSG="InValid User";
	   echo json_encode(array('errno'=>$errorNO,'errormsg'=>$errMSG));
	   exit();
    }
	
	if($_SESSION['cardno']==NULL)
	{
		$errorNO="0";
	    $errMSG="InValid User";
	    echo json_encode(array('errno'=>$errorNO,'errormsg'=>$errMSG));
	    exit();
	}
	
	
	$id = $_POST['cid'];
	$pid=  $_POST['pid'];
	mysql_connect('localhost','root','');
	mysql_select_db('cashdigi');
	
	  //function to get latest id
	    function getTransactionId()
	   {
		  $q="Select id from transaction order by id desc limit 1 offset 1";
		  $data  = mysql_query($q);
		  $id  = mysql_fetch_assoc($data);
		  return  $id['id'] ;   
       }
	
    
	   $query = "select * from student_charge where id = '$id' AND cardno =".$_SESSION['cardno'];
	   $rs = mysql_query($query);
	
	if(mysql_num_rows($rs))
	{
		$data = mysql_fetch_assoc($rs);
		//print_r($data);
		$balancequery = "select amount from std_amount where cardno = ".$_SESSION['cardno'];
		$fire = mysql_query($balancequery);
		$balance = mysql_fetch_assoc($fire);
		$studentbalance=$balance['amount'];
		$charge = $data['amount'];
		 if($studentbalance < $charge)
		{
			$errorNO="0";
	        $errMSG="Less Amount";
	        echo json_encode(array('errno'=>$errorNO,'errormsg'=>$errMSG));
	        exit();
		}
		else
		{
			$newbalance = $studentbalance - $charge;
			$date = date('Y-m-d');
			$updatebalancequery = "update std_amount set amount = '$newbalance' where cardno = ".$_SESSION['cardno'];
			$updatestatus = "update student_charge set status = 1 where id= ".$id." and cardno = ".$_SESSION['cardno'];
			$inserttransaction = "insert into transaction values('NULL','".$_SESSION['cardno']."','$pid','$charge','$date')";
			
			mysql_query('BEGIN');
			
			$q1 = mysql_query($updatebalancequery);
			$q2 = mysql_query($updatestatus);
			$q3 = mysql_query($inserttransaction);
			
			/*echo "query1= ".$q1."\r\n";
			echo "query2 =".$q2."\r\n";
			echo "query3=".$q3."\r\n";*/
			
			
			 if( $q1 &&  $q2 && $q3)  
			{
			      mysql_query('COMMIT');
			      $currentId  = getTransactionId();
			      //putting transaction id in session 
			      $arr = $_SESSION['transID'];
			   if( is_array($arr) )
			   {
			    	 array_push($arr,$currentId);
					 $_SESSION['transID']=$arr;
			   }
			    else
			   {
				   $arr=array();
				   array_push($arr,$currentId);
			       $_SESSION['transID']=$arr;  
				   $_SESSION['transID']=array($currentId);
			   }
			   
			    $errorNO="1";
	            $errMSG="Transaction Saved";
				//print_r($_SESSION['transID']);
	            echo json_encode(array('errno'=>$errorNO,'errormsg'=>$errMSG));
	            exit();
				
		    }
			else
			{
				mysql_query('ROLLBACK');
				$errorNO="0";
	            $errMSG="Transaction fail";
	            echo json_encode(array('errno'=>$errorNO,'errormsg'=>$errMSG));
	            exit();
			}
					
			  	
		}
	}

?>