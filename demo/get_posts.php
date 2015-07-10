<?php 
if (isset($_GET["parent_id"]) && isset($_GET["padding_size"])) {
    $parent_id = $_GET["parent_id"];
    $padding_size = $_GET["padding_size"];
    
    $exec_str = "python get_posts.py --parent_id=$parent_id";
    
    $json_str = shell_exec($exec_str);
    
    $records = json_decode($json_str);

    foreach ($records as $record) {
        $post_id = $record[0];
?>

    <div><?=$record[1]?> 
        <button id="btn<?=$post_id?>" content_id="content<?=$post_id?>" onclick="btn1_click()">Show Content</button>
        <button id="btn<?=$post_id?>" reply_id="reply<?=$post_id?>" onclick="btn2_click()" parent_id="<?=$record[0]?>" padding_size="<?=$padding_size?>">Show reply</button>
        <a href="add_post.php?parent_id=<?=$post_id?>"> Reply </a>
    </div>
    <div id="content<?=$post_id?>" style="padding-left: <?=$padding_size+60?>px; display:none">
        <?=$record[2]?>
    </div>
    <div id="reply<?=$post_id?>" style="padding-left: <?=$padding_size+10?>px;display:none">
        
    </div>
<?php 
    }
}
?>
    