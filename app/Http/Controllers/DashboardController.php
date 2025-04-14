<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Dashboard
 * @version 1.0
 *
 * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
 */
class DashboardController extends Controller
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
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public function index(): View|RedirectResponse
  {
    return view('dashboard/index');
  }
}
