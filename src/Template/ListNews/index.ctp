<div class="row">
    <?php foreach ($response as $item) : ?>
    <div class="col-sm-12 col-md-6">
        <a href="<?= $this->Url->build([
            'controller' => 'DetailNews',
            'action' => 'index',
            '?' => ['source' => $this->request->getQuery('source'), 'link' => $item['link']]
        ]) ?>">
        <div class="media mt-2">
            
                <img src="<?= $item['img'] ?>" class="mr-3" alt="<?= $item['title'] ?>" style="width: 200px">
                <div class="media-body">
                    <h6 class="mt-0 text-dark"><?= $item['title'] ?></h6>
                </div>
        </div>
        </a>
    </div>
    <?php endforeach; ?>
</div>