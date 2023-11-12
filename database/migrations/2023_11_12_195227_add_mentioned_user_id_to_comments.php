<?php
// database/migrations/xxxx_xx_xx_add_mentioned_user_id_to_comments.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMentionedUserIdToComments extends Migration
{
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->foreignId('mentioned_user_id')->nullable()->constrained('users');
        });
    }

    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('mentioned_user_id');
        });
    }
}
