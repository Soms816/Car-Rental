<?php
// Start the session
session_start();

// Function to connect to the database
function connectToDatabase()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "car_rental";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Function to save contact form data to the database
function saveToDatabase($name, $email, $contact_number, $password)
{
    // Connect to the database
    $conn = connectToDatabase();

    // Prepare SQL statement
    $sql = "INSERT INTO users (name, email, contact_number, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("ssss", $name, $email, $contact_number, $password);
    $result = $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    return $result;
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // php default library "password_hash(your password, enc type)"

    // Save data to the database
    $saveResult = saveToDatabase($name, $email, $contact_number, $password);

    // Set session messages based on the result
    if ($saveResult) {
        $_SESSION['success_message'] = "Thank you for registering!";
    } else {
        $_SESSION['error_message'] = "Error: Unable to register. Please try again later.";
    }

    // Redirect back to the register page to display the messages
    header("Location: login.php?success=" . urlencode($_SESSION['success_message']));
    exit();
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>SignUp</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-image:url('images/bg_2.jpg'); 
    width:100%;
    background-size: cover;
}
.background{
    width: 430px;
    /* height: 400px; */
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 150px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
form{
    /* height: 600px; */
    width: 500px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 0.3px;
    text-align: center;
}

label{
    display: block;
    /* margin-top: 30px; */
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 10px;
    width: 50%;
    margin-left: 60px;
    background-color: #ffffff;
    color: #080710;
    /* padding: 15px 0; */
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

    </style>
</head>
<body>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                // Display session messages
                if(isset($_SESSION['success_message'])) {
                    echo "<p>" . $_SESSION['success_message'] . "</p>";
                    unset($_SESSION['success_message']);
                }
                if(isset($_SESSION['error_message'])) {
                    echo "<p>" . $_SESSION['error_message'] . "</p>";
                    unset($_SESSION['error_message']);
                }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <h3>Sign Up</h3>

        <label for="name">Name</label>
        <input type="text" placeholder="name" id="name" name="name">

        <label for="username">Email</label>
        <input type="text" placeholder="Email" id="username" name="email">

        <label for="number">Contact Number</label>
        <input type="number" placeholder="Phone Number" id="contact_number" name="contact_number">

        <label for="password">Password</label>
        <input type="password" placeholder="password" id="password" name="password">

        <button type="submit">Sign Up</button>
        <div class="social">
          
        </div>
    </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
