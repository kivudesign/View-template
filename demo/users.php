<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>users</title>
</head>
<body>
    <h3>List users</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        foreach ($users as $user){
            ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$user["name"]?></td>
            </tr>
        <?php $i++; } ?>
        </tbody>
    </table>
</body>
</html>
