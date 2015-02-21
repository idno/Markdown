<?php

    // First: should we use markdown at all?

    $markdown = true;
    if (!empty($vars['object']->_id)) {
        if (empty($vars['object']->markdown_editor)) {
            $markdown = false;
        }
    }

    if ($markdown) {
        echo $this->draw('forms/output/markdown');
    } else {
        echo $this->draw('forms/output/richtext',true,false);
    }