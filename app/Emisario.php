<?php 
namespace App;
use Illuminate\Database\Eloquent\Model;

class Emisario extends Model {
	protected $table = 'emisarios';
	protected $fillable = ['id','encargo_id','usuario_id']; 
	protected $guarded = ['id']; 
	public $timestamps = false;

  
}