<?php
/**
 * Created by PhpStorm.
 * User: TruongNv
 * Date: 2019-06-03
 * Time: 4:49 PM
 */
?>

<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <input type="text" name="title" id="" class="form-control" placeholder="<?= __('common.input.title') ?>">
        </div>
        <div class="form-group">
            <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="<?= __('common.input.content') ?>"></textarea>
        </div>
        <input type="button" class="btn btn-primary" value="<?= __('translation.index.button.save') ?>" onclick="saveData(this)" data-from="content" data-title="title">
    </div>
    <div class="col-md-4">
        <hr>
        <h2><?= __('common.title.your_post') ?></h2>

        <?php
        if (!empty($postCookie)) {
            foreach ($postCookie as $item) :
                ?>
                <a href="<?= $this->Url->build([
                    'controller' => 'Translation',
                    'action' => 'view',
                    '?' => ['id' => $item['id'], 'token' => $item['token']]
                ]) ?>"><h5><?= $item['title'] ?></h5></a>
                <p class="font-italic"><?= date('Y-m-d H:i:s', $item['created']) ?></p>
            <?php endforeach;
        } else { ?>
                <p><?= __('common.title.not_post') ?></p>
            <?php
        }
        ?>
    </div>
</div>
<?= $this->element('Translation/script_index') ?>
