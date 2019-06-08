<style>
    #content span:hover {
        cursor: pointer;
    }

    #content {
        line-height: 3;
    }

    #content .text-selected {
        position: relative;
    }
    #content .display-text {
        position: absolute;
        z-index: 30;
        top: -15px;
        width: max-content;
        height: 15px;
        font-size: 10px;
        font-style: italic;
        background: #dad9d9;
        left: 0px;
        line-height: 1;
        padding: 0px 0px;
        word-break: keep-all;
        border: 1px solid #BDBDBD;
        border-radius: 2px;
    }
</style>
<div class="row">
    <div class="col">
        <h2><?= $result->title ?></h2>
        <div class="content" id="content">
            <?= base64_decode($result->content) ?>
        </div>
    </div>
</div>

<?= $this->element('Translation/script_view') ?>