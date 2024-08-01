<?php
require_once UTILS_DIR . '/get_view_content.php';
function render_page(string $page, ?string $layout = 'default', ?array $data = []): void
{

  $layout_content = get_view_content(sprintf('%s/%s.php', LAYOUTS_DIR, $layout));
  $content = get_view_content($page);
  $html = preg_replace('/{{\s*content\s*}}/', $content, $layout_content);

  if (!empty($data)) {
    foreach ($data as $key => $value) {
      $html = preg_replace('/{{\s*' . $key . '\s*}}/', $value, $html);
    }
  }

  echo $html;
}