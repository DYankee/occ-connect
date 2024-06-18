<form id="forum-control" action="main.php" method="get">
    <label for="forum_id">Select a forum to view: </label>
    <select class="font-fix" name="forum_id" id="forum_id">
        <?php
            $result = mysqli_query($dbc, "SELECT forum_name, forum_id FROM forums ORDER BY forum_name ASC");
            while($row = mysqli_fetch_array($result)){
                echo $row
        ?>
                <option value=<?= $row['forum_id']?>><?=$row['forum_name'];?></option>
        <?php 
            }
            mysqli_free_result($result);
        ?>
    </select>
    <label for="view_amount">Thread count</label>
    <select name="view_amount" id="view_amount">
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="30">30</option>
        <option value="40">40</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </select>
    <input type="submit" value="View Forum">
</form>
