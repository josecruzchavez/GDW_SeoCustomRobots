<?php
namespace GDW\SeoCustomRobots\Model;

class Robots extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
                implements \Magento\Framework\Option\ArrayInterface {
    
    /* In the product attributes it is necessary to call options */
    public function getAllOptions(){
        return [
            ['value' => 'INDEX,FOLLOW', 'label' => 'INDEX, FOLLOW'],
            ['value' => 'NOINDEX,FOLLOW', 'label' => 'NOINDEX, FOLLOW'],
            ['value' => 'INDEX,NOFOLLOW', 'label' => 'INDEX, NOFOLLOW'],
            ['value' => 'NOINDEX,NOFOLLOW', 'label' => 'NOINDEX, NOFOLLOW']
        ];
    }
}