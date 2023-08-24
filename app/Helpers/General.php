<?php

namespace App\Helpers;

class General
{
    
    public static function active(mixed $routes, bool $condition = true): string
    {
        return call_user_func_array([app('router'), 'is'], (array) $routes) && $condition ? 'active' : '';
    }

    public static function is_active(mixed $routes): bool
    {
        return (bool) call_user_func_array([app('router'), 'is'], (array) $routes);
    }

    public static function md_to_html(string $markdown): string
    {
        return app(App\Markdown\Converter::class)->toHtml($markdown);
    }

    public static function replace_links(string $markdown): string
    {
        return (new LinkFinder([
            'attrs' => ['target' => '_blank', 'rel' => 'nofollow'],
        ]))->processHtml($markdown);
    }
    
    public static function canonical(string $route, array $params = []): string
    {
        $page = app('request')->get('page');
        $params = array_merge($params, ['page' => $page != 1 ? $page : null]);

        ksort($params);

        return route($route, $params);
    }
    
}