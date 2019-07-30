<?php 
namespace App;
use Illuminate\Database\Eloquent\Model;

class Adjudicacion extends Model {
	protected $table = 'adjudicaciones';
	protected $guarded = ['id']; 
	public $timestamps = false;
}