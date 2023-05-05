<?php
$host = "localhost";
$username = "root";
$password = "";


try 
{
    $conn = new PDO("mysql:host=$host;dbname=phptest",$firdname,$lastname, $email, $phonenumber,$address,$dateofbirth,$age,$gender );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
$response = array('success' => false);

if(isset($_POST['firstname']) && $_POST['firft name']!=''&& isset($_POST['lastname']) && $_POST['last name']!='' && isset($_POST['email']) && $_POST['email']!=''  && isset($_POST['phonenumber']) && $_POST['phonenumber']!='' && isset($_POST['address']) && $_POST['address']!=''&& isset($_POST['dateofbirth']) && $_POST['dateofbirth']!=''&& isset($_POST['age']) && $_POST['age']!=''&& isset($_POST['gender']) && $_POST['gender']!='')
{
	$sql = "INSERT INTO contacts(firstname,lastname, email, phonenumber,address,dateofbirth,age,gender  ) VALUES('".addslashes($_POST['firstname'])."', '".addslashes($_POST['lastname'])."', '".addslashes($_POST['email'])."''".addslashes($_POST['phonenumber'])."', '".addslashes($_POST['address'])."', '".addslashes($_POST['dateofbirth'])."''".addslashes($_POST['age'])."', '".addslashes($_POST['gender'])."')";
	
	if($conn->query($sql))
	{
		$response['success'] = true;
	}
}

echo json_encode($response);