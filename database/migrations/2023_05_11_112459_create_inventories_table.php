<?php

use App\Models\Category;
use App\Models\Section;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alias')->nullable();
            $table->string('price')->nullable();
            $table->string('register_number')->nullable();
            $table->string('accounting_number')->nullable();
            $table->string('inventory_date')->nullable();
            $table->string('responsible_user_signature')->nullable();
            $table->foreignIdFor(Category::class, 'category_id')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete();
            $table->foreignIdFor(Section::class, 'section_id')
                ->nullable()
                ->references('id')
                ->on('sections')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
