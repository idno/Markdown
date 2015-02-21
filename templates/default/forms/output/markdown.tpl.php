<?php

    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/external/parsedown/Parsedown.php';

    $parsedown = new Parsedown();

    echo $this->parseHashtags($this->parseURLs($parsedown->text($vars['value'])));
