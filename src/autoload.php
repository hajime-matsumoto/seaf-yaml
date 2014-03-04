<?php
/**
 * Seaf Auto Load
 */
Seaf::di('autoLoader')->addNamespace(
    'Seaf\\Component\\Yaml\\',
    null,
    dirname(__FILE__).'/Yaml'
);
