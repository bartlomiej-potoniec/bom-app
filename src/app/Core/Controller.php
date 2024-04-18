<?php

namespace App\Core;


class Controller
{
    private const MODELS_PATH = '../src/app/Models';
    private const VIEWS_PATH = '../src/app/Views/';

    protected function model(string $model = ''): object
    {
        require_once self::MODELS_PATH . $model . '.php';
        return new $model();
    }

    protected function view(string $view = '', array $data = []): void
    {
        $view = self::VIEWS_PATH . $view . '.php';

        if (!file_exists($view)) {
            die('View does not exist');
        }

        require_once $view;
    }

    protected function redirect(string $path): void
    {
        header('Location: ' . URL_ROOT . $path);
        return;
    }
}