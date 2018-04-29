<?php

namespace Stencil\Modules;


if (!defined('ABSPATH'))
    exit;

final class Loader {

    protected $apps = array(
        'elementor/elementor'
    );



    protected function includes() {
        foreach ( $this->apps as $app ) {
            $this->require_file( STL_PATH . "modules/$app.php" );
        }
    }

    protected function require_file( $file ) {
        if ( file_exists( $file ) ) {
            require_once $file;
            return true;
        }
        return false;
    }

    private static $instance;

    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
            self::$instance->includes();
        }
        return self::$instance;
    }
    public function __clone() {
        _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'stencil'), '1.6');
    }

    public function __wakeup() {
        _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'stencil'), '1.6');
    }


}