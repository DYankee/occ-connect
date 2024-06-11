<?php

    if(isset($_GET['thread_id'])){
        $thread_id = $_GET['thread_id'];
    }
    //elseif(isset($_COOKIE['default_form'])){
    //    $forumName = $_cookie['default_form'];
    //}
    else{
        $forumid = 2;
        $resCount = 10;
    }


    $result = mysqli_query($dbc, "SELECT u.user_name, u.profile_pic, t.thread_id, t.thread_name, t.post_date, t.body  
    FROM threads t
    JOIN users u
    ON (t.user_id = u.user_id)
    WHERE t.thread_id = $thread_id
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
                    <div class="content flex center">
                        <h3 class="title">
                            <?= $row['thread_name'] ?>
                        </h3>
                        <p class="body">
                            <?= $row['body'] ?>
                        </p>
                    </div>
                </td>
            </tr>
            <?php } ;?>
        </table>
    