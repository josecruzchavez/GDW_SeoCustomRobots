# GDW Seo Custom Robots para Magento 2
Este módulo tiene la finalidad de personalizar las meta etiqueta Robots de magento 2.
La meta etiqueta Robots sirve para que google identifique si debe rastrear una url que ha encontrado en un sitio web. Magento por deafult solo trae una opción y esta es global, este módulo habilita nuevos atributos para productos, categorias y páginas para poder personalizar la meta etiqueta robots en cada ocación.
## Compatibilidad
✓ Magento 2.3.x, ✓ Magento 2.4.x

![gdw_opengraph](https://php.gdw.mx/github_assets/gdw_seocustomrobots/gdw_seocustomrobots_01.jpg)

## Funciones destacadas
* Agrega meta etiqueta **Robots** en páginas(cms), productos y categorías.
* Permite habilitar la sobre escritura desde el administrador.
* Utiliza los campos meta nativos de magento.
* Compaltible con multitiendas.
* Permite listar **FullActionsNames** para modificar la etiqueta robots en zonas que no son importantes para el rastreo de google
<br/>

###### Ejecuta los siguientes comandos en la ruta base de Magento.

### Instalación

```
composer require gdw/seocustomrobots

php bin/magento module:enable GDW_SeoCustomRobots
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush
```

### Actualización

```
composer update gdw/seocustomrobots

php bin/magento module:enable GDW_SeoCustomRobots
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush
```

### Eliminación

```
php bin/magento module:disbale GDW_SeoCustomRobots
composer remove gdw/seocustomrobots
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush
```

### Expresiones de Gratitud

* 📢 Comenta a otros sobre este proyecto.
* 👨🏽‍💻 Da las gracias públicamente.
* [🍺 Invítame una cerveza](https://www.paypal.me/gestiondigitalweb)


### Otros enlaces

* [Sitio web](https://gdw.mx/?utm_source=github&utm_medium=gdw&utm_campaign=seocustomrobots&utm_id=link)
* [Listado de Módulos](https://gdw.mx/modulos)
* [Facebook](https://www.facebook.com/GestionDigitalWeb)
* [Youtube](https://www.youtube.com/c/Gestiondigitalweb)