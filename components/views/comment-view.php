<?php

    if(isset($_GET['thread_id'])){
        $thread_id = $_GET['thread_id'];
        $resCount = 20;
    }
    //elseif(isset($_COOKIE['default_form'])){
    //    $forumName = $_cookie['default_form'];
    //}
    else{
        echo "error selecting thread";
    }


    $result = mysqli_query($dbc, "SELECT u.user_name, u.profile_pic, c.body, c.post_date  
    FROM comments c
    JOIN users u
    ON (c.user_id = u.user_id)
    WHERE c.thread_id = $thread_id
    ORDER BY c.post_date desc
    LIMIT 0,100");
        ?>
        <table>
        <?php
    while($row = mysqli_fetch_array($result)){
        ?>
            <tr>
                <td class="user-info">
                    <div class="flex center">
                        <?= $row['user_name'] ?> <br>
                        <img id="profile_pic" src=<?= $row['profile_pic']?> alt="test"> <br>
                        <?= $row['post_date'] ?>
                    </div>
                </td>
                <td>
                    <p>
                        <?= $row['body'] ?>
                    </p>
                </td>
            </tr>
        <?php } ;?>
        </table>