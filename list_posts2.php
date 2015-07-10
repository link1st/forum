<?php
if (isset($_COOKIE["user_id"]) && isset($_COOKIE["user_name"])) {
?>
<table border=1>
    <tr>
        <td>Post ID</td>
        <td>Title</td>
        <td>Content</td>
        <td>Create date</td>
        <td>Parent ID</td>
        <td>User name</td>
    </tr>
<?php 
$json_str = shell_exec("python list_posts2.py");

$records = json_decode($json_str);

foreach ($records as $record) {
?>
    <tr>
        <td><?=$record[0]?></td>
        <td><?=$record[1]?></td>
        <td><?=$record[2]?></td>
        <td><?=$record[3]?></td>
        <td><?=$record[4]?></td>
        <td><?=$record[5]?></td>
    </tr>
<?php 
}
?>
</table>
<?php 
} else {
    echo "Please login";
}
?>