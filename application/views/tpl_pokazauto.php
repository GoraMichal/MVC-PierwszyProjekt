
<table align="center"; height=500; border="1">
<tr>
    <td width="50"; align="center">ID</td>
    <td width="100"; align="center">Nazwa</td>
    <td width="150"; align="center">Opis</td>
    <td width="100"; align="center">Zdjecie</td>
</tr>
<div align="center";>
     <a href="<?php echo Url::getUrl( 'cars', 'addNewAuto') ?>"><button type="button">Dodaj Samochod</button></a>
     <a href="<?php echo Url::getUrl( 'user', 'logout') ?>"><button type="button">Wyloguj</button></a>
</div><br/>

<div>
<?php foreach( $data as $car ){ ?>
<tr>
    <td> <?php echo $car[ 'samochody_id' ] ?> </td>
    <td> <?php echo $car[ 'samochody_nazwa' ] ?> </td>
    <td> <?php echo $car[ 'samochody_opis' ] ?> </td>
    <td> <img src="http://mvc.pl/images/small_<?php echo $car['samochody_zdjecie'] ?>"> </td>
    <td><a href="<?php echo Url::getUrl( 'cars', 'usunSamochody', array ( 'id' => $car[ 'samochody_id' ] ) ) ?> "><button type="button">Usun</button></a><?php ?></td>
    <td><a href="<?php echo Url::getUrl( 'cars', 'editAuto', array ( 'id' => $car[ 'samochody_id' ] ) ) ?> "><button type="button">Edytuj</button></a><?php } ?></td>
</tr>
</table>
</div><br/>

<div align="center";>
    <?php $partial->display('pager'); ?>
</div>
