<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;
use Carbon\Carbon;

class User extends Model
{
    use HasFactory;    

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $connection = 'mysql';

    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getAge(){
        $this->date_naissance = new DateTime($this->date_naissance);
        $now = new DateTime();
        $interval = $now->diff($this->date_naissance);
        return strval($interval->y);
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSexe(){
        return $this->sexe;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getPays(){
        return $this->pays;
    }
    public function getVille(){
        return $this->ville;
    }
    public function getDateNaissance(){
        return $this->date_naissance;
    }
    public function getDateAnniversaire(){
        Carbon::setLocale('fr');
        $date = $this->date_naissance;
        $date = Carbon::parse($date)->translatedFormat('d F');
        $date = preg_match('/^0/', strval($date)) ? preg_replace('/^0+/', '', strval($date)) : $date;
        return $date;
    }
    public function getTelephone(){
        return $this->telephone;
    }
    public function getUrlPhoto(){
        return $this->url_photo;
    }
    public function getField(){
        return $this->field;
    }
    public function setNom($nom){

            $this->nom = $nom;
            DB::update('update users set nom = ? where id = ?',[$nom,$this->id]);
        
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function setSexe($sexe){
        $this->sexe = $sexe;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setPays($pays){
        $this->pays = $pays;
    }
    public function setVille($ville){
        $this->ville = $ville;
    }
    public function setDateNaissance($date_naissance){
        $this->date_naissance = $date_naissance;
    }
    public function setTelephone($telephone){
        $this->telephone = $telephone;
    }
    public function setUrlPhoto($url_photo){
        $this->url_photo = $url_photo;
    }
    public function setField($field){
        $this->field = $field;
    }
    public function getCard(){
        echo"
            
            <article class=\"card\">
                    <p class=\"field\">".$this->getField()."</p>
                    <figure>
                        <img class=\"prof_picture\" src=\"".$this->getUrlPhoto()."\" alt=\"\">
                        <figcaption>
                        <h3><strong>".$this->getPrenom()." ".$this->getNom()."</strong>(".$this->getAge()." ans)</h3>
                        <p>".$this->getVille().", ".$this->getPays()."</p>                            <ul>
                                <li class=\"prof_mail\"><img src=\"{{asset('asset/mail.png')}}\" alt=\"\"><a href=\"#\">".$this->getEmail()."</a></li>
                                <li class=\"prof_tel\"><img src='{{asset('asset/phone.png')}}' alt=\"\"><a href=\"#\">".$this->getTelephone()."</a></li>
                                <li class=\"prof_dateofbirth\"><img src=\"{{asset('asset/birth.png')}}\" alt=\"\">".$this->getDateAnniversaire()."</li>
                            </ul>
                        <figcaption>
                    </figure>
                </article>
                "
        ;
    }
    public static function RandomCard($current_user){
        $utilisateurs = User::where('email', '!=',$current_user->getEmail())->get();
        $utilisateur = $utilisateurs[rand(0, count($utilisateurs)-1)];
        return $utilisateur->getCard();
    }
    public static function getAllUsers(){
        return User::select('id','nom','prenom','email','sexe','pays','ville','date_naissance','telephone','url_photo','field')->get();
    }
}
