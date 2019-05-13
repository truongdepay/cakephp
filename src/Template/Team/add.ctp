<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Team $team
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Team'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="">
    <?= $this->Form->create($team) ?>
    <fieldset>
        <legend><?= __('Add Team') ?></legend>
        <div class="form-group">
        <?php
            echo $this->Form->control('name', [
                'class' => 'form-control',
                'id' => 'name'
                ]);
            echo $this->Form->control('shortname', [
                'class' => 'form-control',
                'id' => 'shortname'
            ]);
        ?>
        </div>
        <?= $this->Form->button(__('Submit'), [
            'class' => 'btn btn-primary'
        ]) ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
