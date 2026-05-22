<?php
declare(strict_types=1);

namespace GDW\SeoCustomRobots\Helper;

final class GdwModuleMeta
{
    /** @return array{desc:string, config_path:string, config_anchor:string, repo_url:string, docs_url:string} */
    public static function getMeta(): array
    {
        return [
            'desc' => 'Personaliza la meta etiqueta robots para productos, categorias y paginas CMS.',
            'config_path' => 'adminhtml/system_config/edit/section/gdwseo',
            'config_anchor' => '#gdwseo_robots-link',
            'repo_url' => 'https://github.com/josecruzchavez/GDW_SeoCustomRobots',
            'docs_url' => 'https://docs.gdw.mx/modulos/gdw_seocustomrobots',
        ];
    }
}