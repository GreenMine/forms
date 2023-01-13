<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	// TODO: move to another folder
	const QUESTIONS_TYPE = [
		'Single',
		'Mutltiply',
		'DoubleDimension',
		'Text'
	];
	
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
			$table->foreignIdFor(\App\Models\Form::class);
			$table->enum('type', self::QUESTIONS_TYPE);
			$table->jsonb('structure');
			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
