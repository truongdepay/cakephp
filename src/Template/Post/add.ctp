<div class="row">
    <div class="col-lg-8 border-right">
        <h3>New post</h3>
        <?= $this->Form->create() ?>
        <div class="form-group">
            <?= $this->Form->input('title', ['class' => 'form-control', ]) ?>
            <?= $this->Form->input('source', ['class' => 'form-control', ]) ?>
            <?= $this->Form->label('content', 'Content') ?>
            <?= $this->Form->textarea('content', ['class' => 'form-control', 'rows' => 10, 'id' => 'content']) ?>
            <?= $this->Form->label('status', 'Status') ?>
            <?= $this->Form->select('status',
                STATUS,
                ['class' => 'form-control', 'id' => 'status'])
            ?>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        <?= $this->Form->end(); ?>
    </div>
    <div class="col-lg-4">
        <h3>Recent post</h3>
    </div>
</div>