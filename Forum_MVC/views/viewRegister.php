<h2>Inscription</h2>

<form action="index.php?ctrl=User&action=addUser" method="post">
    <input type="text" placeholder="Votre login" name="username"><br>
    <input type="password" placeholder="Votre password"  name="password"><br>
    <input type="password" placeholder="Confirm password"  name="confirm_password"><br>
    <input type="submit" value="Inscription"><i id="loading" class="fas fa-spinner fa-2x fa-spin" style="display: none;"></i>
</form>