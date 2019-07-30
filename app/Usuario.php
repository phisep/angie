<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
  protected $table = 'usuarios';
  protected $fillable = ['rut','nombre','fecha_nacimiento','sexo','ciudad','pais','foto','email','password']; 
  protected $guarded = ['id']; 
  public $timestamps = true;
  
  public function mis_encargos()	{
		return $this->belongsToMany(
	  'App\Encargo', // Lo que quieres traer
	  'compradores'	// Relacion de donde esta lo que quieres traer
	  );  
  }
  
  public function mis_postulaciones()	{
	    return $this->belongsToMany(
	  'App\Encargo', 
	  'emisarios'	
	  );  
  }
  
  public function mis_adjudicaciones()	{
	   return $this->belongsToMany(
	  'App\Encargo', 
	  'adjudicaciones'	
	  );  
  }
  
}