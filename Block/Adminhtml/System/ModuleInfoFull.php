<?php
namespace GDW\SeoCustomRobots\Block\Adminhtml\System;

use GDW\Core\Block\Adminhtml\System\Core\ModuleInfoFull as Fieldset;

class ModuleInfoFull extends Fieldset
{    
    const GDW_MODULE_CODE = 'GDW_SeoCustomRobots';
    const GDW_MODULE_LINK = 'adminhtml/system_config/edit/section/gdwseo';
    const GDW_MODULE_LINK_SECC = '#gdwseo_robots-link';

    public function getDescFull()
    {
        $html  = '<p>Este módulo tiene la finalidad de personalizar las meta etiqueta Robots de magento 2.</p>';
        $html .= '<p>La meta etiqueta Robots sirve para que google identifique si debe rastrear una url que ha encontrado en un sitio web. Magento por deafult solo trae una opción y es global, este módulo habilita nuevos atributos para productos, categorías y páginas para poder personalizar la meta etiqueta robots en cada ocación.</p>';
        return $html;
    }
}