<?php 
if (!isset($_COOKIE["user_id"]) || !isset($_COOKIE["user_name"])) {
?>
Please <a href="login.php">login</a>
<?php 
} else {
?>
<html>
<style>
button {
font-size:20px;
}

div {
font-size: 28px;
margin:20px;
}
</style>
<script src="jquery.min.js"></script>
<script>
    function btn1_click() {
        var b = event.target;
        var content_id = b.getAttribute("content_id");
        var content = document.getElementById(content_id);
        content.style.display = "block";
        
    }
    
    function btn2_click() {
        var b = event.target;
        var reply_id = b.getAttribute("reply_id");
		var parent_id = b.getAttribute("parent_id");
		var padding_size = b.getAttribute("padding_size");
        var reply = document.getElementById(reply_id);
        
        var urlstr="get_posts.php?parent_id=" + parent_id + "&padding_size=" + padding_size;
		$.ajax({ url: urlstr, success: 
			function(odata){
				$('#'+reply_id).html(odata);
			}
		});
		reply.style.display = "block";
        
    }
</script>

<?php
    $padding_size = 0;
    
    $exec_str = "python get_posts.py --parent_id=0";
    
    $json_str = shell_exec($exec_str);
    
    $records = json_decode($json_str);

    foreach ($records as $record) {
        $post_id = $record[0];
?>

    <div><?=$record[1]?> 
        <button id="btn<?=$post_id?>" content_id="content<?=$post_id?>" onclick="btn1_click()">Show content</button>
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
</html>
    