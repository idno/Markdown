<?php

    namespace IdnoPlugins\Markdown {

        use Idno\Common\Plugin;
        use Idno\Entities\ActivityStreamPost;

        class Main extends Plugin {

            function registerPages() {

                \Idno\Core\site()->template()->replaceTemplate('forms/input/richtext','forms/input/richtextwrapper');
                \Idno\Core\site()->template()->replaceTemplate('forms/output/richtext','forms/output/richtextwrapper');
                \Idno\Core\site()->template()->extendTemplate('shell/head','markdown/header');

            }

            function registerEventHooks() {

                \Idno\Core\site()->addEventHook('saved', function(\Idno\Core\Event $event) {

                    if ($current_page = \Idno\Core\site()->currentPage()) {

                        if ($markdown = $current_page->getInput('markdown_editor')) {

                            $eventdata = $event->data();
                            if ($object = $eventdata['object']) {
                                if (!($object instanceof ActivityStreamPost)) {
                                    $object->markdown_editor = true;
                                    $object->save();
                                    //\Idno\Core\site()->session()->addMessage("We would resave the object here");
                                }
                            }

                        }

                    }

                    return true;

                });

            }

        }

    }