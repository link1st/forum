<?php
$msg = "";
if (isset($_COOKIE["user_id"]) && isset($_COOKIE["user_name"])) {
    $msg = $_COOKIE["user_name"]." already login successfully";
} else {
    if (isset($_GET["email"]) && isset($_GET["user_password"])) {
        $email = $_GET["email"];
        $user_password = $_GET["user_password"];
        
        $exec_str = "python check_user2.py --email=$email --user_password=\"$user_password\"";
        
        // echo $exec_str;
        $json_str = shell_exec($exec_str);
        $records = json_decode($json_str);
        
        if (isset($records[0])) {
            if ($records[0] == 0) { 
                $msg = $records[2]." login successfully";
                setcookie("user_id",$records[1],time()+3600*24);
                setcookie("user_name",$records[2],time()+3600*24);
            }
            else
                $msg = "Something wrong";
        } else {
            $msg = "Something wrong";
        }
    }
}
?>
<html>
<br><br>
<h2><?=$msg?></h2><br><br>
<form method="GET">
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