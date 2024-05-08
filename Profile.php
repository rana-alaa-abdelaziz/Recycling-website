




<?php



$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO profile (fname,lname, email,phone_number )
        VALUES (?, ?, ?,?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
                $_POST["fname"],
                $_POST["lname"],
                $_POST["email"],
                $_POST["phone_number"]);
                

?>


  












<html>
    <head>
<title>

</title>
<link rel="stylesheet" href="css/froala_editor.min.css">
    <link rel="stylesheet" href="css/plugins/image.min.css">
    <link rel="stylesheet" href="css/plugins/image_manager.min.css">
<style>
    .t1{
        
    }
    #i1{
width: 190px;
height: 190px;
margin-left: 376px;
margin-top: 100px;
background-color:#F4FBF3 ;

    }
    #b1{
background-color: #AAD3A6 ;
border-radius: 30px;
width: 150px;
height: 60px;
font-size: larger;
margin-left: 30px;
margin-top: 280px;
color: #0F6202;
    }
   .r1{
   
    padding-left: 400px;
    font-size: larger;
   }
</style>
</head>

<body style="background-color: #F4FBF3;">
<div class="back">
      <a href="homepage2.php" style="text-decoration: none;font-size: 28px;color:#0f6202;"> << Home </a>
      </div>
<scipt>
<table id="t1" >
<tr>
<td>

</td>
<td>
<img src="profi-removebg-preview.png" id="i1">
</td>
<td>
<a href="edit-profile.html" target="_blank"><input type="button" id="b1" value="Edit profile" ></a>
</td>
</tr>
<tr>
    <td>

    </td>
    <td style=" padding-left: 400px;" class="r1">
        <br>
        First Name : 
        <?php
  print($_POST['fname']);
       
        ?>
    </td>
</tr>
<td>

</td>
<tr>
    <td>

    </td>
    <td class="r1">
        <br>
        Last Name : 
        <?php
        print($_POST['lname'])
        ?>
    </td>
    <rd>

    </rd>
</tr>
<tr>
    <td>

    </td>
    <td class="r1">
        <br>
        Phone Number : 
        <?php
        print($_POST['phone_number'])
        ?>
        
    </td>
    <rd>

    </rd>
</tr>
<tr>
    <td>

    </td>
    <td class="r1">
        <br>
        E-mail : 
        <?php
        print($_POST['email'])
        ?>
    </td>
    <td>
    
    </td>
</tr>

<tr>
    <td>

    </td>
    <td >
       
         
    </td>
    <td>
        <br>
    </td>
</tr>
<!-- 3 col 6 rows-->

</table>

</body>

</html>