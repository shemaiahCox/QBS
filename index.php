<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Details Form</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

    <!----------------------------------------------------
        Handle form data 
    ------------------------------------------------------->

    <?php
    // Basic include to reduce file size
    include 'database.php';

    // Define variables to store errors messages and form data for easier manipulation 
    $titleErr = $firstNameErr = $surnameErr = $ageErr = "";
    $title = $firstName = $surname = $age = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Title field
        // Set error message if form value is empty or store value in variable
        if (empty($_POST["title"])) {
            $titleErr = "Title is required";
        } else {
            $title = test_input($_POST["title"]);
        }
        // Firstname field
        // Set error message if form value is empty or check if field is valid
        if (empty($_POST["firstName"])) {
            $firstNameErr = "First name is required";
        } else {
            $firstName = test_input($_POST["firstName"]);
            // check if e-mail address is well-formed
            if (!preg_match("/^[a-z0-9]*$/i", $firstName)) {
                $firstNameErr = "Only letters and numbers allowed";
                }
        }

        // Surname field
        // Set error message if form value is empty or check if field is valid
        if (empty($_POST["surname"])) {
            $surnameErr = "Surname is required";
        } else {
            $surname = test_input($_POST["surname"]);
            // check if e-mail address is well-formed
            if (!preg_match("/^[a-z0-9]*$/i", $surname)) {
                $surnameErr = "Only letters and numbers allowed";
            }
        }

        // Age field
        // Set error message if form value is empty or check if field is valid
        if (empty($_POST["age"])) {
            $ageErr = "Age is required";
        } else {
            $age = test_input($_POST["age"]);
            // check if e-mail address is well-formed
            if (!preg_match("/^[1-9]{2}$/", $age) || preg_match("/^-[1-9]{2}$/", $age)) {
                $ageErr = "Age must be a postive number";
                }
        }
    }

    // Sanitizers the form data before inserting in database
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /*****************************************************
        Update Database
    ******************************************************/

// If form is not compltely filled in then the data will not tbe sent to the database
if ($title != '' && $firstName != '' && $surname != '' && $age != '' ) {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "myDB";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        // if ($conn->connect_error) {
        // die("Connection failed: " . $conn->connect_error);
        // }
        
        // Prepare query to prevent sql injection
        $sql = "INSERT INTO QBS (title, firstname, surname, age)
        VALUES (?, ?, ?, ?)";
        $conn->execute_query($sql, [$title, $firstName, $surname, $age]);

        // if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
        // } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        // }

        // Close connection to reduce overhead
        $conn->close();
    }
    ?>

    <!------------------------------------------------
        Form 
    --------------------------------------------------->

    <form action="index.php" method="post" id="details-form">
        <p><span class="error">* required field</span></p>
        <!-- Title -->
        <section class="form-section-title-wrapper">
            <label for="title">Title:</label>
            <select name="title" id="title" form="details-form">
                <option value="">Please Select</option>
                <!-- Form values are set dynamically to prepopulate the fields if there are errors -->
                <option <?php if (isset($title) && $title == "mr") echo "selected='selected'";?> value="mr">Mr</option>
                <option <?php if (isset($title) && $title == "mrs") echo "selected='selected'";?> value="mrs">Mrs</option>
                <option <?php if (isset($title) && $title == "miss") echo "selected='selected'";?> value="miss">Miss</option>
                <option <?php if (isset($title) && $title == "ms") echo "selected='selected'";?> value="ms">Ms</option>
              </select>
              <span class="error">* <?php echo $titleErr;?></span><br><br>
        </section>
        <!-- First Name section -->
        <section class="form-section-wrapper">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" placeholder="Enter Your First Name" title="Please enter your first name" value="<?php echo $firstName;?>">
            <span class="error">* <?php echo $firstNameErr;?></span><br><br>
        </section>
        <!-- Surname section -->
        <section class="form-section-wrapper">
            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" placeholder="Enter Your Surname" value="<?php echo $surname;?>">
            <span class="error">* <?php echo $surnameErr;?></span><br><br>
        </section>
        <!-- Age -->
        <section class="form-section-wrapper">
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" placeholder="Enter your age" value="<?php echo $age;?>">
            <span class="error">* <?php echo $ageErr;?></span><br><br>
        </section>
        <!-- Submit Button -->
        <section class="submit">
            <button type="submit">Submit</button>
        </section>
    </form>
    <!-- This is the javascript validation version check it out -->
    <!-- <script src="main.js"></script> -->
</body>
</html>