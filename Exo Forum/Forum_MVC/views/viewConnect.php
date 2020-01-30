<h2>Connexion</h2>


<form method="post" action="index.php?ctrl=User&action=getConnect">
    <input type="text" placeholder="Votre login" name="username"><br>
    <input type="password" placeholder="Votre mot de passe" name="password"><br>
    <input type="hidden" value="<?= $_SESSION['token']?>" name="token">
    <input type="submit" value="Connexion"><i id="loading" class="fas fa-spinner fa-2x fa-spin" style="display: none;"></i>
</form>