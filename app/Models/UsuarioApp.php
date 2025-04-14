<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Helpers\DBHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UsuarioApp extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * Para evitar que se registre fecha de registro y edición automáticamente
   *
   * @access public
   * @var bool
   */
  public $timestamps = FALSE;

  /**
   * Indicador del nombre de la tabla a la que hace referencia
   *
   * @access protected
   * @var string
   */
  protected $table = DBHelper::AUTH02_USUARIO;

  /**
   * Indicador del nombre de la clave primaria
   *
   * @access protected
   * @var string
   */
  protected $primaryKey = 'pkUsuario';

  /**
   * Atributos que se pueden registrar en el objeto.
   *
   * @access protected
   * @var array
   */
  protected $fillable = [
    'fkRol',

    'nombre',
    'apellido1',
    'apellido2',
    'telefono',
    'correo',
    'contrasenia',

    'estado',
    'token',
    'usrReg',
    'fechaReg',
    'usrMod',
    'fechaMod',
    'borrado',
    'fechaBorrado',
  ];

  /**
   * Atributos que permanecen ocultos en el objeto.
   *
   * @access protected
   * @var array
   */
  protected $hidden = [
    'contrasenia',

    'usrReg',
    'fechaReg',
    'usrMod',
    'fechaMod',
    'borrado',
    'fechaBorrado',
  ];

  /**
   * Función para indicar el nombre de usuario para el login
   *
   * @return string
   */
  public function username(): string
  {
    return 'correo';
  }

  /**
   * Función para indicar el nombre del campo para la contraseña en el login
   *
   * @return string
   */
  public function getAuthPassword(): string
  {
    return $this->contrasenia;
  }

  /**
   * Obtener el rol
   */
  public function rol(): BelongsTo
  {
    return $this->belongsTo(Rol::class, 'fkRol', 'pkRol');
  }
}

