<?php
/**
 * Obtiene el contenido de una vista.
 *
 * Esta función carga un archivo PHP especificado por la ruta dada,
 * captura su salida y la devuelve como una cadena.
 *
 * @param string $path La ruta del archivo PHP que se va a cargar.
 * @return bool|string El contenido del archivo como una cadena, o false si ocurre un error.
 */
function get_view_content(string $path): bool|string
{
  ob_start();
  require_once $path;
  return ob_get_clean();
}