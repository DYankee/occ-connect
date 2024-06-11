<?php 

$url2 = "php/new-comment.php?thread_id=" . $_GET['thread_id'];
?>
<form action=<?=$url2?> method="post">
<div class="flex">
        <label for="body">New Comment</label>
        <textarea name="body" id="body" cols="100" rows="6"></textarea>
        <div>
                <input type="submit" value="Post">
                <input type="reset" value="Reset">
        </div>
</div>
</form>