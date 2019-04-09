<?php
// 作为category数据初始化
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        => '分享',
                'description' => '分享创造，分享发现',
            ],
            [
                'name'        => '教程',
                'description' => '开发技巧、推荐扩展包等',
            ],
            [
                'name'        => '问答',
                'description' => '请保持友善，互帮互助',
            ],
            [
                'name'        => '公告',
                'description' => '站点公告',
            ],
        ];
        //insert()批量往数据表中插入数据

        DB::table('categories')->insert($categories);
    }

    /**
     * 回滚操作时清空category数据表中的所有数据
     *
     * @return void
     */
    public function down()
    {

        DB::table('categories')->truncate();
    }
}
