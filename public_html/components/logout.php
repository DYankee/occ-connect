<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Clear $_SESSION superglobal array and all session variables
        $_SESSION = [];

        //Destroy the session itself
        session_destroy();

        //Destroy the session cookie on the client
        setcookie('PHPSESSID', '', time() - 3600, '/', '', 0, 0);
        header("Location: ../main.php");
        exit();
    }
?>

<form action="components/logout.php" method="post">
    <button type="submit">Logout</button>
</form>