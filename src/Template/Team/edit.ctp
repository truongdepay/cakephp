<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Team $team
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $team->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $team->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Team'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="team form large-9 medium-8 columns content">
    <?= $this->Form->create($team) ?>
    <fieldset>
        <legend><?= __('Edit Team') ?></legend>
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
