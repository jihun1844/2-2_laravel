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
        Schema::create('flights', function (Blueprint $table) {
            $table->id(); //UnsignedBigInt 타입의 auto_increment primary key id컬럼 생성
            $table->string('name');
            $table->string('airline');
            //dataTime 데이터 타입으로 created_at, updated_at이라는 두개의 컬럼 생성
            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
