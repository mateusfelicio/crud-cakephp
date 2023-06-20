<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateCategory extends AbstractMigration
{
    public function up(): void
    {
        $table = $this->table('category');
        $table->addPrimaryKey([
            'id',
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);

        $table->create();
    }

    public function down()
    {
        $table = $this->table('category');

        if ($table->exists()) {
            $table->drop()->save();
        }
    }

}
