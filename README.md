blackknight467's AYAHBundle
=====================

The `AYAHBundle` adds support for a "ayah" form type for the
Symfony2 form component.

NOTE: I am not in any way associated with Are you a human.  I am just some guy who needed to implent are you human using symfony 2 forms and then decided to share his code to make life easier for anyone who wants to leave captchas behind.

Installation
============

### Step 1: Download the AYAHBundle

I highly suggest using Composer.  Honestly i've only tested this using composer.  I haven't tried adding this package using submodules or the vendors script, but it should work regaurdless.

***Using Composer***

Add the following to the "require" section of your `composer.json` file:

```
    "blackknight467/ayah-bundle": "dev-master"
```

***Using the vendors script***

Add the following lines to your `deps` file:

```
    [AYAHBundle]
        git=http://github.com/blackknight467/AYAHBundle.git
        target=/bundles/blackknight467/AYAHBundle
```

Now, run the vendors script to download the bundle:

``` bash
$ php bin/vendors install
```

***Using submodules***

If you prefer instead to use git submodules, then run the following:

``` bash
$ git submodule add git://github.com/blackknight467/AYAHBundle.git vendor/bundles/blackknight467/AYAHBundle
$ git submodule update --init
```

And update your dependencies

### Step 2: Configure the Autoloader

If you use composer, you can skip this step.

Now you will need to add the `blackknight467` namespace to your autoloader:

``` php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    // ...
    'blackknight467' => __DIR__.'/../vendor/bundles',
));
```

### Step 3: Enable the bundle

Finally, enable the bundle in the kernel:

```php
<?php
// app/appKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new blackknight467\AYAHBundle\AYAHBundle(),
    );
}
```
Configuration
=============
Add the following configuration to your `app/config/parameters.yml`:

```
ayahPublisherKey: 'your ayah publisher key here'
ayahScoringKey:  'your ayah scoring key here'
```

Advanced Configuration
=============
The default error message for failing the are you a human test is:

'You did not pass the "Are You A Human" test. This is a problem. Study up and try again.'

For a custom error message add the following to you `app/config/parameters.yml`:

```
ayahErrorMessage: 'your error message here'
```

Usage
=====

```php
<?php
    // ...
    $builder->add('ayah', 'ayah'); // That's all !
    // ...
```

Advanced Usage
=====
If you need to skip the test scoring for some reason (e.g. automated testing) use the assume_human option.

if assume_human is true, it turns off the form validation for of the are you a human field so no errors shall occur if the test is skipped.

example:
```php
<?php
    // ...
    $builder->add('ayah', 'ayah', array(
                'assume_human' => true
            ))

    // ...
```

License
=======
This bundle is under the MIT license. See the complete license in the bundle:
    LICENSE
