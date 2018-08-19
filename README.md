# PhotoProcessing
library processing photos

# Istall 
> $ composer require dixmod/photo-processing

# Use
```php
use Dixmod\{
    File\Photo
};

$photo = new Photo($filePhoto);
$photo->setFilter($inputFilterName);
$photo->save($photo->getDir() . DIRECTORY_SEPARATOR . $inputFilterName . '_' . $photo->getFileName());
```
