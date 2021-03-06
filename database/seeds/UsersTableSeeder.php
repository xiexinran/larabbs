<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        // 头像假数据
        $avatars = [
           'http://larabbs.test/uploads/images/avatars/201904/09/1_1554800906_KgiZzukX0e.png',
           'http://larabbs.test/uploads/images/avatars/201904/09/1_1554821215_wIZ9UyVGnM.jpg',
           'http://larabbs.test/uploads/images/avatars/201904/09/1_1554821231_osrswy7bQS.jpg',
           'http://larabbs.test/uploads/images/avatars/201904/09/1_1554821313_87sznr4XBk.jpg',
           'http://larabbs.test/uploads/images/avatars/201904/09/1_1554821344_hSRGAWxUWa.jpg',
           
          

        ];

        // 生成数据集合
        $users = factory(User::class)
                        ->times(10)
                        ->make()
                        ->each(function ($user, $index)
                            use ($faker, $avatars)
        {
            // 从头像数组中随机取出一个并赋值
            $user->avatar = $faker->randomElement($avatars);
        });

        // 让隐藏字段可见，并将数据集合转换为数组
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        // 插入到数据库中
        User::insert($user_array);

        // 单独处理第一个用户的数据
        $user = User::find(1);
        $user->name = 'xxr';
        $user->email = 'xxr@qq.com';
        $user->avatar = 'http://larabbs.test/uploads/images/avatars/201904/09/1_1554821359_bkBFRhAiw3.jpg';
        $user->save();

    
    }
}

   