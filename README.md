[![Build Status](https://travis-ci.org/runmybusiness/laravel-simpleassets.png?branch=master)](https://travis-ci.org/runmybusiness/laravel-simpleassets)
[![StyleCI](https://styleci.io/repos/16866381/shield)](https://styleci.io/repos/16866381)
[![Latest Stable Version](https://poser.pugx.org/runmybusiness/laravel-simpleassets/v/stable)](https://packagist.org/packages/runmybusiness/laravel-simpleassets) [![Total Downloads](https://poser.pugx.org/runmybusiness/laravel-simpleassets/downloads)](https://packagist.org/packages/runmybusiness/laravel-simpleassets) [![Latest Unstable Version](https://poser.pugx.org/runmybusiness/laravel-simpleassets/v/unstable)](https://packagist.org/packages/runmybusiness/laravel-simpleassets) [![License](https://poser.pugx.org/runmybusiness/laravel-simpleassets/license)](https://packagist.org/packages/runmybusiness/laravel-simpleassets)

Simple Assets
==================

A simple package to help bust caches with a query string & rewrite urls to a cdn.


#Installation

Register the service provider in app.php
```
'RunMyBusiness\Assets\SimpleassetsServiceProvider',
```

Add an alias if you want
```
'Asset' 			=> 'RunMyBusiness\Assets\Facades\SimpleAssets',
```
