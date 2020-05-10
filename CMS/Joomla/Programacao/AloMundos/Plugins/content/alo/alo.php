<?php
// no direct access
defined('_JEXEC') or die;

class plgContentAlo extends JPlugin{

    public function onContentAfterTitle($context, &$article, &$params, $limitstart){
            return '<h1>Olá mundo do Joomla - plugin</h1>';
    }
}

