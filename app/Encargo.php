<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encargo extends Model {
	protected $table = 'encargos';
	protected $fillable = ['producto','descripcion','ciudad','pais','tipo_encargo','comision','tiempo_entrega']; 
	protected $guarded = ['id']; 
	public $timestamps = false;
    
	public function comprador()	{
		return $this->belongsToMany('App\Usuario','compradores'); 
	}
	
	public function emisarios()	{
		return $this->belongsToMany('App\Usuario','emisarios');
	}
	
	public function adjudicaciones()	{
		return $this->belongsToMany('App\Usuario','adjudicaciones');
	}
}