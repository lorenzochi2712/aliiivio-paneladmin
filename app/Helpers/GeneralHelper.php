<?php

namespace App\Helpers;

/**
 * Class GeneralHelper
 * @package App\Helpers
 * @version 1.0
 *
 * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
 */
class GeneralHelper
{
  const BORRADO_SI = 1;
  const BORRADO_NO = 0;

  const SI = 1;
  const NO = 0;

  // estado de registros
  const ACTIVO_SI = 1;
  const ACTIVO_NO = 0;
  const SESION_INICIADA = 1;

  // estatus de la sesión
  const SESION_CERRADA = 2;
  const SESION_FINALIZADA = 3;
  const MAIL_ENVIADO_SI = 1;
  const MAIL_ENVIADO_NO = 2;

  // estatus de envío de correos
  const MAIL_REENVIADO_SI = 3;
  const MAIL_REENVIADO_NO = 4;
  const ERROR_ACTIVO = 1;
  const ERROR_ATENDIDO = 0;
  const TOKEN_GENERADO = 1;

  // estatus de errores
  const TOKEN_UTILIZADO = 2;
  const TOKEN_CADUCADO = 3;
  const NOTIFICACION_GENERADA = 1;

  // estatus de cambio de contraseña
  const NOTIFICACION_VISTA = 0;
  const BIT_REGISTRO = 1;
  const BIT_EDICION = 2;
  const BIT_ELIMINACION = 3;

  // estatus de notificaciones
  const BIT_CAMBIO_CONTRASENIA = 4;
  const REG_POR_PAG = 200;

  // Grados de estudio
  const GRADO_PRIMARIA = 1;
  const GRADO_SECUNDARIA = 2;
  const GRADO_BACHILLERATO = 3;
  const GRADO_LICENCIATURA = 4;
  const GRADO_MAESTRIA = 5;
  const GRADO_DOCTORADO = 6;

  /**
   * Función para convertir un valor en su cadena respectiva
   *
   * @static
   * @param int $value
   * @return string
   * @version  1.0
   *
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public static function estado(int $value): string
  {
    switch ($value) {
      case self::ACTIVO_SI:
        return 'Activo';
      case self::ACTIVO_NO:
        return 'Inactivo';
      default:
        return 'Estado desconocido';
    }
  }

  // estatus de bitácora

  /**
   * Función para convertir un valor en su cadena respectiva
   *
   * @static
   * @param int $value
   * @return string
   * @version  1.0
   *
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public static function sesion(int $value): string
  {
    switch ($value) {
      case self::SESION_INICIADA:
        return 'Sesión iniciada';
      case self::SESION_CERRADA:
        return 'Sesión cerrada';
      case self::SESION_FINALIZADA:
        return 'Sesión finalizada';
      default:
        return 'Sesión desconocida';
    }
  }

  /**
   * Función para convertir un valor en su cadena respectiva
   *
   * @static
   * @param int $value
   * @return string
   * @version  1.0
   *
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public static function correo(int $value): string
  {
    switch ($value) {
      case self::MAIL_ENVIADO_SI:
        return 'Correo enviado';
      case self::MAIL_ENVIADO_NO:
        return 'Error al enviar correo';
      case self::MAIL_REENVIADO_SI:
        return 'Correo reenviado';
      case self::MAIL_REENVIADO_NO:
        return 'Error al reenviar correo';
      default:
        return 'Correo desconocido';
    }
  }

  /**
   * Función para convertir un valor en su cadena respectiva
   *
   * @static
   * @param int $value
   * @return string
   * @version  1.0
   *
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public static function error(int $value): string
  {
    switch ($value) {
      case self::ERROR_ACTIVO:
        return 'Error activo';
      case self::ERROR_ATENDIDO:
        return 'Error atendido';
      default:
        return 'Error desconocido';
    }
  }

  /**
   * Función para convertir un valor en su cadena respectiva
   *
   * @static
   * @param int $value
   * @return string
   * @version  1.0
   *
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public static function token_contrasenia(int $value): string
  {
    switch ($value) {
      case self::TOKEN_GENERADO:
        return 'Token generado';
      case self::TOKEN_UTILIZADO:
        return 'Token utilizado';
      case self::TOKEN_CADUCADO:
        return 'Token caducado';
      default:
        return 'Token desconocido';
    }
  }

  /**
   * Función para convertir un valor en su cadena respectiva
   *
   * @static
   * @param int $value
   * @return string
   * @version  1.0
   *
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public static function notificacion(int $value): string
  {
    switch ($value) {
      case self::NOTIFICACION_GENERADA:
        return 'Notificación generada';
      case self::NOTIFICACION_VISTA:
        return 'Notificación vista';
      default:
        return 'Notificación desconocida';
    }
  }

  /**
   * Función para convertir un valor en su cadena respectiva
   *
   * @static
   * @param int $value
   * @return string
   * @version  1.0
   *
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public static function bitacora(int $value): string
  {
    switch ($value) {
      case self::BIT_REGISTRO:
        return 'Bitácora registro';
      case self::BIT_EDICION:
        return 'Bitácora edición';
      case self::BIT_ELIMINACION:
        return 'Bitácora eliminación';
      case self::BIT_CAMBIO_CONTRASENIA:
        return 'Bitácora cambio de contraseña';
      default:
        return 'Bitácora desconocida';
    }
  }

  /**
   * Función para convertir un valor en su cadena respectiva
   *
   * @static
   * @param int $value
   * @return string
   * @version  1.0
   *
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public static function traduceGrado(int $value): string
  {
    switch ($value) {
      case self::GRADO_PRIMARIA:
        return 'Primaria';
      case self::GRADO_SECUNDARIA:
        return 'Secundaria';
      case self::GRADO_BACHILLERATO:
        return 'Bachillerato';
      case self::GRADO_LICENCIATURA:
        return 'Licenciatura';
      case self::GRADO_MAESTRIA:
        return 'Maestría';
      case self::GRADO_DOCTORADO:
        return 'Doctorado';
      default:
        return 'Grado de estudio desconocido';
    }
  }

  // Datos para paginación

  /**
   * Función para generar una clave numérica de forma aleatoria
   *
   * @param int $tamanio Tamaño de la clave a generar
   * @param bool $mayusculas Indica si es mayúsculas o minúsculas
   * @return string*
   * @version 1.0
   * @author CCUBajío Proyectos <contacto@ccubajio.com.mx>
   */
  public static function getRandomKey(int $tamanio = 8, bool $mayusculas = true): string
  {
    $clave = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, $tamanio);
    return ($mayusculas) ? mb_strtoupper($clave) : $clave;
  }
}
