<?php
include get_template_directory() . '/vendor/autoload.php';

class Renderer {
  public $options;

  private function get_views_dir() {
		return get_template_directory() . '/templates/';
  }

  private function get_output_buffer_contents( $function, $args = [] ) {
		ob_start();
		$function( $args );
		$contents = ob_get_contents();
		ob_end_clean();

		return $contents;
  }

  private function get_view( $name ) {
		return $this->get_views_dir() . $name . '.pug';
	}

  private function get_base_data() {

		return array(
				'wp_head'    => $this->get_output_buffer_contents( 'wp_head' ),
				'wp_foot'    => $this->get_output_buffer_contents( 'wp_footer' ),
				'language'   => get_bloginfo( 'language' ),
				'charset'    => get_bloginfo( 'charset' ),
				'body_class' => implode( ' ', get_body_class() ),
		);

	}

  public function __construct() {
    $this->set_options();
  }

  public function set_options() {

    $this->options = array(
        'expressionLanguage' => 'js',
				'basedir'            => $this->get_views_dir(),
				'cache'              => false,
				'debug'              => true,
        // 'enable_profiler'    => true
      );
  }

  public function render( $name, $data = [], $base_data = true ) {

    if ( $base_data ) {
			$data = array_merge( $this->get_base_data(), $data );
    }

    \Pug\Facade::displayFile( $this->get_view( $name ), $data, $this->options );
  }

}

return new Renderer;