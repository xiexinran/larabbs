<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvatarAndIntroductionToUsersTable extends Migration
{
    /**
     * 执行迁移
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //将头像图片以文件的形式放置于服务器上，将路径子串存储于数据库中，所以用string，nullable是允许为空
             $table->string('avatar')->nullable();
            $table->string('introduction')->nullable();
        });
    }

    /**
     * 回滚迁移
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn('avatar');
            $table->dropColumn('introduction');
        });
    }
    //接下来运行迁移，将字段加入用户表中
}
