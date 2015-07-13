<table border="1">
    <tr>
        <td>ID</td>
        <td>LOGIN</td>
        <td>HASŁO</td>
    </tr>

    <?php foreach( $data as $car )
    { ?>
        <tr>
            <td> <?php echo $car[ 'id' ] ?> </td>
            <td> <?php echo $car[ 'login' ] ?> </td>
            <td> <?php echo $car[ 'password' ] ?> </td>
            <td>

            </td>
        </tr>
    <?php } ?>
</table>

<?php // $partial->display( 'pager' ); ?>

<a href="<?php echo Url::getUrl( 'cars', 'list') ?>"><button type="button">Pokaż liste samochodów</button></a>
<a href="<?php echo Url::getUrl( 'user', 'logout') ?>"><button type="button">Wyloguj</button></a>
