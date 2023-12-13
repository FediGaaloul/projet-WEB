<?php
// Assuming the addUser function is in UserC.php
include('../../Controller/UserC.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $repeatPassword = $_POST['repeat_password'] ?? '';
    $roles = $_POST['roles'] ?? '';
    $dateins = $_POST['dateins'] ?? '';

    // Validate form data
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($repeatPassword) || empty($roles) || empty($dateins)) {
        $error = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } elseif ($password !== $repeatPassword) {
        $error = 'Passwords do not match.';
    } elseif (strlen($password) < 8) {
        $error = 'Password should be at least 8 characters long.';
    } elseif ($roles === 'default') {
        $error = 'Please select a valid role.';
    } else {
        // Call the addUser function from UserC.php
        $result = userC::addUser($firstname, $lastname, $email , $password, $roles,$dateins);

        // Check the result of the addUser function
        if ($result) {
            // Redirect to the login page on successful registration
            header('Location: login.php');
            exit();
        } else {
            // Display an error message if registration fails
            $error = 'Registration failed. Please try again.';
            // Check if the email already exists
            if (userC::isEmailExists($email)) {
                $error .= ' Email already exists.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .bg-register-image {
            background: url("https://img.freepik.com/vecteurs-premium/cours-ligne-illustration-vectorielle-personne-plate-apprendre-concept-virtuel-developpement-connaissances-modernes-aide-formation-internet-enseignement-webinaire-service-cours-distance-video-presentation-web_194360-129.jpg");
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post" action="register.php">
                                <!-- Display errors if any -->
                                <?php if (isset($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            name="firstname" placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            name="lastname" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        name="email" placeholder="Email Address" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" name="repeat_password" placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" id="exampleInputdate"
                                        name="dateins" placeholder="Date inscription" required>
                                </div>
                                <div class="form-group">
                                <select class="form-select" name="roles" aria-label="Default select example">
                                    <option selected>Select Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Etudiant">Etudiant</option>
                                    <option value="Enseignant">Enseignant</option>
                                    <option value="Client">Client</option>
                                </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                                <hr>
                            </form>
                           
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/656f8574bfb79148e59a6a34/1hgtq2l42';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>

</html>