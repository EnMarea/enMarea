<?php

use Phinx\Migration\AbstractMigration;

class V1 extends AbstractMigration
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
        $this->table('highlights')
            ->addColumn('type', 'string')
            ->addColumn('title', 'string')
            ->addColumn('imageFile', 'string')
            ->addColumn('createAt', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('url', 'string')
            ->addColumn('isActive', 'boolean')
            ->addColumn('province', 'enum', ['values' => 'acoruna,lugo,ourense,pontevedra'])
            ->create();
    }
}
