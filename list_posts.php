<table border="1">
    <tr>
        <td>Post ID</td>
        <td>Title</td>
        <td>Content</td>
        <td>Create date</td>
    </tr>
<?php
$execStr = "python list_posts.py";
	
$json_str = shell_exec($execStr);

$records = json_decode($json_str);

foreach ($records as $post_info) {
?>
<tr>
    <td><?=$post_info[0]?></td>
    <td><?=$post_info[1]?></td>
    <td><?=$post_info[2]?></td>
    <td><?=$post_info[3]?></td>
</tr>
<?php 
}
?>
</table>