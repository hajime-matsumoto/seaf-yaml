<?php
/**
 * Seaf: Simple Easy Acceptable micro-framework.
 *
 * @author HAjime MATSUMOTO <mail@hazime.org>
 * @copyright Copyright (c) 2014, Seaf
 * @license   MIT, http://seaf.hazime.org
 */

namespace Seaf\Component\Yaml;

use Seaf;
use Seaf\Core\Environment\Environment;

use Spyc;

/**
 * Yamlコンポーネント
 *
 * このコンポーネントは
 * Spyc [https://code.google.com/p/spyc] もしくは PECL::yaml
 * に依存します。
 *
 * 使い方:
 *
 */
class Yaml
{
    /**
     * @var bool
     */
    private $fake_exit = false;

    public function __construct ( )
    {
        if ( !function_exists( 'yaml_parse_file' ) ) {
            require_once dirname(__FILE__).'/../../lib/spyc-0.5/spyc.php';
        }
    }

    /**
     * @param string $file
     */
    public function parse ( $file )
    {
        if ( function_exists( 'yaml_parse_file' ) ) {
            return yaml_parse_file( $file );
        }
        return Spyc::YAMLLoad( $file );
    }

    /**
     * ダンプする
     */
    public function dump ( $array )
    {
        if ( function_exists( 'yaml_emit' ) ) {
            return yaml_emit( $array );
        }

        return Spyc::YAMLDump( $array );
    }

}

/* vim: set expandtab ts=4 sw=4 sts=4: et*/
