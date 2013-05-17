blackknight467's AYAHBundle
=====================

The `AYAHBundle` adds support for a "ayah" form type for the
Symfony2 form component.

NOTE: I am not in any way associated with Are you a human.  I am just some guy who 

Installation
============

### Step 1: Download the AYAHBundle
***Using Composer***

Add the following to the "require" section of your `composer.json` file:

```
    "gregwar/captcha-bundle": "dev-master"
```

And update your dependencies

### Step 2: Configure the Autoloader

If you use composer, you can skip this step.

### Step 3: Enable the bundle

Finally, enable the bundle in the kernel:

```php
<?php
// app/appKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new blackknight467\AYAHBundle\GregwarCaptchaBundle(),
    );
}
```
Configuration
=============

Coming Soon

Usage
=====

Coming Soon

License
=======
This bundle is under the MIT license. See the complete license in the bundle:
    LICENSE