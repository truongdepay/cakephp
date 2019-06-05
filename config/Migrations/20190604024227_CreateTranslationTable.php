<?php
use Migrations\AbstractMigration;

class CreateTranslationTable extends AbstractMigration
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
        $table = $this->table('translation');
        $table->addColumn('title', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('content', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('token', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('words', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->create();
    }
}
