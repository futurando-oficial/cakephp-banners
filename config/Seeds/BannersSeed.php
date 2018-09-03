<?php
use Migrations\AbstractSeed;

/**
 * Banners seed.
 */
class BannersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data[] = [
            'id'=>'1',
            'name'=>'Banner Home 1',
            'alt'=>'Servicos Banner',
            'file'=>'banners/hgfidfdf.jpg',
            'file_mobile'=>'banners/hgfidfdf_mob.jpg',
            'link'=>'',
            'sort'=>'1',
            'status'=>'1',
            'created'=> date('Y-m-d H:i:s'),
            'modified'=> date('Y-m-d H:i:s'),
            'type'=>'image'
        ];

        $data[] = [
            'id'=>'2',
            'name'=>'Banner Home Vimeo',
            'alt'=>'Video Banner',
            'file'=>'',
            'file_mobile'=>'',
            'link'=>'https://player.vimeo.com/video/6370469',
            'sort'=>'2',
            'status'=>'1',
            'created'=> date('Y-m-d H:i:s'),
            'modified'=> date('Y-m-d H:i:s'),
            'type'=>'vimeo'
        ];

        $data[] = [
            'id'=>'3',
            'name'=>'Banner Home Youtube',
            'alt'=>'Youtube Banner',
            'file'=>'',
            'file_mobile'=>'',
            'link'=>'https://youtu.be/Bey4XXJAqS8',
            'sort'=>'3',
            'status'=>'1',
            'created'=> date('Y-m-d H:i:s'),
            'modified'=> date('Y-m-d H:i:s'),
            'type'=>'youtube'
        ];

        $table = $this->table('banners');
        $table->insert($data)->save();
    }
}
