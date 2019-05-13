<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $result
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Result'), ['action' => 'index']) ?></li>
    </ul>
</nav>

<div class="result form large-9 medium-8 columns content">
    <?= $this->Form->create($result) ?>
    <fieldset>
        <legend><?= __('Add Result') ?></legend>
        <div class="form-group">
            <?php
            echo $this->Form->label('home', 'Select home team');
            echo $this->Form->select('home', $team, [
                    'empty' => 'Select home team',
                'class' => 'form-control'
            ]);
            echo $this->Form->label('away', 'Select away team');
            echo $this->Form->select('away', $team, [
                'empty' => 'Select away team',
                'class' => 'form-control'
            ]);
            echo $this->Form->control('home_goal', [
                    'class' => 'form-control'
            ]);
            echo $this->Form->control('away_goal', [
                    'class' => 'form-control'
            ]);
            echo $this->Form->label('deuce', 'Select result if deuce');
            echo $this->Form->select('duece', [
                    0 => 'Not deuce',
                1 => 'Deuce'
            ], [
                    'empty' => 'Select result if deuce',
                    'class' => 'form-control'
            ]);
            echo $this->Form->label('win', 'Select win team');
            echo $this->Form->select('win', $team, [
                    'empty' => 'Select win team',
                'class' => 'form-control'
            ]);
            ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), [
            'class' => 'btn btn-primary'
    ]) ?>
    <?= $this->Form->end() ?>
</div>
