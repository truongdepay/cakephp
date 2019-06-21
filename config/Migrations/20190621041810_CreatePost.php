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
            'null' => true,
            'limit' => 11
        ]);
        $table->addColumn('category', 'integer', [
            'default' => null,
            'null' => true,
            'limit' => 11
        ]);
        $table->addColumn('title', 'string', [
            'default' => null,
            'null' => true,
            'limit' => 255
        ]);
        $table->addColumn('source', 'string', [
            'default' => null,
            'null' => true,
            'limit' => 255
        ]);
        $table->addColumn('content', 'text', [
            'default' => null,
            'null' => true
        ]);
        $table->addColumn('created', 'integer', [
            'default' => null,
            'null' => true,
            'limit' => 11
        ]);
        $table->addColumn('modify', 'integer', [
            'default' => null,
            'null' => true,
            'limit' => 11
        ]);
        $table->create();
    }
}
