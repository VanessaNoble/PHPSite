<?php

$servername = "localhost";
$username = "root";
$password = "1user2!";
$db_name = "devteam";

try {
    $db = new PDO("mysql:host=$servername;dbname=" . $db_name, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failedÅ: " . $e->getMessage();
}

$sql = "SELECT * FROM users";
$stmt = $db->prepare($sql);
$stmt->execute();

$resultset = $stmt->fetchAll();

/*
foreach ($resultset as $getRow) {

    echo $getRow['first_name'] . " " . $getRow['last_name'];
    echo "<br>";
}
*/







?>
<html>
<head></head>
<body>
    <h1 align="center">Users</h1>
    <br>
    <table align="center" cellpadding="2" cellspacing="1" bgcolor="#666666" width="500">
        <tr style="color:#FFF;">
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
        <?php foreach ($resultset as $getRow) { ?>
        <tr bgcolor="#ffffff">
            <td align="center">
                <?php echo $getRow['first_name']; ?>
            </td>
            <td align="center">
                <?php echo $getRow['last_name']; ?>
            </td>

        </tr>
        <?php } ?>
    </table>
</body>
</html>