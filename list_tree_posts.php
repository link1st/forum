<style>
div {
	font-size:30px;
}

button {
	font-size:18px;
}
</style>
<script src="jquery.min.js"></script>
<script>
    function btn1_click(content_id) {
        var content = document.getElementById(content_id);
        content.style.display = "block";
    }
    
    function btn2_click(post_id, reply_id) {
        var reply = document.getElementById(reply_id);
        reply.style.display = "block";
        
        var urlstr="get_posts.php?parent_id=" + post_id + "&padding_size=0";
		$.ajax({ url: urlstr, success: 
			function(odata){
				$('#'+reply_id).html(odata);
			}
		});
    }
</script>
<?php 
$json_str = shell_exec("python get_posts.py --parent_id=0");

$records = json_decode($json_str);

foreach ($records as $record) {
    $post_id = $record[0];
    $title = $record[1];
    $content = $record[2];
    $create_date = $record[3];
    $parent_id = $record[4];
    $user_name = $record[5];
?>
<div>
    <?=$title?>
    <button onclick="btn1_click('content<?=$post_id?>')">Show content</button>
    <button onclick="btn2_click('<?=$post_id?>', 'reply<?=$post_id?>')">Show reply</button>
    <a href="add_post.php?parent_id=<?=$post_id?>">Reply</a>
</div>
<div id="content<?=$post_id?>" style="padding-left: 20px; display: none">
    <?=$content?>
</div>
<div id="reply<?=$post_id?>" style="display: none">
</div>
<?php 
}
?>