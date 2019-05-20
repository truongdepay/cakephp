<?php
use Migrations\AbstractMigration;

class CreateResult extends AbstractMigration
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
        $table = $this->table('result');
        $table->addColumn('home', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('away', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('home_goal', 'integer', [
            'default' => null,
            'limit' => 2,
            'null' => true,
        ]);
        $table->addColumn('away_goal', 'integer', [
            'default' => null,
            'limit' => 2,
            'null' => true,
        ]);
        $table->addColumn('duece', 'integer', [
            'default' => null,
            'limit' => 1,
            'null' => true,
        ]);
        $table->addColumn('win', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->create();
    }
}
