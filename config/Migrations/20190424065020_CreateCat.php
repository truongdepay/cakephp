<?php
use Migrations\AbstractMigration;

class CreateCat extends AbstractMigration
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
        $table = $this->table('cat');
        $table->addColumn('status', 'integer', [
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
        $table->addColumn('parent', 'integer', [
            'default' => null,
            'limit' => 11,
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

        $table->create();
    }
}
