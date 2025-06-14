<?php

namespace Core\Core;

class View
{
    private string $layout;
    private string $content;

    public function __construct(string $layout)
    {
        $this->layout = $layout;
    }

    public function render(string $content, array $data = [], string|null|false $layout = null)
    {
        extract($data);
        $pathToContent = DIR_VIEWS . "/{$content}.php";

        if (!file_exists($pathToContent)) {
            throw new \Exception("Content not found: {$pathToContent}");
        }

        ob_start();
        require $pathToContent;
        $this->content = ob_get_clean();

        if ($layout === false) {
            echo $this->content;
            return;
        }

        $layout = $layout ?? $this->layout;
        $pathToLayout = DIR_VIEWS . "/layouts/{$layout}.php";

        if (!file_exists($pathToLayout)) {
            throw new \Exception("Layout not found: {$pathToLayout}");
        }

        require_once $pathToLayout;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}