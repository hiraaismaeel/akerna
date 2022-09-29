<?php include_once("header.php"); ?>
<?php $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY name ASC"); ?>

<head>
    <title>Home</title>
</head>

<body>
    <div class="container-fluid">
        <a href="add.php" class="btn btn-primary mt-2">Add New Data</a>
        <table class="table table-striped mt-4">
            <tr bgcolor='#CCCCCC'>
                <th>Name</th>
                <th>Email</th>
                <th>Beverages</th>
                <th>Consumed</th>
                <th>Date</th>
                <th>Update</th>
            </tr>
            <?php
            while($res = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$res['name']."</td>";
                echo "<td>".$res['email']."</td>";
                echo "<td>".$res['beverages']."</td>";
                echo "<td>".$res['consumed']."mg </td>";
                echo "<td>".$res['date_consumed']."</td>";
                echo "<td><a href=\"result.php?email=$res[email]\">View Result</a> | <a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>