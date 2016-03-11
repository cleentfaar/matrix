## Usage

### Creating a matrix

###### From existing data

The easiest way to create a matrix from existing data is to use the static method `createFromArray`:
```php
$matrix = Matrix::createFromArray([['foobar'], ['fruitcake']);
```

or...

```php
$matrix = new Matrix();
$matrix->addRow(Row::createFromArray(['foobar']));
$matrix->addRow(Row::createFromArray(['fruitcake']));
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

|-----------|
| foobar    |
| fruitcake |


### Manipulating matrices

###### State is kept up to date

A nice feature of this library is that state changes are kept up to date
throughout the entire matrix. 

Let's start with a simple example:
```php
$matrix = Matrix::createFromArray([['r1c1', 'r1c2']]);
```

At this point the matrix would represent something like this:

|------|------|
| r1c1 | r1c2 |

Now let's see what happens to a column after we add another row to the matrix:
```php
// let's grab a column
$column = $matrix->getColumn(0);
echo count($column->getElements()); // will output '1' (only element is 'r1c1')

// add another row to the matrix
$matrix->addRow(new Row([new Element('r2-c1')]));

// having added a new row, any affected column got updated as well:
echo count($column->getElements()); // will output '2' (for elements 'r1c1' and 'r2c1')
```

At this point the matrix would represent something like this:

|------|------|
| r1c1 | r1c2 |
| r2c1 |      |

