<pre>
<?php

echo '<hr>GET';
var_dump($_GET);
echo '<hr>POST';
var_dump($_POST);


echo '<hr>';
$password = $_POST['password'];


echo 'validate using preg_match() function';
// validate FName
if (preg_match("/^[a-z]{2,15}$/i", $_POST['first_name'])) {
    echo "<h2>First Name Valid</h2>";
} else {
    echo "<h2>First Name Invalid</h2>";
}

// validate LName
if (preg_match("/^[a-z]{2,15}$/i", $_POST['last_name'])) {
    echo "<h2>Last Name Valid</h2>";
} else {
    echo "<h2>Last Name Invalid</h2>";
}

// validate Email
if (preg_match("/^[a-z\d._-]+@[a-z]+\.[a-z]{2,}$/i", $_POST['email'])) {
    echo "<h2>Email Valid</h2>";
} else {
    echo "<h2>Email Invalid</h2>";
}

// validate mobile
if (preg_match("/^01[0125][\d]{8}$/", $_POST['mobile'])) {
    echo "<h2>Mobile Valid</h2>";
} else {
    echo "<h2>Mobile Invalid</h2>";
}

// validate username
if (preg_match("/^[a-z][a-z\d_.-]{2,14}$/i", $_POST['username'])) {
    echo "<h2>Username Valid</h2>";
} else {
    echo "<h2>Username Invalid</h2>";
}

// validate Password
if (preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}/", $password)) {
    echo "<h2>Password Valid</h2>";
} else {
    echo "<h2>Password Invalid</h2>";
}

// validate password confirmation
if ($password === $_POST['password_confirmation']) {
    echo "<h2>Password Confirmation Valid</h2>";
} else {
    echo "<h2>Password Confirmation Invalid</h2>";
}



echo '<br /><br /><br /><hr />';





echo 'validate using filter_var() function';
// validate using filter_var() function
// FName filter
if (filter_var($_POST['first_name'], FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^[a-z]{2,15}$/i']])) {
    echo "<h2>First Name Valid</h2>";
} else {
    echo "<h2>First Name Invalid</h2>";
}

// LName filter
if (filter_var($_POST['last_name'], FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^[a-z]{2,15}$/i']])) {
    echo "<h2>Last Name Valid</h2>";
} else {
    echo "<h2>Last Name Invalid</h2>";
}

// email filter
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "<h2>Email Valid</h2>";
} else {
    echo "<h2>Email Invalid</h2>";
}

// mobile filter
if (filter_var( $_POST['mobile'], FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^01[0125][\d]{8}$/']])) {
    echo "<h2>Mobile Valid</h2>";
} else {
    echo "<h2>Mobile Invalid</h2>";
}

// username filter
if (filter_var($_POST['username'], FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^[a-z][a-z\d_.-]{2,14}$/i']])) {
    echo "<h2>Username Valid</h2>";
} else {
    echo "<h2>Username Invalid</h2>";
}

// password filter
if (filter_var($password, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}/']])) {
    echo "<h2>Password Valid</h2>";
} else {
    echo "<h2>Password Invalid</h2>";
}

// password confirmation filter
if ($password === $_POST['password_confirmation']) {
    echo "<h2>Password Confirmation Valid</h2>";
} else {
    echo "<h2>Password Confirmation Invalid</h2>";
}

