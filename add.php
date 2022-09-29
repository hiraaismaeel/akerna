<?php include_once("header.php"); ?>

<head>
    <title>Add</title>
</head>

<?php
if(isset($_POST['Submit'])) {
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

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO users(name,email,beverages,consumed) VALUES('$name','$email','$beverages','$consumed')");

        //display success message
        echo "<font color='green'>Data added successfully.";
    }
}
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <a href="index.php" class="btn btn-primary mt-2 mb-4">Home</a>
                <form action="add.php" method="post" name="add_form" class="form-inline">
                    <div class="form-group mb-2">
                        <label for="name">Name :</label>
                        <input type="text" name="name" required class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Email Address :</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="beverage">Choose a Beverage :</label>
                        <select class="form-control" name="beverages" required>
                            <option value="Monster Ultra Sunrise">Monster Ultra Sunrise</option>
                            <option value="Black Coffee">Black Coffee</option>
                            <option value="Americano">Americano</option>
                            <option value="Sugar free NOS">Sugar free NOS</option>
                            <option value="5 Hour Energy">5 Hour Energy</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="consumed" style="width: 100%;">How much I Consumed :</label>
                        <input type="number" class="form-control" name="consumed" min="0" style="width: 92%; display: inline-block;" oninput="validity.valid||(value='');" required> mg
                    </div>
                    <button type="submit" class="btn btn-primary" name="Submit" value="Add">Submit</button>
                </form>
            </div>
        </div>
    </div>