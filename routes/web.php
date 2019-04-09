<?php

Route::get('/', 'PagesController@root')->name('root');
Auth::routes();

Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);
//UsersController@show中的show方法传参时申明了类型User,show方法中对应的参数&user会匹配路由片段中的{user}，{user}对应请求路由中的用户ID
//当请求 http://larabbs.test/users/1 并且满足以上两个条件时，Laravel 将会自动查找 ID 为 1 的用户并赋值到变量UsersController@show中的 $user 中
Route::get('/users/{user}','UsersController@show')->name('users.show');

Route::resource('topics', 'TopicsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
// 根据分类列表话题
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);