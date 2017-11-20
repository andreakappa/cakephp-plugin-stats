<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
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
        $this->table('stats')
            ->addColumn('controller','string',['default'=>null,'null'=>true,'limit'=>100])
            ->addColumn('action','string',['default'=>null,'null'=>true,'limit'=>100])
            ->addColumn('query','string',['default'=>null,'null'=>true,'limit'=>100])
            ->addColumn('user_id','integer',['default'=>null,'null'=>true])
            ->addColumn('created','datetime',['default'=>null,'null'=>true])
            ->addColumn('returned','datetime',['default'=>null,'null'=>true])
            ->create();
    }
}
