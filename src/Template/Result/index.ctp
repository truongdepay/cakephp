<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $result
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Result'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="result index large-9 medium-8 columns content">
    <h3><?= __('Result') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('home') ?></th>
                <th scope="col"><?= $this->Paginator->sort('away') ?></th>
                <th scope="col"><?= $this->Paginator->sort('home_goal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('away_goal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duece') ?></th>
                <th scope="col"><?= $this->Paginator->sort('win') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $result): ?>
            <tr>
                <td><?= $this->Number->format($result->id) ?></td>
                <td><?= $this->Number->format($result->home) ?></td>
                <td><?= $this->Number->format($result->away) ?></td>
                <td><?= $this->Number->format($result->home_goal) ?></td>
                <td><?= $this->Number->format($result->away_goal) ?></td>
                <td><?= $this->Number->format($result->duece) ?></td>
                <td><?= $this->Number->format($result->win) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $result->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $result->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $result->id], ['confirm' => __('Are you sure you want to delete # {0}?', $result->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
