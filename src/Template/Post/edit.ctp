<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $post->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Post'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="post form large-9 medium-8 columns content">
    <?= $this->Form->create($post) ?>
    <fieldset>
        <legend><?= __('Edit Post') ?></legend>
        <?php
        echo $this->Form->label('status', 'Status');
        echo $this->Form->select(
            'cat',
            [0 => 'Nháp', 1 => 'Công khai'],
            [
                'id' => 'status',
                'class' => 'form-control'
            ]
        );
        ?>
        <div class="form-group">
            <?php
            echo $this->Form->label('cat', 'Category');
            echo $this->Form->select(
                'cat',
                [1 => 'Báo chí', 2 => 'Chuyện tranh'],
                [
                    'id' => 'cat',
                    'class' => 'form-control'
                ]
            );
            ?>
        </div>
        <div class="form-group">
            <?php
            echo $this->Form->control('slug', [
                'class' => 'form-control'
            ]);

            echo $this->Form->control('title', [
                'class' => 'form-control'
            ]);
            echo $this->Form->control('description', [
                'class' => 'form-control'
            ]);
            echo $this->Form->control('content', [
                'class' => 'form-control'
            ]);
            ?>
        </div>
        <?= $this->Form->button(__('Submit'), [
            'class' => 'btn btn-primary'
        ]) ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
