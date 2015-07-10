<?php
$padding_size = 0;
if (isset($_GET["padding_size"]))
    $padding_size = $_GET["padding_size"];
    
if (isset($_GET["parent_id"])) {
    $parent_id = $_GET["parent_id"];
    $json_str = shell_exec("python get_posts.py --parent_id=$parent_id");
    
    $records = json_decode($json_str);
    
    foreach ($records as $record) {
        $post_id = $record[0];
        $title = $record[1];
        $content = $record[2];
        $create_date = $record[3];
        $parent_id = $record[4];
        $user_name = $record[5];
?>
<div style="padding-left: <?=$padding_size+20?>px">
    <?=$title?>
    <button onclick="btn1_click('content<?=$post_id?>')">Show content</button>
    <button onclick="btn2_click('<?=$post_id?>', 'reply<?=$post_id?>')">Show reply</button>
    <a href="add_post.php?parent_id=<?=$post_id?>">Reply</a>
</div>
<div id="content<?=$post_id?>" style="display: none; padding-left: <?=$padding_size+40?>px">
    <?=$content?>
</div>
<div id="reply<?=$post_id?>" style="display: none; padding-left: <?=$padding_size+30?>px">
</div>
<?php
    }
}
?>