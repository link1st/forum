<?php
$msg = "";
if (isset($_GET["email"]) && isset($_GET["user_password"])) {
    $user_password = $_GET["user_password"];
    $email = $_GET["email"];
    
    $exec_str = "python check_user.py --email=$email --user_password=$user_password";
    $ret_str = shell_exec($exec_str);
    
    if ($ret_str == "Yes")
        $msg = "Add an user successfully";
    else
        $msg = "Something wrong";
    
}
?>
<html>
<h2><?=$msg?></h2>
<br><br>
<form>
    <table align="center">
        <tr>
            <td>Email</td>
            <td>:</td>        
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="password" name="user_password"></td>
        </tr>
        <tr>
            <td colspan="3"><input type="submit" value="OK"></td>
        </tr>
    </table>
</form>
</html>