<?php

use Phinx\Migration\AbstractMigration;

class V15 extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $this->table('programBlock')
            ->addColumn('title', 'string')
            ->addColumn('slug', 'string')
            ->addColumn('text', 'text')
            ->addColumn('position', 'integer', ['null' => true])
            ->addColumn('isActive', 'boolean')
            ->create();

        $this->table('programChapter')
            ->addColumn('title', 'string')
            ->addColumn('slug', 'string')
            ->addColumn('text', 'text')
            ->addColumn('position', 'integer', ['null' => true])
            ->addColumn('isActive', 'boolean')
            ->addColumn('programBlock_id', 'integer', ['null' => true])
            //->addForeignKey('programBlock_id', 'programBlock', 'id', ['delete' => 'SET NULL'])
            ->create();

        $this->table('programAction')
            ->addColumn('title', 'string')
            ->addColumn('slug', 'string')
            ->addColumn('text', 'text')
            ->addColumn('position', 'integer', ['null' => true])
            ->addColumn('isActive', 'boolean')
            ->addColumn('programChapter_id', 'integer', ['null' => true])
            ->addColumn('programPoint_id', 'integer', ['null' => true])
            //->addForeignKey('programChapter_id', 'programChapter', 'id', ['delete' => 'SET NULL'])
            //->addForeignKey('programPoint_id', 'programPoint', 'id', ['delete' => 'SET NULL'])
            ->create();

        $this->table('programPoint')
            ->addColumn('title', 'string')
            ->addColumn('slug', 'string')
            ->addColumn('text', 'text')
            ->addColumn('position', 'integer', ['null' => true])
            ->addColumn('isActive', 'boolean')
            ->create();
    }
}
