Behat-Magento2InitExtension
=========================

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jamescowie/behat-magento2-init/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jamescowie/behat-magento2-init/?branch=master)

Behat-Magento2InitExtension provides access to the magento2 object manager through the BaseFixture class and allows you to change magento config settings temporarly when Behat is running.

Installation
------------

Install by adding to your `composer.json`:

```bash
composer require --dev bex/behat-magento2-init
```

Configuration
-------------

Enable the extension in `behat.yml` like this:

```yml
default:
  extensions:
    Bex\Behat\Magento2InitExtension: 
       magento_bootstrap: 'app/bootstrap.php'
```

So that this extension can be used on both projects and modules `magento_bootstrap` is a required setting this needs
to be set to the path of the Magento 2 `app/bootstrap.php` file. 

You can change magento config settings like this:
```yml
default:
  extensions:
    Bex\Behat\Magento2InitExtension:
      magento_bootstrap: 'app/bootstrap.php'
      magento_configs:
        -
          path: 'admin/security/use_form_key'
          value: 0
        -
          path: 'your_module/special_config/awesome_field'
          value: 'somevalue'
          scope_type: 'stores' # allowed values: default, stores, websites; default value: default
          scope_code: 'your_store_code' # the website or store code; default value: null
```

Usage
-----
When you run behat the extension will
- configure the magento2 object manager automatically, so it will be available in all your fixture class which extends the `Bex\Behat\Magento2InitExtension\Fixtures\BaseFixture` class (see `Bex\Behat\Magento2InitExtension\Fixtures\MagentoConfigManager` as example).
- change the config values before suit and revert the original config values after suit
