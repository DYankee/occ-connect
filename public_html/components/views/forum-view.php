<?php
    if(isset($_GET['forum_id'])){
        $forumid = $_GET['forum_id'];
        $resCount = $_GET['view_amount'];
    }
    //elseif(isset($_COOKIE['default_form'])){
    //    $forumName = $_cookie['default_form'];
    //}
    elseif(isset($_COOKIE['default_forum'])){
        $forumid = $_COOKIE['default_forum'];
        $resCount = $_COOKIE['default_view_amt'];
    }
    else{
        $forumid = 4;
        $resCount = 10;
    }


    $result = mysqli_query($dbc, "SELECT u.user_name, u.profile_pic, t.thread_id, t.thread_name, t.post_date  
    FROM threads t
    JOIN users u
    ON (t.user_id = u.user_id)
    WHERE t.forum_id = $forumid
    ORDER BY t.post_date desc
    LIMIT 0,$resCount");
    ?>



<table>
    <?php
    while($row = mysqli_fetch_array($result)){
        $threadUrl = "view-thread.php?thread_id=" . $row['thread_id']
        ?>

            <tr>
                <td class="user-info">
                    <div class="flex center">
                        <?= $row['user_name'] ?> <br>
                        <img id="profile_pic" src="<?= $row['profile_pic']?>" alt="test"> <br>
                        <?= $row['post_date'] ?>
                    </div>
                </td>
                <td>
                    <a href="<?=$threadUrl?>">
                        <h3 class="title">
                            <?= $row['thread_name'] ?>
                        </h3>
                    </a>
                </td>
            </tr>

    <?php } ;?>
</table>