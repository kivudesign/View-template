# wepesi-view
Simple view engine, and share data across pages

# Introduction

Create directory where all the view file will loaded. eg: `views`
the class has few method to be used in order to make your view work as expected.
* `assign` : help assign a value to the variable. It has two parameters, the first is the name of the variable and the second parameter is the value of the variable.
* `render` : helps display the contents of your file. Is like a parameter, and it's the name of the file.
    Note: All files must be defined in the root directory of the view.
* `setLayout` : help set the layout of the pages.

# Installation
```bash
composer require wepesi/view
```

# Usage
## Without layout

```php
$view_dir = __DIR__."/views";
$view = new \Wepesi\App\View($view_dir);
$view->assign("title","Welcom to the main pages");

$view->render("/art");
```

## With layout
In case you are want to set the layout, you should define the  `$contentpages` variable into your layout file where the view content will be applyed.
```php
$view_dir = __DIR__."/views";
$view = new \Wepesi\App\View($view_dir);
$view->assign("title","Home page");

view->setLayout("/layout");
$view->render("/home");
```
No need to specify the extension in case it is a php file.