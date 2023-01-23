<?php
include '../connection.php'; 

$userEmail=$_POST['user_email'];
$userPassword=md5($_POST['user_password']);


$sqlQuery = "SELECT * FROM  users_table WHERE user_email= '$userEmail' AND user_password= '$userPassword'";

$resultofQuery = $connectNow->query($sqlQuery);

if($resultofQuery->num_rows > 0)
{
    $userRecord = array();
    while($rowFound = $resultofQuery->fetch_assoc())
    {
        $userRecord[] = $rowFound;
    }
    echo json_encode(
        array(
           "success"=>true,
           "userdata"=>$userRecord[0],
        )
    );
 
}
else
{
    echo json_encode(array("success"=>false));
}