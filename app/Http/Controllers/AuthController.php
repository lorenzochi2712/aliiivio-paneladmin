<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as AuthSystem;
use Illuminate\Support\Facades\Validator;

/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 * @version 1.0
 *
 * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
 */
class AuthController extends Controller
{

  /**
   * Instancia de la clase Request
   * @access private
   * @var $request Request
   */
  private Request $request;

  /**
   * LoginController constructor.
   *
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  /**
   * Función para mostrar el formulario de inicio de sesión
   *
   * @return View
   *
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public function index(): View
  {
    return view('auth/login/login');
  }

  /**
   * Función para iniciar sesión
   *
   * @return RedirectResponse
   *
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public function login(): RedirectResponse
  {
    if (auth()->check()) {
      return redirect()->to('admin');
    }

    $credentials = $this->request->only('correo', 'contrasenia');
    $result = Validator::make($credentials, [
      'correo' => 'required|email|max:100',
      'contrasenia' => 'required|min:6|max:20'
    ]);

    if ($result->fails()) {
      # No pasa validaciones
      return redirect()->to('auth/login')
        ->withErrors($result)
        ->withInput();
    }

    # Sí pasa validaciones
    if (AuthSystem::attempt(['correo' => $credentials['correo'], 'password' => $credentials['contrasenia']])) {
      $this->request->session()->regenerate();

      return redirect()->to('admin');
    }

    # No se pudo iniciar sesión
    return redirect()->to('auth/login')
      ->with('data', ['class' => 'warning', 'message' => 'Verifique sus credenciales'])
      ->withInput();
  }

  /**
   * Función para cerrar sesión
   *
   * @return RedirectResponse
   *
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public function logout(): RedirectResponse
  {
    AuthSystem::logout();

    return redirect()->to('');
  }
}
