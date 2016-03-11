## Usage

### Creating a matrix

###### From existing data

The easiest way to create a matrix from existing data is to use the static method `createFromArray`:
```php
$matrix = Matrix::createFromArray([['foo', 'bar'], ['fruit', 'cake']);
```

or...

```php
$matrix = new Matrix();
$matrix->addRow(Row::createFromArray(['foo', 'bar']));
$matrix->addRow(Row::createFromArray(['fruit', 'cake']));
```

###### On the fly

When you need a matrix to be filled on the fly, you can use the OO approach:
```php
$matrix = new Matrix();

foreach ($yourData as $yourRow) {
    $row = new Row();
    
    foreach ($yourRow as $yourValue) {
        $row->addElement(new Element($value));
    }
    
    $matrix->addRow($row);
}
```

All of these approaches will give you a matrix looking like this:

|||
|-------|------|
| foo   | bar  |
| fruit | cake |


### Manipulating matrices

###### State is kept up to date

A nice feature of this library is that state changes are kept up to date
throughout the entire matrix. 

Let's start with a simple example:
```php
$matrix = Matrix::createFromArray([['foo', 'bar']]);
```

At this point the matrix would represent something like this:

|||
|-------|------|
| foo   | bar  |


Now let's see what happens to a column after we add another row to the matrix:
```php
// let's grab a column
$column = $matrix->getColumn(0);
echo count($column->getElements()); // will output '1' (only element is 'foo')

// add another row to the matrix
$matrix->addRow(new Row([new Element('r2-c1')]));

// having added a new row, any affected column got updated as well:
echo count($column->getElements()); // will output '2' (for elements 'foo' and 'fruit')
```

At this point the matrix would represent something like this:

|||
|-------|------|
| foo   | bar  |
| fruit |      |

