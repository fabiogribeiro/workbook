<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Challenge;

class AddBodyHtmlColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('challenges', function (Blueprint $table) {
            $table->text('body_html')->default('');
        });

        $challenges = Challenge::all();
        $parsedown = new Parsedown();

        foreach ($challenges as $challenge) {
            $challenge->body_html = $parsedown->text($challenge->body);
            $challenge->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('challenges', function (Blueprint $table) {
           $table->dropColumn('body_html');
        });
    }
}
