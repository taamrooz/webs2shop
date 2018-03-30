<?php

Breadcrumbs::register('home', function ($breadcrumbs){
	$breadcrumbs->push('Home', URL::to('/'));
});

Breadcrumbs::register('about', function($breadcrumbs){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('About', URL::to('/about'));
});
Breadcrumbs::register('catalog', function($breadcrumbs){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Catalogus', URL::to('/producten'));
});
Breadcrumbs::register('product', function($breadcrumbs, $product){
	$breadcrumbs->parent('catalog');
	$breadcrumbs->push($product->titel, URL::to('/producten/{$product}'));
});
Breadcrumbs::register('shoppingcart', function($breadcrumbs){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Winkelwagen', URL::to('/winkelwagen'));
});
Breadcrumbs::register('admin', function($breadcrumbs){
	$breadcrumbs->push('Admin', URL::to('/admin'));
});
Breadcrumbs::register('adminproducts', function($breadcrumbs){
	$breadcrumbs->parent('admin');
	$breadcrumbs->push('Producten', URL::to('/admin/producten'));
});
Breadcrumbs::register('admincategories', function($breadcrumbs){
	$breadcrumbs->parent('admin');
	$breadcrumbs->push('Categorieën', URL::to('/admin/categorieen'));
});
Breadcrumbs::register('adminusers', function($breadcrumbs){
	$breadcrumbs->parent('admin');
	$breadcrumbs->push('Gebruikers', URL::to('/admin/gebruikers'));
});
Breadcrumbs::register('adminorders', function($breadcrumbs){
	$breadcrumbs->parent('admin');
	$breadcrumbs->push('Orders', URL::to('/admin/orders'));
});
