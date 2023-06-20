<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateProduct extends AbstractMigration
{
    public function up(): void
    {
        $table = $this->table('product');
        $table->addPrimaryKey([
            'id',
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('price', 'decimal', [
            'null' => false,
            'limit' => 50,
            'precision' => 10,
            'scale' => 2,
        ]);
        $table->addColumn('category_id', 'integer');
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addForeignKey('category_id', 'category', 'id');

        $table->save();
    }

    public function down()
    {
        $table = $this->table('product');

        if ($table->exists()) {
            $table->drop()->save();
        }
    }
}
