<?php
use Migrations\AbstractMigration;

class AddTypeToBanners extends AbstractMigration
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
        $table = $this->table('banners');
        $table->addColumn('type', 'string', [
            'default' => null,
            'limit' => 15,
            'null' => false,
        ]);
        $table->update();
    }
}
