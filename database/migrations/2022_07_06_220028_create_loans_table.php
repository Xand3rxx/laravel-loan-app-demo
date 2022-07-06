<?php

use App\Models\Loan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->uuid('uuid');
            $table->foreignId('user_id');
            $table->foreignId('approved_by');
            $table->double('loan_amount');
            $table->unsignedInteger('duration');
            $table->enum('status', Loan::STATUS)->default(Loan::STATUS['Pending']);
            $table->enum('loan_type', Loan::TYPE);
            $table->date('approved_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('loans');
    }
};
