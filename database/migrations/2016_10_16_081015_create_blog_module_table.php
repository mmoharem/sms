<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogModuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog_categories', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->timestamps();
            $table->softDeletes();
		});

		Schema::create('blogs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('blog_category_id');
			$table->unsignedInteger('user_id');
            $table->string('title');
            $table->string('slug');
			$table->text('content');
			$table->string('image')->nullable();
			$table->integer('views')->default(0);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('blogs');

		Schema::drop('blog_categories');
	}

}
