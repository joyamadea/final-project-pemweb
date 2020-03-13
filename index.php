<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    </br>
    <centre><h2>Login</h2></centre>
    <div class="login">
    </br>
        <form action="login.php" method="post" onSubmit="return validation()">
            <div>
                <label>Username</label>
                <input type="text" name="username" id="username" />
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" id="password" />
            </div>
            <div>
                <input type="submit" value="login" class="button">
            </div>
        </form>
    </div>
</body>

<script type="text/javascript">
    function validation(){
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if(username != "" && password != ""){
            return true;
        }else{
            alert('Fill username and password !');
            return false;
        }
    }
</script>
</html>