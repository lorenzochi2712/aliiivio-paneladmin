<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 * @package App\Models\Auth
 * @version 1.0
 *
 * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
 */
class Rol extends Model
{
  use HasFactory;

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
  protected $table = 'auth01_rol';

  /**
   * Indicador del nombre de la clave primaria
   *
   * @access protected
   * @var string
   */
  protected $primaryKey = 'pkRol';

  /**
   * Atributos que se pueden registrar en el objeto.
   *
   * @access protected
   * @var array
   */
  protected $fillable = [
    'token',

    'nombre',
    'abreviatura',
    'estado',

    'usrReg',
    'fechaRegistro',
    'usuarioModificacion',
    'fechaModificacion',
    'borrado',
    'fechaBorrado',
    'bitacora',
  ];

  /**
   * Atributos que permanecen ocultos en el objeto.
   *
   * @access protected
   * @var array
   */
  protected $hidden = [
    'usrReg',
    'fechaRegistro',
    'usuarioModificacion',
    'fechaModificacion',
    'borrado',
    'fechaBorrado',
    'bitacora',
  ];
}
