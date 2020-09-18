# Time

Simple functions for time conversions.


## Usage

```php
use cjrasmussen\Time\Convert;

$time = Convert::secondsToTime(153);
echo $time; // 00:02:33

$seconds = Convert::timeToSeconds('01:45:32');
echo $seconds; // 6332
```

## Installation

Simply add a dependency on cjrasmussen/time to your composer.json file if you use [Composer](https://getcomposer.org/) to manage the dependencies of your project:

```sh
composer require cjrasmussen/time
```

Although it's recommended to use Composer, you can actually include the file(s) any way you want.


## License

Time is [MIT](http://opensource.org/licenses/MIT) licensed.