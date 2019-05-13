<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $result
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $result->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $result->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Result'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="result form large-9 medium-8 columns content">
    <?= $this->Form->create($result) ?>
    <fieldset>
        <legend><?= __('Edit Result') ?></legend>
        <?php
            echo $this->Form->control('home');
            echo $this->Form->control('away');
            echo $this->Form->control('home_goal');
            echo $this->Form->control('away_goal');
            echo $this->Form->control('duece');
            echo $this->Form->control('win');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
