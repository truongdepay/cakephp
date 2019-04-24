<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cat $cat
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cat->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cat->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cat'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cat form large-9 medium-8 columns content">
    <?= $this->Form->create($cat) ?>
    <fieldset>
        <legend><?= __('Edit Cat') ?></legend>
        <?php
            echo $this->Form->control('status');
            echo $this->Form->control('slug');
            echo $this->Form->control('title');
            echo $this->Form->control('parent');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
