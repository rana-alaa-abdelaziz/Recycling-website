
<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
     $user = $result->fetch_assoc(); //fetch row as association array
    if($user){
        if(password_verify($_POST["password"],$user["password"]))
          session_start();           //used to store and pass information from one page to another temporarily
        session_regenerate_id();
            $_SESSION["user_id"]=$user["id"];
            header("location: homepage2.php");
        
    }
    $is_invalid=true;
}


?>
<!DOCTYPE html>
<meta charset="UTF-8"/>
<html lang="en">
<head>
    <title>

    </title>
<style>
.container{
    position: relative;

}
.box{
    position: absolute;
    
}
</style>
<!--  Java Script -->
<script>
    function validateForm()  {
    var pw1 = document.getElementById("pswd").value;
    var name=document.getElementById("name1").value;
    var mail1=document.getElementById("mail").value;
if(name ==""){
    document.getElementById("blankMsg").innerHTML="**Required field";
    return false;
}
if(mail1 == "") {  
document.getElementById("message2").innerHTML = "**Required field";  
    return false;  
}

if(pw1 == "") {  
document.getElementById("message1").innerHTML = "**Fill the password please!";  
    return false;  
} 
}
</script>
</head>
    <body style=background-color:#F4FBF3;>
    <?php if($is_invalid):
    ?>
    <em> Invalid login </m>
    <?php endif; ?>
            


        <div class="conainer">
    <div class="box"> <img src="background1.png" style="background-color: #F4FBF3;width: 190%;height: 30%;opacity: 15%;margin-bottom: 100px;">
    </div>
    <div class="box overlay">
    <a href="https://www.facebook.com/" target="_blank"><img src="facebook.jpg" style="width: 300px;height: 50px;margin-top: 220px;margin-left: 610px;">
        <a href="https://accounts.google.com/v3/signin/identifier?dsh=S839461292%3A1683301749813751&authuser=0&continue=https%3A%2F%2Fmyaccount.google.com%2F&ec=GAlAwAE&hl=en_GB&service=accountsettings&flowName=GlifWebSignIn&flowEntry=AddSession" target="_blank"><img src="google.jpg" style="width: 300px;height: 50px;margin-top: 5px;margin-left: 610px;">
    </a>
    <form onsubmit="return validateForm() " method="post"> 
        <input type="text" style="width: 295px;height: 30px;margin-top: 5px;margin-left: 608px; " placeholder="Name : " id="name1" value="" name="name">
        <span id = "blankMsg" style="color:red"> </span> 
        <input type="email" style="width: 295px;height: 30px;margin-top: 5px;margin-left: 608px; " placeholder="E-mail  " id="mail" value="" name="email">
        <span id = "message2" style="color:red"> </span> <br>
        <input type="password" style="width: 295px;height: 30px;margin-top: 5px;margin-left: 608px; " placeholder="Password : "  id = "pswd" value = "" name="password">
        <span id = "message1" style="color:red"> </span> <br>
    
    <p style="margin-top: 5px;margin-left: 608px ;">Don't have an account? </p>
    <a href="sign up.html" style="margin-top: 5px;margin-left: 608px ;">Create one </a>
    <br>
    <br>
    <input type = "submit" value = "continue" style="margin-top: 20px;border-radius: 30px;font-size: larger;margin-left: 655px;font-size: larger;width:200px;height: 50px;color: #0F6202;font-style: italic;background-color: #AAD3A6;font-weight: bolder; display: inline;" >
</form>
        </div>
        </div>
    

    </body>














</html>