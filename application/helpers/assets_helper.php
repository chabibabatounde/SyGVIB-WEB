<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('css_url')){
	function css_url($nom){
		return urlDeBase() . 'assets/css/' . $nom . '.css';
	}
}
if ( ! function_exists('assets')){
	function assets($chemin){
		return urlDeBase() . 'assets/'.$chemin;
	}
}
if ( ! function_exists('js_url')){
	function js_url($nom){
		return urlDeBase() . 'assets/js/' . $nom . '.js';
	}
}
if ( ! function_exists('img_url')){
	function img_url($nom){
		return urlDeBase() . 'assets/img/' . $nom ;
	}
}
if ( ! function_exists('lien')){
	function lien($controler, $method){
		return urlDeBase() . 'index.php/' . $controler."/".$method ;
	}
}
if ( ! function_exists('urlDeBase')){
	function urlDeBase(){
		return base_url();
		//return urlDeBase();
	}
}
