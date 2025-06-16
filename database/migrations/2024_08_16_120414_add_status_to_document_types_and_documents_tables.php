<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToDocumentTypesAndDocumentsTables extends Migration
{
    public function up()
    {
        // Add status field to document_types table
        Schema::table('document_types', function (Blueprint $table) {
            $table->boolean('status')->default(true)->after('variables'); // Add status field after variables
        });

        // Add status field to documents table
        Schema::table('documents', function (Blueprint $table) {
            $table->boolean('status')->default(true)->after('document_content'); // Add status field after document_content
        });
    }

    public function down()
    {
        // Remove status field from document_types table
        Schema::table('document_types', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        // Remove status field from documents table
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
