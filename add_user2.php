<?php
$msg = "";
if (isset($_GET["user_name"])) {
    $user_name = $_GET["user_name"];
    $user_password = $_GET["user_password"];
    $email = $_GET["email"];
    
    $exec_str = "python add_user.py --user_name=\"$user_name\" --user_password=\"$user_password\" --email=\"$email\"";
    
    // echo $exec_str;
    $json_str = shell_exec($exec_str);
    $records = json_decode($json_str);
    
    if (isset($records[0])) {
        if ($records[0] == 0)    
            $msg = "Add an user successfully";
        else
            $msg = "Something wrong";
    } else {
        $msg = "Something wrong";
    }
       
    
}
?>
<h2><?=$msg?></h2>
<br>
<br>
<form>
<table>
    <tr>
        <td>User name</td>
        <td>:</td>
        <td><input type="text" name="user_name"></td>
    </tr>
    <tr>
        <td>User password</td>
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