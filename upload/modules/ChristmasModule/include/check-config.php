<?php

class ParticlesJS {
    public static function CheckConfig(array $arr): bool {
        if (
            isset($arr['particles']) && is_array($arr['particles']) &&
            isset($arr['particles']['number']) && is_array($arr['particles']['number']) &&
            isset($arr['particles']['number']['value']) && is_numeric($arr['particles']['number']['value']) &&
            isset($arr['particles']['number']['density']) && is_array($arr['particles']['number']['density']) &&
            isset($arr['particles']['number']['density']['enable']) && is_bool($arr['particles']['number']['density']['enable']) &&
            isset($arr['particles']['number']['density']['value_area']) && is_numeric($arr['particles']['number']['density']['value_area']) &&

            isset($arr['particles']['color']) && is_array($arr['particles']['color']) &&
            isset($arr['particles']['color']['value']) && is_string($arr['particles']['color']['value']) &&

            isset($arr['particles']['shape']) && is_array($arr['particles']['shape']) &&
            isset($arr['particles']['shape']['type']) && is_string($arr['particles']['shape']['type']) &&
            isset($arr['particles']['shape']['stroke']) && is_array($arr['particles']['shape']['stroke']) &&
            isset($arr['particles']['shape']['stroke']['width']) && is_numeric($arr['particles']['shape']['stroke']['width']) &&
            isset($arr['particles']['shape']['stroke']['color']) && is_string($arr['particles']['shape']['stroke']['color']) &&
            isset($arr['particles']['shape']['polygon']) && is_array($arr['particles']['shape']['polygon']) &&
            isset($arr['particles']['shape']['polygon']['nb_sides']) && is_numeric($arr['particles']['shape']['polygon']['nb_sides']) &&
            isset($arr['particles']['shape']['image']) && is_array($arr['particles']['shape']['image']) &&
            isset($arr['particles']['shape']['image']['src']) && is_string($arr['particles']['shape']['image']['src']) &&
            isset($arr['particles']['shape']['image']['width']) && is_numeric($arr['particles']['shape']['image']['width']) &&
            isset($arr['particles']['shape']['image']['height']) && is_numeric($arr['particles']['shape']['image']['height']) &&
            isset($arr['particles']['opacity']) && is_array($arr['particles']['opacity']) &&
            isset($arr['particles']['opacity']['value']) && is_numeric($arr['particles']['opacity']['value']) &&
            isset($arr['particles']['opacity']['random']) && is_bool($arr['particles']['opacity']['random']) &&
            isset($arr['particles']['opacity']['anim']) && is_array($arr['particles']['opacity']['anim']) &&
            isset($arr['particles']['opacity']['anim']['enable']) && is_bool($arr['particles']['opacity']['anim']['enable']) &&
            isset($arr['particles']['opacity']['anim']['speed']) && is_numeric($arr['particles']['opacity']['anim']['speed']) &&
            isset($arr['particles']['opacity']['anim']['opacity_min']) && is_numeric($arr['particles']['opacity']['anim']['opacity_min']) &&
            isset($arr['particles']['opacity']['anim']['sync']) && is_bool($arr['particles']['opacity']['anim']['sync'])&&
            isset($arr['particles']['size']) && is_array($arr['particles']['size']) &&
            isset($arr['particles']['size']['value']) && is_numeric($arr['particles']['size']['value']) &&
            isset($arr['particles']['size']['random']) && is_bool($arr['particles']['size']['random']) &&
            isset($arr['particles']['size']['value']) && is_numeric($arr['particles']['size']['value']) &&
            isset($arr['particles']['size']['anim']) && is_array($arr['particles']['size']['anim']) &&
            isset($arr['particles']['size']['anim']['enable']) && is_bool($arr['particles']['size']['anim']['enable']) &&
            isset($arr['particles']['size']['anim']['speed']) && is_numeric($arr['particles']['size']['anim']['speed']) &&
            isset($arr['particles']['size']['anim']['size_min']) && is_numeric($arr['particles']['size']['anim']['size_min']) &&
            isset($arr['particles']['size']['anim']['sync']) && is_bool($arr['particles']['size']['anim']['sync']) &&
            isset($arr['particles']['line_linked']) && is_array($arr['particles']['line_linked']) &&
            isset($arr['particles']['line_linked']['enable']) && is_bool($arr['particles']['line_linked']['enable']) &&
            isset($arr['particles']['line_linked']['distance']) && is_numeric($arr['particles']['line_linked']['distance']) &&
            isset($arr['particles']['line_linked']['color']) && is_string($arr['particles']['line_linked']['color']) &&
            isset($arr['particles']['line_linked']['opacity']) && is_numeric($arr['particles']['line_linked']['opacity']) &&
            isset($arr['particles']['line_linked']['width']) && is_numeric($arr['particles']['line_linked']['width']) &&
            isset($arr['particles']['move']) && is_array($arr['particles']['move'])  &&
            isset($arr['particles']['move']['enable']) && is_bool($arr['particles']['move']['enable']) &&
            isset($arr['particles']['move']['speed']) && is_numeric($arr['particles']['move']['speed']) &&
            isset($arr['particles']['move']['direction']) && is_string($arr['particles']['move']['direction']) &&
            isset($arr['particles']['move']['random']) && is_bool($arr['particles']['move']['random']) &&
            isset($arr['particles']['move']['straight']) && is_bool($arr['particles']['move']['straight']) &&
            isset($arr['particles']['move']['out_mode']) && is_string($arr['particles']['move']['out_mode']) &&
            isset($arr['particles']['move']['bounce']) && is_bool($arr['particles']['move']['bounce']) &&
            isset($arr['particles']['move']['attract']) && is_array($arr['particles']['move']['attract']) &&
            isset($arr['particles']['move']['attract']['enable']) && is_bool($arr['particles']['move']['attract']['enable']) &&
            isset($arr['particles']['move']['attract']['rotateX']) && is_numeric($arr['particles']['move']['attract']['rotateX']) &&
            isset($arr['particles']['move']['attract']['rotateY']) && is_numeric($arr['particles']['move']['attract']['rotateY']) && isset($arr['interactivity']) && is_array($arr['interactivity']) &&
            isset($arr['interactivity']['detect_on']) && is_string($arr['interactivity']['detect_on']) &&
            isset($arr['interactivity']['events']) && is_array($arr['interactivity']['events']) &&
            isset($arr['interactivity']['events']['onhover']) && is_array($arr['interactivity']['events']['onhover']) &&
            isset($arr['interactivity']['events']['onhover']['enable']) && is_bool($arr['interactivity']['events']['onhover']['enable']) &&
            isset($arr['interactivity']['events']['onhover']['mode']) && is_string($arr['interactivity']['events']['onhover']['mode']) &&
            isset($arr['interactivity']['events']['onclick']) && is_array($arr['interactivity']['events']['onclick']) &&
            isset($arr['interactivity']['events']['onclick']['enable']) && is_bool($arr['interactivity']['events']['onclick']['enable']) &&
            isset($arr['interactivity']['events']['onclick']['mode']) && is_string($arr['interactivity']['events']['onclick']['mode']) &&
            isset($arr['interactivity']['events']['resize']) && is_bool($arr['interactivity']['events']['resize']) &&
            isset($arr['interactivity']['modes']) && is_array($arr['interactivity']['modes']) &&
            isset($arr['interactivity']['modes']['grab']) && is_array($arr['interactivity']['modes']['grab']) &&
            isset($arr['interactivity']['modes']['grab']['distance']) && is_numeric($arr['interactivity']['modes']['grab']['distance']) &&
            isset($arr['interactivity']['modes']['grab']['line_linked']) && is_array($arr['interactivity']['modes']['grab']['line_linked']) &&
            isset($arr['interactivity']['modes']['grab']['line_linked']['opacity']) && is_numeric($arr['interactivity']['modes']['grab']['line_linked']['opacity']) &&
            isset($arr['interactivity']['modes']['bubble']) && is_array($arr['interactivity']['modes']['bubble']) &&
            isset($arr['interactivity']['modes']['bubble']['distance']) && is_numeric($arr['interactivity']['modes']['bubble']['distance']) &&
            isset($arr['interactivity']['modes']['bubble']['size']) && is_numeric($arr['interactivity']['modes']['bubble']['size']) &&
            isset($arr['interactivity']['modes']['bubble']['duration']) && is_numeric($arr['interactivity']['modes']['bubble']['duration']) &&
            isset($arr['interactivity']['modes']['bubble']['opacity']) && is_numeric($arr['interactivity']['modes']['bubble']['opacity']) &&
            isset($arr['interactivity']['modes']['bubble']['speed']) && is_numeric($arr['interactivity']['modes']['bubble']['speed']) &&
            isset($arr['interactivity']['modes']['repulse']) && is_array($arr['interactivity']['modes']['repulse']) &&
            isset($arr['interactivity']['modes']['repulse']['distance']) && is_numeric($arr['interactivity']['modes']['repulse']['distance']) &&
            isset($arr['interactivity']['modes']['repulse']['duration']) && is_numeric($arr['interactivity']['modes']['repulse']['duration']) &&
            isset($arr['interactivity']['modes']['push']) && is_array($arr['interactivity']['modes']['push']) &&
            isset($arr['interactivity']['modes']['push']['particles_nb']) && is_numeric($arr['interactivity']['modes']['push']['particles_nb']) &&
            isset($arr['interactivity']['modes']['remove']) && is_array($arr['interactivity']['modes']['remove']) &&
            isset($arr['interactivity']['modes']['remove']['particles_nb']) && is_numeric($arr['interactivity']['modes']['remove']['particles_nb'])

        ) {
            return true;
        } else {
            return false;
        }
    }
}