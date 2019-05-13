<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $result
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Result'), ['action' => 'edit', $result->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Result'), ['action' => 'delete', $result->id], ['confirm' => __('Are you sure you want to delete # {0}?', $result->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Result'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Result'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="result view large-9 medium-8 columns content">
    <h3><?= h($result->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($result->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Home') ?></th>
            <td><?= $this->Number->format($result->home) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Away') ?></th>
            <td><?= $this->Number->format($result->away) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Home Goal') ?></th>
            <td><?= $this->Number->format($result->home_goal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Away Goal') ?></th>
            <td><?= $this->Number->format($result->away_goal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duece') ?></th>
            <td><?= $this->Number->format($result->duece) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Win') ?></th>
            <td><?= $this->Number->format($result->win) ?></td>
        </tr>
    </table>
</div>
