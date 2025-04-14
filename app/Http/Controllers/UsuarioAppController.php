<?php

namespace App\Http\Controllers;

use App\Helpers\GeneralHelper;
use App\Models\Rol;
use App\Models\UsuarioApp;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Dashboard
 * @version 1.0
 *
 * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
 */
class UsuarioAppController extends Controller
{
  /**
   * Instancia de la clase Request
   * @access private
   * @var $request Request
   */
  private $request;

  /**
   * PublicController constructor.
   * @param Request $request Request de entrada
   *
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  function __construct(Request $request)
  {
    $this->request = $request;
  }

  /**
   * Función que muestra la página de inicio del módulo de usuarios
   *
   * @return View|RedirectResponse
   * @throws ContainerExceptionInterface
   * @throws NotFoundExceptionInterface
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public function index(): View|RedirectResponse
  {
    # Recuperar todos los usuarios de la BD
    $filtros = [
      'borrado' => GeneralHelper::BORRADO_NO,
      'estado' => GeneralHelper::ACTIVO_SI
    ];

    $usuarios = Usuario::where($filtros)->get();

    $data = [
      'usuarios' => $usuarios,
    ];

    return view('usuario/index', $data);
  }

  /**
   * Función que muestra el formulario para registrar un usuario
   *
   * @return View|RedirectResponse
   * @throws Exception
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public function create(): View|RedirectResponse
  {
    $data = [
      'roles' => Rol::where('borrado', GeneralHelper::BORRADO_NO)->where('estado', GeneralHelper::ACTIVO_SI)->get(),
    ];

    return view('usuario/create', $data);
  }

  /**
   * Función que registra un usuario en la base de datos
   *
   * @return View|RedirectResponse
   * @throws Exception
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public function save(): View|RedirectResponse
  {
    # Realizar validaciones
    $datosRegistrar = $this->request->only('nombre', 'apellido1', 'apellido2', 'correo', 'contrasenia', 'rol');
    $result = Validator::make($datosRegistrar, [
      'nombre' => 'required|max:100',
      'apellido1' => 'required|max:100',
      'apellido2' => 'required|max:100',
      'correo' => 'required|email|max:100|unique:auth02_usuario,correo',
      'contrasenia' => 'required|max:50',
      'rol' => 'required',
    ]);

    if ($result->fails()) {
      # No pasa validaciones
      return redirect()->to('admin/usuario/create')
        ->withErrors($result)
        ->withInput();
    }

    if ($rol = Rol::find($datosRegistrar['rol'])) {
      unset($datosRegistrar['rol']);
      $datosRegistrar['fkRol'] = $rol->pkRol;
      $datosRegistrar['contrasenia'] = bcrypt($datosRegistrar['contrasenia']);
      $datosRegistrar['token'] = md5($datosRegistrar['correo'] . date('YmdHis'));

      if (Usuario::create($datosRegistrar)) {
        return redirect()->to('admin/usuario')
          ->with('data', ['class' => 'success', 'message' => 'Operación realizada con éxito']);
      } else {
        return redirect()->to('admin/usuario')
          ->with('data', ['class' => 'warning', 'message' => 'Ha ocurrido un error']);
      }
    }

    return redirect()->to('admin/usuario')
      ->with('data', ['class' => 'warning', 'message' => 'Ha ocurrido un error']);
  }

  /**
   * Función que muestra el formulario con los datos de un usuario para edición
   *
   * @return View|RedirectResponse
   * @throws Exception
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public function show(string $token)
  {
    $datosFiltro = [
      'token' => $token,
      'borrado' => GeneralHelper::BORRADO_NO
    ];

    if ($usuario = Usuario::where($datosFiltro)->first()) {
      # Entramos cuando sí lo encuentra
      $data = [
        'usuario' => $usuario,

        'roles' => Rol::where('borrado', 0)->where('estado', 1)->get(),
      ];

      return view('usuario/show', $data);
    }

    # No se encontró el usuario
    return redirect()
      ->to('admin/usuario')
      ->with('data', ['class' => 'warning', 'message' => 'No se encontró el usuario']);
  }

  /**
   * Función que muestra edita un usuario en la base de datos
   *
   * @return View|RedirectResponse
   * @throws Exception
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public function edit(): View|RedirectResponse
  {
    # Realizar validaciones
    $datosRegistrar = $this->request->only('token', 'nombre', 'apellido1', 'apellido2', 'correo', 'contrasenia', 'rol');
    $result = Validator::make($datosRegistrar, [
      'token' => 'required|max:100',
      'nombre' => 'required|max:100',
      'apellido1' => 'required|max:100',
      'apellido2' => 'required|max:100',
      'correo' => 'required|email|max:100|unique:auth02_usuario,correo,' . $datosRegistrar['token'] . ',token',
      'contrasenia' => 'nullable|max:50',
      'rol' => 'required',
    ]);

    if ($result->fails()) {
      # No pasa validaciones
      return redirect()->to('admin/usuario/show/' . $datosRegistrar['token'])
        ->withErrors($result)
        ->withInput();
    }

    if ($rol = Rol::find($datosRegistrar['rol'])) {
      unset($datosRegistrar['rol']);
      $datosRegistrar['fkRol'] = $rol->pkRol;

      if ($datosRegistrar['contrasenia']) {
        $datosRegistrar['contrasenia'] = bcrypt($datosRegistrar['contrasenia']);
      }

      if ($usuario = Usuario::where('token', $datosRegistrar['token'])->first()) {
        if ($usuario->fill($datosRegistrar)->save()) {
          return redirect()->to('admin/usuario')
            ->with('data', ['class' => 'success', 'message' => 'Operación realizada con éxito']);
        }
      } else {
        return redirect()->to('admin/usuario')
          ->with('data', ['class' => 'warning', 'message' => 'Ha ocurrido un error']);
      }
    }

    return redirect()
      ->to('admin/usuario')
      ->with('data', ['class' => 'warning', 'message' => 'No se encontró el usuario']);
  }

  /**
   * Función que elimina (lógica) un usuario de la base de datos
   *
   * @return void
   * @throws Exception
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public function delete(): void
  {
    $result = 0;
    $message = '';

    if ($this->request->token) {
      # Sí viene un token
      if ($usuario = Usuario::where('token', $this->request->token)->first()) {
        $usuario->correo = $usuario->correo . ';' . date('YHis');
        $usuario->estado = 0;
        $usuario->token = $usuario->token . ';borrado';
        $usuario->borrado = GeneralHelper::BORRADO_SI;
        $usuario->fechaBorrado = date('Y-m-d H:i:s');

        $result = $usuario->save();

        $result = 1;
      }
    }

    echo json_encode([
      'result' => $result,
      'message' => $message,
    ]);
  }
}
