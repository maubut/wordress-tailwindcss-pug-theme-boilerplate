<?php
include('inc/renderer.php');
include_once('inc/assets.php');

function output( $name, $data = [], $base_data = true ) {
  $pugpress = new Renderer();
  $pugpress->render( $name, $data, $base_data );
}
