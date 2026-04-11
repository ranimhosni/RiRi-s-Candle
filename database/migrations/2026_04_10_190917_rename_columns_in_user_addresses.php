<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
            public function up(): void
{
    Schema::table('user_addresses', function (Blueprint $table) {
        $table->renameColumn('adresse1', 'name');
        $table->renameColumn('adresse2', 'last_name');
        $table->renameColumn('city', 'address');
        $table->renameColumn('state', 'phone');
    });
}

public function down(): void
{
    Schema::table('user_addresses', function (Blueprint $table) {
        $table->renameColumn('name', 'adresse1');
        $table->renameColumn('last_name', 'adresse2');
        $table->renameColumn('address', 'city');
        $table->renameColumn('phone', 'state');
});
}
};

