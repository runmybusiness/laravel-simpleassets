[![Build Status](https://travis-ci.org/runmybusiness/laravel-simpleassets.png?branch=master)](https://travis-ci.org/runmybusiness/laravel-simpleassets)
[![StyleCI](https://styleci.io/repos/16866381/shield)](https://styleci.io/repos/16866381)
[![Latest Stable Version](https://poser.pugx.org/runmybusiness/initialcon/v/stable)](https://packagist.org/packages/runmybusiness/initialcon) [![Total Downloads](https://poser.pugx.org/runmybusiness/initialcon/downloads)](https://packagist.org/packages/runmybusiness/initialcon) [![Latest Unstable Version](https://poser.pugx.org/runmybusiness/initialcon/v/unstable)](https://packagist.org/packages/runmybusiness/initialcon) [![License](https://poser.pugx.org/runmybusiness/initialcon/license)](https://packagist.org/packages/runmybusiness/initialcon)

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
