<?php include_once("header.php"); ?>

<head>
    <title>Result</title>
</head>
<?php
//including the database connection file
include("config.php");

//getting email of the data from url
$email = $_GET['email'];
$today_date = date("Y-m-d");
$total_limit = 500;

//selecting data associated with this particular email
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE DATE_FORMAT(date_consumed, '%Y-%m-%d') = '$today_date' and email='$email'");
$row_cnt = $result->num_rows;
$get_res = mysqli_fetch_all($result);

?>

<body>
    <div class="container-fluid">
        <a class="btn btn-primary mt-2 mb-4" href="index.php">Home</a>
        <h3>Report (<?= $today_date; ?>)</h3>
        <table class="table table-bordered">
            <tr bgcolor='#CCCCCC'>
                <th>Details</td>
                <th>Beverages</th>
                <th>Result</th>
            </tr>
            <tr>
                <td class="col-md-2">
                    <b>Name :</b> <?= $get_res[0]['1'] ?> </br>
                    <b>Email :</b> <?= $get_res[0]['2'] ?>
                </td>
                <td class="col-md-4">
                    <?php
                        $total_consumed = 0;
                        for ($x = 0; $x < $row_cnt; $x++) {
                            $total_consumed += $get_res[$x]['4'];
                            echo "<b>".$x+1 ." :</b> ".$get_res[$x]['3']." <b>" .$get_res[$x]['4']."mg </b>".$get_res[$x]['5']."</br>";
                        }
                    ?>
                </td>
                <td class="col-md-6">
                    <b>Total Limit :</b> <?= $total_limit ?>mg </br>
                    <b>You Have Consumed :</b> <?= $total_consumed; ?>mg </br>
                    <?php if($total_consumed > $total_limit ) { ?>
                    <p class="text-danger"><b>Warning: You have exceeded the limit by <?= $total_consumed - $total_limit ; ?>mg</b></p>
                    <?php }else{ ?>
                        <b>Limit Remaining :</b> <?= $total_limit - $total_consumed; ?>mg
                    <?php } ?>
                </td>
            </tr>
        </table>
    </div>