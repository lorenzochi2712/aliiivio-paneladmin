<?php

use App\Helpers\DBHelper;
use App\Helpers\UserHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * @version 1.0
 * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
 */
return new class extends Migration {

  /**
   * Run the migrations.
   *
   * @access public
   * @return void
   *
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public function up(): void
  {
    Schema::create(DBHelper::AUTH01_ROL, function (Blueprint $table) {
      /* Keys */
      $table->bigIncrements('pkRol');

      /* Data */
      $table->string('nombre', 100);
      $table->string('abreviatura', 10);

      # Agregar campos comunes a la tabla (token, estado, auditoría y configuración de collation)
      DBHelper::fillTable($table);
    });

    /* Inserts iniciales */
    $this->populateTable();
  }

  /**
   * Función para poblar la tabla
   *
   * @access private
   * @return void
   *
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  private function populateTable(): void
  {
    $md5 = md5(date('YmdHis'));
    $data = [
      [
        'pkRol' => UserHelper::ROL_ADMIN_PK,
        'token' => $md5 . UserHelper::ROL_ADMIN_PK,
        'nombre' => 'Administrador',
        'abreviatura' => UserHelper::ROL_ADMIN_ABR,
        'usrReg' => 0
      ],
      [
        'pkRol' => UserHelper::ROL_REG_PK,
        'token' => $md5 . UserHelper::ROL_REG_PK,
        'nombre' => 'Regular',
        'abreviatura' => UserHelper::ROL_REG_ABR,
        'usrReg' => 0
      ],
    ];

    DB::table(DBHelper::AUTH01_ROL)->insert($data);
  }

  /**
   * Reverse the migrations.
   *
   * @access public
   * @return void
   *
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public function down(): void
  {
    Schema::dropIfExists(DBHelper::AUTH01_ROL);
  }
};
