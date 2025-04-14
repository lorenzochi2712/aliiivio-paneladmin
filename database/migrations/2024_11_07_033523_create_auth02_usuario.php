<?php

use App\Helpers\DBHelper;
use App\Helpers\UserHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @access public
   * @return void
   *
   * @version 1.0
   * @author InovaSoft Proyectos <contacto@inovasoft.com.mx>
   * Tabla usuarios administradores
   */
  public function up(): void
  {
    Schema::create(DBHelper::AUTH02_USUARIO, function (Blueprint $table) {
      /* Keys */
      $table->bigIncrements('pkUsuario');

      $table->unsignedBigInteger('fkRol');
      $table->foreign('fkRol', 'fkRolAuth02')
        ->references('pkRol')->on(DBHelper::AUTH01_ROL);

      /* Datos personales */
      $table->string('nombre', 100);
      $table->string('apellido1', 100)->nullable();
      $table->string('apellido2', 100)->nullable();
      $table->string('telefono', 50)->nullable();

      /* Datos de inicio de sesión */
      $table->string('correo', 100)->unique();
      $table->string('contrasenia', 100)->nullable();

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
    $data = [
      [
        'pkUsuario' => 1,
        'token' => md5(1 . date('Y-m-d H:i:s')) . 1,
        'fkRol' => UserHelper::ROL_ADMIN_PK,
        'nombre' => 'Lorenzo',
        'apellido1' => 'Chino',
        'apellido2' => 'Moreno',
        'correo' => 'admin@aliiivio.com',
        'contrasenia' => bcrypt('admin123'),
        'usrReg' => 0,
      ],
      [
        'pkUsuario' => 2,
        'token' => md5(2 . date('Y-m-d H:i:s')) . 2,
        'fkRol' => UserHelper::ROL_REG_PK,
        'nombre' => 'Reg',
        'apellido1' => 'Reg',
        'apellido2' => 'Reg',
        'correo' => 'reg@plataforma.com',
        'contrasenia' => bcrypt('123qweZXC'),
        'usrReg' => 0,
      ],
    ];

    DB::table(DBHelper::AUTH02_USUARIO)->insert($data);
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
    Schema::dropIfExists(DBHelper::AUTH02_USUARIO);
  }
};
