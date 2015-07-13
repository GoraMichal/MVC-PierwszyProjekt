<form method="post" action="<?php echo Url::getUrl( 'user', 'auth' );?>">

    login: <input type="text" name="login"></br>
    hasło: <input type="password" name="password"></br>
    <input type="submit" value="Zaloguj się">
    <a href="<?php echo Url::getUrl( 'user', 'rejestracja') ?>"><button type="button">Rejestracja</button></a>
</form>

