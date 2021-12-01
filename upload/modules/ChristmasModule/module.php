<?php

namespace ChristmasModule;

use Config;

class ChristmasModule extends \Module {
    function __construct(\Pages $pages) {
        parent::__construct($this, 'ChristmasModule', '<a href="https://namelessmc.com/profile/zJerino/">zJerino</a>', '1.0.0', NAMELESS_VERSION);

        $pages->add('ChristmasModule', '/panel/ChristmasModule/config', 'pages/panel/config.php');
    }

    function onInstall() {}

    function onUninstall() {}

    function onEnable() {}

    function onDisable() {}

    function onPageLoad($user, $pages, $cache, $smarty, $navs, $widgets, $template) {
        if (defined('FRONT_END') && FRONT_END && $template instanceof \TemplateBase) {
            $classname = 'Particles-' . uniqid();
            $template->addCSSStyle('
                #'.$classname.', #'.$classname.' canvas {
                    position: fixed;
                    z-index: 100000;
                    display: block;
                    width: 100%;
                    height: 100%;
                    top: 0;
                    left: 0;
                    touch-action: none;
                    user-select: none;
                    pointer-events: none;
                }
            ');
            $template->addJSFiles(array(
                rtrim(str_replace(Config::get('general/path'), '\\', '/'), '/') . '/modules/ChristmasModule/public/js/particles.min.js' => array()
            ));


            $template->addJSScript('
                console.log("'.$this->getName().': '.$this->getVersion().' \nBy '.str_replace('"','\'', $this->getAuthor()).'");
                
                let divqqq = document.createElement(\'div\'); divqqq.id = \''.$classname.'\'; document.body.appendChild(divqqq);
                  
                let particles = new particlesJS(\''.$classname.'\', '.file_get_contents(__DIR__ . '/public/particles.json').');
            ');
        }
        $cmLanguage = new \Language(__DIR__ . '/language', LANGUAGE);

        if (defined('BACK_END')) {
            $navs[2]->add('christmasmodule_divider', mb_strtoupper($cmLanguage->get('general', 'title')), 'divider', 'top', null, 9999, '');
            $navs[2]->add('christmasmodule_configuration', $cmLanguage->get('general', 'title'), \URL::build('/panel/ChristmasModule/config'), 'top', null, 10000, "");
        }
    }
}

$module = new ChristmasModule($pages);