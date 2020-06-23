<html>
<body>
    <form id ="login_form"  method="POST" >
        <div class="form-group">
            <label for="username">Username</label>
            <input id="username" type="text" class="form-control" name="username" value="" >
        </div>
        <div class="form-group">
            <label for="password">Password
            </label>
            <input id="password" type="password" class="form-control" name="password" >

            <br><button type="submit" name="conn"> Connexion</button>
        </div>
    </form>

    <?php

    if(isset($_POST["conn"]))
    {
        require("login/connexion.php");
    }

    ?>
</body>
</html>
