<?php include_once("header.php"); ?>

<head>
    <title>Edit</title>
</head>
<?php
if(isset($_POST['update'])){
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $beverages = mysqli_real_escape_string($mysqli, $_POST['beverages']);
    $consumed = mysqli_real_escape_string($mysqli, $_POST['consumed']);

	// checking empty fields
    if(empty($name) || empty($email) || empty($beverages) || empty($consumed)) {

        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }

        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }

        if(empty($beverages)) {
            echo "<font color='red'>beverages field is empty.</font><br/>";
        }

        if(empty($consumed)) {
            echo "<font color='red'>consumed field is empty.</font><br/>";
        }

	} else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',email='$email',beverages='$beverages',consumed='$consumed' WHERE id=$id");

		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result)){
	$name = $res['name'];
	$email = $res['email'];
    $beverages = $res['beverages'];
    $consumed = $res['consumed'];
}
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <a href="index.php" class="btn btn-primary mt-2 mb-4">Home</a>
                <form action="edit.php" method="post" name="add_form">
                    <div class="form-group mb-2">
                        <label for="name">Name :</label>
                        <input type="text" name="name" value="<?= $name ?>" required class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Email Address :</label>
                        <input type="email" class="form-control" name="email" value="<?= $email ?>" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="beverage">Choose a Beverage :</label>
                        <select class="form-control" name="beverages" required>
                            <option value="Monster Ultra Sunrise" <?php echo ($beverages == 'Monster Ultra Sunrise') ? ' selected="selected"' : ""  ?>>Monster Ultra Sunrise</option>
                            <option value="Black Coffee" <?php echo ($beverages == 'Black Coffee') ? ' selected="selected"' : ""  ?>>Black Coffee</option>
                            <option value="Americano" <?php echo ($beverages == 'Americano') ? ' selected="selected"' : ""  ?>>Americano</option>
                            <option value="Sugar free NOS" <?php echo  ($beverages == 'Sugar free NOS') ? ' selected="selected"' : "" ?>>Sugar free NOS</option>
                            <option value="5 Hour Energy" <?php echo ($beverages == '5 Hour Energy') ? ' selected="selected"' : "" ?>>5 Hour Energy</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="consumed" style="width: 100%;">How much I Consumed :</label>
                        <input type="number" class="form-control" name="consumed" min="0" value="<?= $consumed; ?>" style="width: 92%; display: inline-block;" oninput="validity.valid||(value='');" required> mg
                    </div>
                    <div class="form-group hidden">
                        <input type="hidden" name="id" value=<?= $_GET['id'] ?>></td>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update" value="Update">Submit</button>
                </form>
            </div>
        </div>
    </div>