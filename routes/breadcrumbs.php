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
Breadcrumbs::register('productcreate', function($breadcrumbs){
	$breadcrumbs->parent('adminproducts');
	$breadcrumbs->push('Product aanmaken', URL::to('/admin/producten/aanmaken'));
});
Breadcrumbs::register('productedit', function($breadcrumbs, $product){
	$breadcrumbs->parent('adminproducts');
	$breadcrumbs->push('Product aanpassen', URL::to('/admin/producten/{product}/aanpassen'));
});

Breadcrumbs::register('admincategories', function($breadcrumbs){
	$breadcrumbs->parent('admin');
	$breadcrumbs->push('Categorieën', URL::to('/admin/categorieen'));
});
Breadcrumbs::register('categorycreate', function($breadcrumbs){
	$breadcrumbs->parent('admincategories');
	$breadcrumbs->push('Categorie aanmaken', URL::to('/admin/categorieen/aanmaken'));
});
Breadcrumbs::register('categoryedit', function($breadcrumbs, $category){
	$breadcrumbs->parent('admincategories');
	$breadcrumbs->push('Categorie aanpassen', URL::to('/admin/categorieen/{category}/aanpassen'));
});

Breadcrumbs::register('adminusers', function($breadcrumbs){
	$breadcrumbs->parent('admin');
	$breadcrumbs->push('Gebruikers', URL::to('/admin/gebruikers'));
});
Breadcrumbs::register('usershow', function($breadcrumbs, $user){
	$breadcrumbs->parent('adminusers');
	$breadcrumbs->push($user->id, URL::to('/admin/gebruikers/{$user}'));
});
Breadcrumbs::register('usercreate', function($breadcrumbs){
	$breadcrumbs->parent('adminusers');
	$breadcrumbs->push('Gebruiker aanmaken', URL::to('/admin/gebruikers/aanmaken'));
});
Breadcrumbs::register('useredit', function($breadcrumbs, $user){
	$breadcrumbs->parent('usershow');
	$breadcrumbs->push('Gebruiker aanpassen', URL::to('/admin/gebruikers/{user}/aanpassen'));
});

Breadcrumbs::register('adminorders', function($breadcrumbs){
	$breadcrumbs->parent('admin');
	$breadcrumbs->push('Orders', URL::to('/admin/orders'));
});
Breadcrumbs::register('ordershow', function($breadcrumbs, $order){
	$breadcrumbs->parent('adminorders');
	$breadcrumbs->push($order->id, URL::to('/admin/orders/{$order}'));
});
Breadcrumbs::register('ordercreate', function($breadcrumbs){
	$breadcrumbs->parent('adminorders');
	$breadcrumbs->push('Order aanmaken', URL::to('/admin/orders/aanmaken'));
});
Breadcrumbs::register('orderedit', function($breadcrumbs, $order){
	$breadcrumbs->parent('ordershow');
	$breadcrumbs->push('Order aanpassen', URL::to('/admin/orders/{order}/aanpassen'));
});
