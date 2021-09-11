# PHP Json Serializer
This is library a very tiny wrapper that provides a simple object-oriented interface to JSON serialization.

## Examples
The usage is straightforward (same as json_encode/json_decode)

```php
$serializer = new PhpJsonSerializer;

echo $serializer->encode(['a' => 1]); //outputs {"a": 1}

echo $serializer->decode('{"a": 1}', true)['a']; //outputs 1
echo $serializer->decode('{"a": 1}', false)->a; //outputs 1
```
