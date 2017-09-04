<?php

function search_data($openID)
{
	$servername = "localhost";
	$username = "root";
	$password = "356033";
	$dbname = "linglingpai";

	// echo($openID);
	$con = mysqli_connect($servername, $username, $password, $dbname);

	if (mysqli_connect_errno())
	{
		echo "连接失败: " . mysqli_connect_error();
	}

	$result = mysqli_query($con,"SELECT * FROM usersInfo
		WHERE openid='$openID'");


	// return($result->num_rows);
	while($row = mysqli_fetch_array($result))
	{
		return $row['accesstoken'];
	}
}


function check_data($openID)
{
	$servername = "localhost";
	$username = "root";
	$password = "356033";
	$dbname = "linglingpai";

	// echo($openID);
	$con = mysqli_connect($servername, $username, $password, $dbname);


	if (mysqli_connect_errno())
	{
		echo "连接失败: " . mysqli_connect_error();
	}

	$result = mysqli_query($con,"SELECT * FROM usersInfo
		WHERE openid='$openID'");

	 // var_dump($result);
	return($result->num_rows);
	// while($row = mysqli_fetch_array($result))
	//  {
	//  	echo $row['accesstoken'] . " " . $row['refreshtoken'];
	//  	echo "<br>";
	//  }
}

function update_data($openID,$accessToken)
{
	$servername = "localhost";
	$username = "root";
	$password = "356033";
	$dbname = "linglingpai";

	// echo($openID);
	$con = mysqli_connect($servername, $username, $password, $dbname);


	if (mysqli_connect_errno())
	{
		echo "连接失败: " . mysqli_connect_error();
	}

	// $result = mysqli_query($con,"SELECT * FROM usersInfo
	// 	WHERE openid='$openID'");
	mysqli_query($con,"UPDATE usersInfo SET accesstoken= '$accessToken'
		WHERE openid='$openID'");
	 // var_dump($result);
	// return($result->num_rows);
	// while($row = mysqli_fetch_array($result))
	//  {
	//  	echo $row['accesstoken'] . " " . $row['refreshtoken'];
	//  	echo "<br>";
	//  }
	mysqli_close($con);
}

function update_name($openID,$name)
{
	$servername = "localhost";
	$username = "root";
	$password = "356033";
	$dbname = "linglingpai";

	// echo($openID);
	$con = mysqli_connect($servername, $username, $password, $dbname);


	if (mysqli_connect_errno())
	{
		echo "连接失败: " . mysqli_connect_error();
	}

	// $result = mysqli_query($con,"SELECT * FROM usersInfo
	// 	WHERE openid='$openID'");
	mysqli_query($con,"UPDATE usersInfo SET username= '$name'
		WHERE openid='$openID'");

	mysqli_close($con);
}

function get_name($openID)
{
	$servername = "localhost";
	$username = "root";
	$password = "356033";
	$dbname = "linglingpai";
	$con = mysqli_connect($servername, $username, $password, $dbname);

	if (mysqli_connect_errno())
	{
		echo "连接失败: " . mysqli_connect_error();
	}
	$result = mysqli_query($con,"SELECT * FROM usersInfo
		WHERE openid='$openID'");

	while($row = mysqli_fetch_array($result))
	{
	 	return($row['username']);
	}
}


function save_data($authorizeResult) 
{
	$servername = "localhost";
	$username = "root";
	$password = "356033";
	$dbname = "linglingpai";
	// echo($authorizeResult);

	$data = json_decode($authorizeResult);
	// var_dump($data);

	$openID = $data->OpenID;
	$accessToken = $data->AccessToken;
	$refreshToken = $data->RefreshToken;
	$expiresin = $data->ExpiresIn;
	$count = check_data($openID);
	if ($count > 0)
	{
		update_data($openID,$accessToken);
		return;
	}
		
	var_dump($count);

	$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO usersInfo (openid, accesstoken, refreshtoken,expiresin)
	VALUES ('$openID', '$accessToken', '$refreshToken','$expiresin')";

	if ($conn->query($sql) === TRUE) 
	{
		// echo "新记录插入成功";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

}



?>