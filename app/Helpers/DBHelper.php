<?php

namespace App\Helpers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

/**
 * Class DBHelper
 * @package App\Helpers
 * @version 1.0
 *
 * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
 */
class DBHelper
{
  # Tablas de bases de datos de usuarios y auth
  const AUTH01_ROL = 'auth01_rol';
  const AUTH02_USUARIO = 'auth02_usuario';

  # Tablas de bases de datos para almacenamiento de archivos
  const PROC01_CARPETA = 'proc01_carpeta';
  const PROC02_ARCHIVO = 'proc02_archivo';

  /**
   * Función para complementar la tabla
   * <br>
   * Esta función se utiliza para agregar las columnas <br> y configuraciones comunes de las tablas
   *
   * @static
   * @param Blueprint &$table referencia del objeto de la tabla
   * @param bool $estado Define si se incluye el estado o no
   * @return void
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public static function fillTable(Blueprint &$table, bool $estado = true): void
  {
    if ($estado) {
      $table->unsignedSmallInteger('estado')->default(GeneralHelper::ACTIVO_SI);
    }
    $table->string('token', 50)->nullable();
    $table->unsignedInteger('usrReg')->nullable();
    $table->dateTime('fechaReg')->default(DB::raw('CURRENT_TIMESTAMP'));
    $table->unsignedInteger('usrMod')->nullable();
    $table->dateTime('fechaMod')->nullable();
    $table->unsignedSmallInteger('borrado')->default(GeneralHelper::BORRADO_NO);
    $table->dateTime('fechaBorrado')->nullable();

    /* Table */
    $table->engine = 'InnoDB';
    $table->charset = 'latin1';
    $table->collation = 'latin1_spanish_ci';
  }
}
