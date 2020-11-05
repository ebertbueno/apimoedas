<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cabecalhos extends Model
{
	use SoftDeletes;

	public $table = 'cabecalhos';
	public $primarykey = 'id';
	public $fillable = [
		'local','titulo','subtitulo','conteudo','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];
}