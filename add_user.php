<?php
$msg = "";
if (isset($_GET["user_id"]) && isset($_GET["email"])) {
    $user_id = $_GET["user_id"];
    $user_name = $_GET["user_name"];
    $user_password = $_GET["user_password"];
    $email = $_GET["email"];
    
    $exec_str = "python add_user.py --user_id=$user_id --user_name=$user_name --user_password=$user_password --email=$email";
    $ret_str = shell_exec($exec_str);
    
    if (trim($ret_str) == "Yes")
        $msg = "Add an user successfully";
    else
        $msg = "Something wrong";
    
}
?>
<html>
<br><br>
<h2><?=$msg?></h2><br><br>
<form method="GET">
    <table align="center">
        <tr>
            <td>User id</td>
            <td>:</td>
            <td><input type="text" name="user_id"></td>
        </tr>        
        <tr>
            <td>User name</td>
            <td>:</td>
            <td><input type="text" name="user_name"></td>
        </tr>        
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="text" name="user_password"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>        
            <td><input type="text" name="email"></td>
        </tr>
        
        <tr>
            <td colspan="3"><input type="submit" value="OK"></td>
        </tr>
    </table>
</form>
</html>