<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
			$table->foreignIdFor(\App\Models\Record::class)
					->constrained('records');
			$table->foreignIdFor(\App\Models\QuestionContent::class)
					->constrained('question_contents');
			$table->foreignIdFor(\App\Models\Variant::class)
					->constrained('variants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
};
