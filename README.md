# Requires you to have python and PyInstaller installed on your system.

1. Install the package using composer:
```bash
composer require drlopes/azure-service-bus
```

2. Open the service-bus.py file and replace the following variables with your Azure Service Bus credentials:

```python
NAMESPACE_CONNECTION_STR = "YOUR_CONNECTION_STRING"
SUBSCRIPTION_NAME = "YOUR_SUBSCRIPTION_NAME"
TOPIC_NAME = "YOUR_TOPIC_NAME"
```


3. Install PyInstaller:
```bash
pip install pyinstaller
```

4. Create the executable on the bin folder:
```bash
python -m PyInstaller ./vendor/drlopes/azure-service-bus/bin/service-bus.py --onefile --distpath ./bin/executable
```

5. Import the ServiceBus class and call the fetch method:
```php

use Drlopes\AzureServiceBus\ServiceBus;

$response =  ServiceBus::fetch();
```

6. By default, the response will be an associative array, but passing `associative: false` as a parameter will return a json string.

```php

use Drlopes\AzureServiceBus\ServiceBus;

$response =  ServiceBus::fetch(associative: false);
```