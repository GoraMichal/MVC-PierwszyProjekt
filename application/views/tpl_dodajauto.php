<h1>Dodaj auto</h1>

<a href="<?php echo Url::getUrl( 'marki', 'list') ?>"><button type="button">Lista marek</button></a>
<a href="<?php echo Url::getUrl( 'cars', 'list') ?>"><button type="button">Lista samochodów</button></a>

<form enctype="multipart/form-data" action="" method="post">
    <select name="nazwaMarki">
        <?php

        if($data) {
            foreach($data as $wiersz) {
                echo "<option value='" . $wiersz['marki_id'] . "'>" . $wiersz['marki_nazwa'] . "</option>";
            }
        }
        ?>
    </select>
    <br/>
    <input type="text" name="nazwaAuta" placeholder="Nazwa auta"/><br/>
    <textarea name="opisAuta" placeholder="Opis Auta"></textarea><br/>
    <input type="file" name="zdjecie" /><br/>
    <input type="submit" value="Zapisz"><br/>
</form>

<a href="<?php echo Url::getUrl( 'cars', 'list') ?>"><button type="button">Wroc</button></a>