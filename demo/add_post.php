<?php
$msg = "";
$parent_id = 0;
$user_name = "";
if (!isset($_COOKIE["user_id"]) || !isset($_COOKIE["user_name"])) {
?>
Please <a href="login.php">login</a>
<?php 
} else {
    $user_name = $_COOKIE["user_name"];
    if (isset($_GET["parent_id"])) {
        $parent_id = $_GET["parent_id"];    
    }
    if (isset($_GET["title"]) && isset($_GET["content"]) && isset($_COOKIE["user_name"])) {
        $title = $_GET["title"];
        $content = $_GET["content"];
        $create_date = $_GET["create_date"];
        
        $exec_str = "python add_post.py --parent_id=$parent_id --title=\"$title\" --content=\"$content\" --create_date=\"$create_date\"";
        $exec_str .= " --user_name=\"$user_name\"";
        // echo $exec_str;
        $json_str = shell_exec($exec_str);
        $records = json_decode($json_str);
        
        if (isset($records[0])) {
            if ($records[0] == 0)    
                $msg = "Add a post successfully";
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
        <td>Parent ID</td>
        <td>:</td>
        <td><input type="text" name="parent_id" value="<?=$parent_id?>"></td>
    </tr>
    <tr>
        <td>Title</td>
        <td>:</td>
        <td><input type="text" name="title"></td>
    </tr>
    <tr>
        <td>Content</td>
        <td>:</td>
        <td><input type="text" name="content"></td>
    </tr>
    
    <tr>
        <td>Create date</td>
        <td>:</td>
        <td><input type="text" name="create_date"></td>
    </tr>
    <tr>
        <td>User name</td>
        <td>:</td>
        <td><input type="text" name="user_name" value="<?=$user_name?>"></td>
    </tr>
    <tr>
        <td colspan="3"><input type="submit" value="OK"></td>
    </tr>
</table>
</form>
<br>
<a href="list_posts.php">Posts</a>
<?php
}
?>