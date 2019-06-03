<?php
/**
 * Created by PhpStorm.
 * User: TruongNv
 * Date: 2019-06-03
 * Time: 4:49 PM
 */
?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <input type="button" class="btn btn-primary" value="<?= __('translation.index.button.save') ?>" onclick="saveData(this)" data-from="content">
    </div>
</div>
<div class="discontent">

</div>
<?= $this->element('Translation/script') ?>