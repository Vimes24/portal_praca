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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->text('baner_job_listing');
            $table->text('baner_job_detail');
            $table->text('baner_job_categories');
            $table->text('baner_company_listing');
            $table->text('baner_company_detail');
            $table->text('baner_pricing');
            $table->text('baner_blog');
            $table->text('baner_post');
            $table->text('baner_faq');
            $table->text('baner_contact');
            $table->text('baner_terms');
            $table->text('baner_privacy');
            $table->text('baner_signup');
            $table->text('baner_login');
            $table->text('baner_forget_password');
            $table->text('baner_company_panel');
            $table->text('baner_candidate_panel');
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
        Schema::dropIfExists('banners');
    }
};
