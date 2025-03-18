<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['user_id']);
            
            // Drop the column
            $table->dropColumn('user_id');
        });
    }

    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Add the column back
            $table->unsignedBigInteger('user_id')->nullable();

            // Restore the foreign key constraint (Adjust the reference table & column as per your schema)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
