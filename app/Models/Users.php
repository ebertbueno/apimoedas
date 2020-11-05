<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\Tratamentos;
// use App\Scopes\MultiEmpresaScope;

class Users extends Authenticatable
{
	use SoftDeletes;

	public $table = 'users';
	public $primarykey = 'id';
	public $fillable = [
		'name','razao','fantasia','email','password','url','remember_token','tentativas','token_access','chave_acesso','nivel','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];
	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

	protected $appends = ['pegaConfiguracoes'];
    public function getpegaConfiguracoesAttribute() { 
    	$consultaConfiguracoes = Model('Configuracoes')::where('emp_id',$this->id)->get();

    	$retorno = [];
    	foreach( $consultaConfiguracoes as $configuracoes ){
    		$retorno[$configuracoes['chave']] = $configuracoes['valor'];
    	}

    	return $this->attributes['pegaConfiguracoes'] = $retorno;
    }

// protected $appends = ['configuracoes'];
// public function getconfiguracoesAttribute() { return $this->attributes['configuracoes'] = configuracoesPlataforma(); }


// public function getconfiguracoesAttribute() { return $this->attributes['configuracoes'] = UsersConfiguracoes::select(['chave','valor'])->where('users_id',$this->pai_id)->get(); }

	protected static function boot()
	{
		parent::boot();
// static::addGlobalScope(new MultiEmpresaScope);

		if( Auth()->check() ){
			self::creating(function ($model) {
				$model->created_by = Auth()->user()->id;
				$model->created_from = pegaIPUsuario();
			});

			self::created(function ($model) {
				$model->chave_acesso = Tratamentos::blockchain([$model->id,$model->email,$model->url,$model->created_at]);
			});

			self::updating(function ($model) {
				$model->updated_by = Auth()->user()->id;
				$model->updated_from = pegaIPUsuario();
			});

			self::deleting(function ($model) {
				$model->deleted_by = Auth()->user()->id;
				$model->deleted_from = pegaIPUsuario();
			});
		}
	}
/*
static function usersJoin($id){
return Users::join('users_dados','users_dados.id','=','users.id')->find($id);
}

public function UsersDados(){
return $this->HasOne('App\Models\UsersDados','id','id');
}

public function UsersEnderecos(){
return $this->HasMany('App\Models\UsersEnderecos','users_id','id');
}

public function UsersTelefone(){
return $this->HasMany('App\Models\UsersTelefone','users_id','id');
}

public function UsersDocumentos(){
return $this->HasMany('App\Models\UsersDocumentos','users_id','id');
}

public function IdiomaSelecionado(){
return $this->HasOne('App\Models\Idiomas','sigla','idioma');
}

public function UsersConsultaRoot(){
return $this->HasMany('App\Models\Users','root','id')->orderby('id');
}

public function UsersConsultaDerramamento(){
return $this->HasMany('App\Models\Users','derramamento','id')->orderby('id');
}
*/
}