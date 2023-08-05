<select id="region_id" name="region_id">
    <?php
        foreach ($regions as $region) {
    ?>
        <option value="<?= $region->id ?>">
             <?= $region->nom ?> (<?= $region->id ?>)
        </option>
    <?php
        }
    ?>
</select>