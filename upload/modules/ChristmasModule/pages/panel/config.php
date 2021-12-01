<?php


if(!$user->handlePanelPageLoad('admincp.core.general')) {
    require_once(ROOT_PATH . '/403.php');
    die();
}

define('PAGE', 'panel');
define('PARENT_PAGE', 'christmasmodule_configuration');
define('PANEL_PAGE', 'christmasmodule_configuration');
$page_title = $cmLanguage->get('general', 'title');
require_once(ROOT_PATH . '/core/templates/backend_init.php');
require_once(__DIR__ . '/../../include/check-config.php');


/**
 * Proceiendo de cambios
 */
$errors = array();


if (Input::exists() && isset($_FILES['config'])) {
    if (Token::check()) {
        try {
            if ($_FILES['config']['type'] !== 'application/json' || $_FILES['config']['size'] >= 5000) {
                $e = $cmLanguage->get('general', 'file_error');
                throw new Exception($e);
            }

            $file = file_get_contents($_FILES['config']['tmp_name']);
            $json = json_decode($file, true);

            if (is_array($json) && ParticlesJS::CheckConfig($json)) {
                $content = json_encode($json, JSON_PRETTY_PRINT);
                $filename = ROOT_PATH . '/modules/ChristmasModule/public/particles.json';

                $myconfig = fopen($filename, "w+") or $errors[] = "The ChristmasModule configuration file is not writable, try using 'sudo chown www-data:www-data -R ".ROOT_PATH."' if it does not work try 'sudo chmod -R 0777 ".ROOT_PATH."'.";
                fwrite($myconfig, $content);
                fclose($myconfig);


                if (count($errors) == 0) {
                    $success = $language->get('admin', 'successfully_updated');
                }
            } else {
                $errors[] = $cmLanguage->get('general', 'file_error');
            }
        } catch (Exception $e) {
            $errors[] = $cmLanguage->get('general', 'unknown_error');
            $errors[] = $e->getMessage();
        }
    } else {
        // Bad Token
        $errors[] = $language->get('general', 'invalid_token');
    }
}


// Load modules + template
Module::loadPage($user, $pages, $cache, $smarty, array($navigation, $cc_nav, $mod_nav), $widgets);

$smarty->assign(array(
    'ERRORS' => $errors,
    'ERRORS_TITLE' => $language->get('general', 'error')
));


if (isset($success))
    $smarty->assign(array(
        'SUCCESS' => $success,
        'SUCCESS_TITLE' => $language->get('general', 'success')
    ));

$gen_config = 'https://vincentgarreau.com/particles.js/#snow';


$smarty->assign(array(
    'PARENT_PAGE' => PARENT_PAGE,
    'DASHBOARD' => $language->get('admin', 'dashboard'),
    'CONFIGURATION' => $language->get('admin', 'configuration'),
    'FILENAME' => $cmLanguage->get('general', 'file_name'),
    'UPLOAD_CONFIG' => $cmLanguage->get('general', 'upload_btn'),
    'CHANGE_CONFIG' => $cmLanguage->get('general', 'change_config'),
    'GEN_CONFIG' => $cmLanguage->get('general', 'gen_config'),
    'CLICK_TO_GO' => $cmLanguage->get('general', 'click_to_go'),
    'GEN_CONFIG_SITE' => $gen_config,
    'PAGE' => PANEL_PAGE,
    'TOKEN' => Token::get(),
    'SUBMIT' => $language->get('general', 'submit'),
    'DRAG_FILES_HERE' => $language->get('admin', 'drag_files_here'),
    'CLOSE' => $language->get('general', 'close')
));

$page_load = microtime(true) - $start;
define('PAGE_LOAD_TIME', str_replace('{x}', round($page_load, 3), $language->get('general', 'page_loaded_in')));

$template->onPageLoad();

require(ROOT_PATH . '/core/templates/panel_navbar.php');

// Display template
$template->displayTemplate('ChristmasModule/config.tpl', $smarty);