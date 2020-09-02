# Don't lose track of your app's Laravel activity

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lakasir/user-logging-activity.svg?style=flat-square)](https://packagist.org/packages/lakasir/user-logging-activity)
[![Quality Score](https://img.shields.io/scrutinizer/g/lakasir/user-logging-activity.svg?style=flat-square)](https://scrutinizer-ci.com/g/lakasir/user-logging-activity)
[![Total Downloads](https://img.shields.io/packagist/dt/lakasir/user-logging-activity.svg?style=flat-square)](https://packagist.org/packages/lakasir/user-logging-activity)

The `lakasir/user-logging-activity` package provides easy to use functions to log the activities of the users of your app. It can also automatically log model events. All activity will be stored in the activity_log table.

## Installation

You can install the package via composer:

```bash
composer require lakasir/user-logging-activity
```
Publish migration and config file with:

```bash
php artisan log-activity:install
```

## Usage

First define which model you want to record:

``` php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Lakasir\UserLoggingActivity\Traits\HasLog;

class Purchasing extends Model
{
    use HasLog;
    
}
```

Use `Lakasir\UserLoggingActivity\Facades\Activity;` facade:

Create simple log:

``` php
Activity::info('Logged In at '. now()->format('Y-m-d'));
```
Create more advaced log

``` php
$data = Purchasing::create($request->all());

Activity::modelable($data)->auth()->creating();
```

You can get all activity just use the `Lakasir\UserLoggingActivity\Models\Activity`; model:

``` php
Activity::all();
```

## Available chaining action method

* `creating()` for creating info
* `updating()` for updating info
* `sync()` for dispatch now action
  * You can set default queue action in `acitivity_log.queable`, if the value is false you didn't need this chaining,
  if true checkout the [job laravel documentation](https://laravel.com/docs/7.x/queues)
* `auth()` for authenticable user 
  * Set default user model in `activity_log.user_model`
* `modelable($model)` pass the related activity


### Testing
under development

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email sheenazien08@gmail.com instead of using the issue tracker.

## Credits

- [sheenazien8](https://github.com/sheenazien8)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
## Credits
- [Laravel Package Boilerplate](https://laravelpackageboilerplate.com)
