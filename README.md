# cms-components
A collection of diffferent classes

>**memory.php**

A class to get informations about script memory usage

Properties (2)
```php
public int $rounded = 2;
public string $unit = 'MB';
```

Methods (10)
```php
public function usage() { ... };
public function usageWithUnit() { ... };
public function peak() { ... };
public function peakWithUnit() { ... };
public function allocate() { ... };
public function allocateWithUnit() { ... };
public function limit() { ... };
public function limitWithUnit() { ... };
public function inUse() { ... };
public function inUseWithUnit() { ... };
```
