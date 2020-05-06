<?php
    session_start();
    include("evoting-functions.php");
    belumLogin();
    logout();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/source/normalize.css">
    <link rel="stylesheet" href="./styles/source/clearfix.css">
    <link rel="stylesheet" href="./styles/register.css">
    <title>E-Voting - Dashbord</title>
</head>

<body>
    <h1>WELCOME NIGGA!</h1>
    <form action="" method="post">
       <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>