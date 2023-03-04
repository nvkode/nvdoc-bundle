NvdocBundle
==========

NvdocBundle provides automatic documentation generation for Symfony project.

Installation
---------

NvdocBundle requires PHP 8.0 or higher and Symfony 6.0 or higher.
Run the following command to install it in your application:

`$ composer require nvkode/nvdoc-bundle`

After add routes in config/routes.yaml

```
nvdoc:
    resource: '@NvdocBundle/Controller'
    type: attribute
```

Now you can access docs

`https://yourdomain/docs`

Dependencies
---------

* [nvkode/nvdoc](https://github.com/nvkode/nvdoc)

Resources
---------

* [Report issues](https://github.com/nvkode/nvdoc-bundle/issues) and
  [send Pull Requests](https://github.com/nvkode/nvdoc-bundle/pulls)
