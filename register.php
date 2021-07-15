<?php
include_once 'include/header.php';
include_once 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email  = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $date = date('Y-m-d');
    $confirm_password = $_POST['cpassword'];
    if (empty($fname) || empty($lname) || empty($email) || empty($dob) || empty($address) || empty($password) || empty($confirm_password) || empty($phone)) {
        $error = 'Please input all required inputs';
    } elseif ($password != $confirm_password) {
        $error = 'Password does not match !!!';
    }
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $q = "select * from user where email='$email'";
    $result = mysqli_query($conn, $q);
    $rows = mysqli_num_rows($result);
    if ($rows > 0) {
        $error = 'Email already registered !!!';
    } else {
        $sql = "INSERT INTO user (firstname, lastname, email, password, address, image, type, createdate)VALUES ('$fname', '$lname', '$email', '$password', '$address', ' ', 1, '$date')";
        $ack = mysqli_query($conn, $sql);
        if ($ack) {
            $success = 'User added successfully!!!';
        } else {
            $error =  "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                    <a href="" class="float-right btn btn-outline-primary mt-1">Log in</a>
                    <h4 class="card-title mt-2">Sign up</h4>
                </header>
                <article class="card-body">
                <?php 
                        if(!empty($error))
                        {
                            echo $error;
                            $error= '';
                        }
                        if(!empty($success))
                        {
                            echo $success;
                            $success = '';
                        }
                    ?>
                    <form action="register.php" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col form-group">
                                <label>First name * </label>
                                <input type="text" name="fname" pattern="[A-Za-z]+" required class="form-control" placeholder="">
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Last name *</label>
                                <input type="text" name="lname" pattern="[A-Za-z]+" required class="form-control" placeholder=" ">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-group">
                            <label>Email address *</label>
                            <input type="email" required name="email" class="form-control" placeholder="">
                            <!-- <small class="form-text text-muted"></small> -->
                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" min="1919-01-01" max="2009-01-01" required class="form-control" placeholder="yyyy/mm/dd">

                        </div>
                        <div class="form-group">
                            <label>Gender*</label><br>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="male">
                                <span class="form-check-label"> Male </span>
                            </label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="female">
                                <span class="form-check-label"> Female</span>
                            </label>
                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <div class="form-group ">
                                <label>Address *</label>
                                <input type="text" required placeholder="Full address" name="address" pattern="[A-Za-z]+" required class="form-control">
                            </div> <!-- form-group end.// -->
                            <!-- <div class="form-group col-md-6">
                                <label>Country</label>
                                <select id="inputState" class="form-control">
                                    <option> Choose...</option>
                                    <option>Uzbekistan</option>
                                    <option>Russia</option>
                                    <option selected="">United States</option>
                                    <option>India</option>
                                    <option>Afganistan</option>
                                </select>
                            </div> form-group end.// -->
                        </div> <!-- form-row.// -->
                        <div class="form-group">
                            <label>Phone No *</label>
                            <input type="text" name="phone" pattern="[1-9]{1}[0-9]{9}" required min="1919-01-01" max="2009-01-01" required class="form-control" placeholder="+97798xxxxxxxx">
                        </div>
                        <div class="form-group">
                            <label>Create password *</label>
                            <input class="form-control" name="password" = required type="password">
                        </div>
                        <div class="form-group">
                            <label>Confirm password *</label>
                            <input class="form-control" name="cpassword" pattern="(?=.*\d).{8,}" required type="password">
                        </div>
                        <!-- form-group end.// -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Register </button>
                        </div> <!-- form-group// -->
                        <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
                    </form>
                </article> <!-- card-body end .// -->
                <div class="border-top card-body text-center">Have an account? <a href="login.php">Log In</a></div>
            </div> <!-- card.// -->
        </div> <!-- col.//-->

    </div> <!-- row.//-->


</div>
<br>
<!--container end.//-->
<?php
 include 'include/footer.php'

?>