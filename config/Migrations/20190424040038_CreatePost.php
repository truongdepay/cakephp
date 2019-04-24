<?php
use Migrations\AbstractMigration;

class CreatePost extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('post');
        $table->addColumn('status', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true
        ]);
        $table->addColumn('cat', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true
        ]);
        $table->addColumn('slug', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true
        ]);
        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
            //'limit' => 255,
            'null' => true
        ]);
        $table->addColumn('content', 'text', [
            'default' => null,
            //'limit' => 255,
            'null' => true
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            //'limit' => 11,
            'null' => true
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            //'limit' => 11,
            'null' => true
        ]);
        $table->update();
    }
}
