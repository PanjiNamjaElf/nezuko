<?php

/**
 * @author    Panji Setya Nur Prawira <kstar.panjinamjaelf@gmail.com>
 * @package   Nezuko - Content Management System
 * @copyright Copyright (c) 2020, Panji Setya Nur Prawira
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->text('title');
            $table->text('slug');
            $table->longText('content')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('posts');
    }
}
