<h1>Edytuj auto</h1>

<form enctype="multipart/form-data" action="<?php echo Url::getUrl( 'cars', 'updateAuto') ?>" method="post">
    <select name="marki">
        <?php

        if($data) {
            foreach($data as $wiersz) {
                if($wiersz['marki_id'] == $auto['marki_id'] ){
                    echo "<option selected='selected' value='" . $wiersz['marki_id'] . "'>" . $wiersz['marki_nazwa'] . "</option>";

                } else {
                    echo "<option value='" . $wiersz['marki_id'] . "'>" . $wiersz['marki_nazwa'] . "</option>";
                }
            }
        }
        ?>
    </select>
    <br/>

    <input type="text" name="nazwaAuta" value="<?php echo $auto['samochody_nazwa'] ?>"/><br/>
    <input type="text" name="opis" value="<?php echo $auto['samochody_opis'] ?>"/><br/>
    <input type="hidden" name="id" value="<?php echo $auto['samochody_id'] ?>"><br/>
    <input type="file" name="zdjecie" /><br/>
    <input type="submit" value="zapisz">
</form>

<a href="<?php echo Url::getUrl( 'cars', 'list') ?>"><button type="button">Wroc</button></a>

