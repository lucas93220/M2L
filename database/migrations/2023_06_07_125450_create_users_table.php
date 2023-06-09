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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('sexe');
            $table->string('password');
            $table->string('pays');
            $table->string('ville');
            $table->date('date_naissance');
            $table->string('telephone');
            $table->string('url_photo');
            $table->string('field');
            $table->timestamps();
        });

         DB::table('users')->insert([
            [
            "nom"=>"Andy",
            "prenom"=>"Louis",
            "email"=>"andy.louis.adm@gmail.com",
            "sexe"=>"Homme",
            "password"=>"admin",
            "pays"=>"France",
            "ville"=>"Paris",
            "date_naissance"=>"1998-12-27",
            "telephone"=>"0726483721",
            "url_photo"=>"https://www.pngitem.com/pimgs/m/285-2855629_profile-clipart-hd-png-download.png",
            "field"=>"Informatique"
            ],
            [
            "nom"=>"Becker",
            "prenom"=>"David",
            "email"=>"david.becker@gmail.com",
            "sexe"=>"Homme",
            "password"=>"davidbecker",
            "pays"=>"France",
            "ville"=>"Paris",
            "date_naissance"=>"1995-12-11",
            "telephone"=>"0646336307",
            "url_photo"=>"https://xsgames.co/randomusers/assets/avatars/male/76.jpg",
            "field"=>"Technique"
            ],
            [
            "nom"=>"Jora",
            "prenom"=>"Léana",
            "email"=>"léana.jora@gmail.com",
            "sexe"=>"Femme",
            "password"=>"léanajora",
            "pays"=>"France",
            "ville"=>"Paris",
            "date_naissance"=>"1997-05-09",
            "telephone"=>"0632452114",
            "url_photo"=>"https://xsgames.co/randomusers/assets/avatars/female/39.jpg",
            "field"=>"Marketing"
            ],
            [
            "nom"=>"Jetfiel",
            "prenom"=>"Alex",
            "email"=>"alex.jetfield@gmail.com",
            "sexe"=>"Homme",
            "password"=>"alexjetfield",
            "pays"=>"France",
            "ville"=>"Paris",
            "date_naissance"=>"1993-04-05",
            "telephone"=>"0654765493",
            "url_photo"=>"https://xsgames.co/randomusers/assets/avatars/male/53.jpg",
            "field"=>"Technique"
            ],
            [
            "nom"=>"Sarah",
            "prenom"=>"Linchert",
            "email"=>"sarah.linchert@gmail.com",
            "sexe"=>"Femme",
            "password"=>"sarahlinchert",
            "pays"=>"France",
            "ville"=>"Paris",
            "date_naissance"=>"1998-07-15",
            "telephone"=>"0789096523",
            "url_photo"=>"https://xsgames.co/randomusers/assets/avatars/female/42.jpg",
            "field"=>"Marketing"
            ],
            [
            "nom"=>"John",
            "prenom"=>"Deyton",
            "email"=>"john.deyton@gmail.com",
            "sexe"=>"Homme",
            "password"=>"johndeyton",
            "pays"=>"France",
            "ville"=>"Paris",
            "date_naissance"=>"1999-02-07",
            "telephone"=>"0798563255",
            "url_photo"=>"https://xsgames.co/randomusers/assets/avatars/male/72.jpg",
            "field"=>"Informatique"
            ],
    ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
