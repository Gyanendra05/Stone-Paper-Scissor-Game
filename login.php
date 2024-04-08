<?php
if(isset($_POST['cancel'])){
    header('Location: index.php');
    return;

}
$salt='XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  
// Pw is php123
$failure= false;
if ( isset($_POST['who']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
        $failure = "User name and password are required";
    } else {
        $check = hash('md5', $salt.$_POST['pass']);
        if ( $check == $stored_hash ) {
            // Redirect the browser to game.php
            header("Location: game.php?name=".urlencode($_POST['who']));
            return;
        } else {
            $failure = "Incorrect password";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Gyanendra's Rock Paper Scissors Game</title>
</head>
<body>
<div class="contain">
<h1>Please Log In</h1>
<?php
if ( $failure !== false ) {
    echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
}
?>
<form method="POST">
<label for="nam">User Name</label>
<input type="text" name="who" id="nam"><br/>
<label for="id_0508">Password</label>
<input type="text" name="pass" id="id_0508"><br/>
<input type="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">
<!-- <input type="submit" value="Play"> -->
</form>
<p>
For a password hint, view source and find a password hint
in the HTML comments.
<!-- Hint: The password is php123 -->
</p>
</div>
</body>
