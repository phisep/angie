<?php 
namespace App;
use Illuminate\Database\Eloquent\Model;

class Comprador extends Model {
	protected $table = 'compradores';
	protected $fillable = ['id','encargo_id','usuario_id']; 
	protected $guarded = ['id']; 
	public $timestamps = false;

  
}