[![Build Status](https://travis-ci.org/runmybusiness/laravel-simpleassets.png?branch=master)](https://travis-ci.org/runmybusiness/laravel-simpleassets)

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
