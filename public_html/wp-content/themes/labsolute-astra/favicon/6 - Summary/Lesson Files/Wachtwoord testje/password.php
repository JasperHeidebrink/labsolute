<?php

if (isset($_POST['password'])) {
    die('het nieuwe wachtwoord is '.$_POST['password']);
}

?><!DOCTYPE html>
<html>
<head>
    <title>Wachtwoord aanpassen</title>
</head>

<body>
<h1>Wachtwoord aanpassen</h1>

<form method="post">
    <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            aanpassen
        </button>
    </div>
</form>

</body>
</html>