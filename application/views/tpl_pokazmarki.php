<table border="1">
    <tr>
        <td>ID</td>
        <td>Marka</td>

    </tr>

    <?php foreach( $data as $marki ){ ?>

    <tr>
        <td> <?php echo $marki [ 'marki_id' ] ?> </td>
        <td> <?php echo $marki [ 'marki_nazwa' ] ?> </td>
        <td> <a href="<?php echo Url::getUrl( 'marki', 'usunMarki', array ('id' => $marki['marki_id'])) ?>">UsunMarke</a>
       <?php } ?></td>
    </tr>
</table>
