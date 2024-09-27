# Requires you to have python installed

1. Install the package using composer:
```bash
composer require drlopes/azure-service-bus
```

2. Installl the microsoft/azure-servicebus package using pip:
```bash
pip install azure-servicebus
```

3. Open the service-bus.py file and replace the following variables with your Azure Service Bus credentials:

```python
NAMESPACE_CONNECTION_STR = "YOUR_CONNECTION_STRING"
SUBSCRIPTION_NAME = "YOUR_SUBSCRIPTION_NAME"
TOPIC_NAME = "YOUR_TOPIC_NAME"
```

4. Open the src/ServiceBus.php file set the $pythonExecutable:
```php
private static string $pythonExecutable = 'python'; // or 'python3' for example
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