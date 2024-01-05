<?php

namespace App\View;

class View
{
    /**
     * Views directory path
     *
     * @var string
     */
    private static $path = __DIR__ . '/../../views';

    /**
     * Views template name
     *
     * @var string
     */
    private static $template = 'index.php';

    /**
     * Render a view
     *
     * @param string $view
     * @param array $parameters
     * @return mixed
     */
    public static function render($view, $parameters = [])
    {
        $content = self::getContents(self::$path . '/' . $view, $parameters);
        require self::$path . '/' . self::$template;
    }

    /**
     * Get contents of the view
     *
     * @param string $file
     * @param array $parameters
     * @return mixed
     */
    public static function getContents($file, $parameters = [])
    {
        extract($parameters, EXTR_SKIP);
        unset($parameters);

        ob_start();
        require $file;
        unset($file);

        return ob_get_clean();
    }
}
