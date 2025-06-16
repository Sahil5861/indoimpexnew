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
        Schema::table('documents', function (Blueprint $table) {
            $table->string('header_image')->nullable()->after('document_content'); // Replace 'existing_column' with the column after which you want to add this field
            $table->string('footer_image')->nullable()->after('header_image');
            $table->integer('header_image_height')->nullable()->after('footer_image');
            $table->integer('footer_image_height')->nullable()->after('header_image_height');
            $table->string('header_image_type')->nullable()->after('footer_image_height');
            $table->string('footer_image_type')->nullable()->after('header_image_type');
            $table->string('background_image')->nullable()->after('footer_image_type');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            //
        });
    }
};
