NvdocBundle
==========

NvdocBundle provides automatic documentation generation for Symfony project.

Installation
---------

NvdocBundle requires PHP 8.0 or higher and Symfony 6.0 or higher.
Run the following command to install it in your application:

`$ composer require nvkode/nvdoc-bundle`

Install assets

`$ symfony console assets:install`

After add routes in config/routes.yaml

```
nvdoc:
    resource: '@NvdocBundle/Controller'
    type: attribute
```

Now you can access docs

`https://yourdomain/docs`

Annotations
---------

**NVParam**

For displaying method in Routes table you should use #[Route] attribute.
NVParam is optional annotation which will be parsed in parameters column.

Example:

```php

/**
 * @NVParam('name', 'type', 'required')
 * @NVParam('name', 'type')
 * @NVParam('name')
 */
#[Route(
    path: '/'
)]
public function index(): Response
{
    return $this->render('index.html.twig');
}
```

| Name  | Route | Parameters                                                                        |
|-------|-------|-----------------------------------------------------------------------------------|
| index | /     | name string    REQUIRED<br/>name type      undefined<br/>name undefined undefined |

Dependencies
---------

* [nvkode/nvdoc](https://github.com/nvkode/nvdoc)

Resources
---------

* [Report issues](https://github.com/nvkode/nvdoc-bundle/issues) and
  [send Pull Requests](https://github.com/nvkode/nvdoc-bundle/pulls)
