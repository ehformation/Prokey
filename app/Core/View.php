<?php

namespace App\Core;
class View {

    public static function render(string $view, array $data = [])
    {
        $viewFile = __DIR__ . '/../Views/' . $view . '.php';

        if (!file_exists($viewFile)) {
            throw new \Exception("Vue non trouvé : $viewFile");
        }

        extract($data);

        ob_start();
        include $viewFile;
        $content = ob_get_clean();

        $layoutPath = __DIR__ . '/../Views/layout/main.php';

        ob_start();
        include $layoutPath;
        return ob_get_clean();
    }
}