<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cat $cat
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cat'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cat form large-9 medium-8 columns content">
    <?= $this->Form->create($cat) ?>
    <fieldset>
        <legend><?= __('Add Cat') ?></legend>
        <div class="form-group">
            <?php
            echo $this->Form->label('status', 'Status');
            echo $this->Form->select(
                'status',
                [0 => 'Nháp', 1 => 'Công khai'],
                [
                    'id' => 'status',
                    'class' => 'form-control'
                ]
            );
            echo $this->Form->control('title', [
                'id' => 'title',
                'class' => 'form-control'
            ]);
            echo $this->Form->label('parent', 'Danh mục cha');
            echo $this->Form->select(
                'parent',
                [],
                [
                    'id' => 'parent',
                    'class' => 'form-control'
                ]
            );
            ?>
        </div>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
