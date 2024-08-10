<?php
require_once __DIR__ . '/get_view_content.php';
/**
 * Renderiza una página web utilizando un layout y contenido específico.
 * @param array $data Array que contiene la información necesaria para renderizar la página.
 *                    El primer elemento debe ser el nombre de la pagina.
 *                    El segundo elemento debe ser un array asociativo con las variables que se desean pasar a la vista.
 * @param string|null $layout String opcional que especifica el layout a utilizar. Por defecto, es 'default'.
 * @throws Exception Si el primer elemento del array $data no está definido.
 * @return void
 */
function render_page(array $data, ?string $layout = 'default'): void
{
  if (!array_key_exists(0, $data) or !is_string($data[0])) {
    throw new Exception('El primer elemento del array $data debe ser el nombre de la página.');
  }
  $page = $data[0];

  $layout_content = get_view_content(sprintf('%s/%s.php', LAYOUTS_DIR, $layout));
  $content = get_view_content($page);

  $html = preg_replace('/{{\s*content\s*}}/', $content, $layout_content);
  if (!empty($data[1])) {
    foreach ($data[1] as $key => $value) {
      $html = preg_replace('/{{\s*' . $key . '\s*}}/', $value, $html);
    }
  }

  echo $html;
}