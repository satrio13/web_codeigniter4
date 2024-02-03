# Ci4datatables

Server Side Datatables Library for CodeIgniter 4 Framework

## Description

Library to make server side Datatables on CodeIgniter 4 to be **more easy** 

if you want to see video how to implement this package, you can visit my video on https://youtu.be/Lc_xMWmprBQ

## Requirements

- Codeigniter 4.\*
- JQuery 3.\*
- JQuery Datatables

## Installation

Installation is best done via Composer, you may use the following command:

> composer require kusmantopratama/Ci4datatables

This will add the latest release of **Ci4datatables** as a module to your project.

### Manual Installation

Should you choose not to use Composer to install, you can download this repo, extract and rename this folder to **Ci4datatables**.
Then enable it by editing **app/Config/Autoload.php** and adding the **Kusmantopratama\Ci4datatables**
namespace to the **$psr4** array. For example, if you copied it into **app/Libraries**:

```php
    $psr4 = [
        'Config'      => APPPATH . 'Config',
        APP_NAMESPACE => APPPATH,
        'App'         => APPPATH,
        'Kusmantopratama\Ci4datatables'   => APPPATH .'Libraries/Ci4datatables/src',
    ];
```

## Example:

This is an example code for using this library:

- PHP:

```php
<?php namespace App\Controllers;

use Kusmantopratama\Ci4datatables\DataTables;

class Home extends BaseController
{
	 public function dt()
    {
        $dt = new Datatables('siswa'); //siswa is a table name
        return $dt->addColumn('action', function ($db) {
            $id = $db['id'];
            $btn = "<button class='btn btn-sm btn-warning' onclick='edit(\"$id\")' title='edit'><i class='fa fa-edit'></i></button> <button class='btn btn-sm btn-danger' onclick='del(\"$id\")' title='delete'><i class='fa fa-eraser'></i></button>";
            return $btn;
        })->draw();
    }
}
```

- Javascript
  using Post Method

```javascript using Post Method
var dTable;
$(function() {
        dTable = $('#tabel').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                type: 'post',
                url: '<?= site_url('admin/siswa/dt') ?>',
                data: function(d) {
                    d.<?= csrf_token() ?> = token;
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'dtindex',
                    name: 'dtindex',
                    orderable: false,
                    searchable: false
                }, {
                    data: 'nis',
                    name: 'nis',
                    orderable: true
                }, {
                    data: 'nama',
                    name: 'nama',
                    orderable: true
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    class: 'text-center nowrap'
                }
            ],
            order: [
                ['0', 'desc']
            ],

            rowCallback: function(row, data) {
                var checkbox = "<div class=\"custom-control custom-checkbox\"><input class=\"custom-control-input cb-child\" name=\"multiple\" type=\"checkbox\" id=\"checkid" + data.id + "\" value=\"" + data.id + "\"><label class=\"custom-control-label\" for=\"checkid" + data.id + "\">&nbsp;</label></div>";
                $('td:eq(0)', row).html(checkbox);
            }
        });

        dTable.on('xhr.dt', function(e, settings, json, xhr) {
            token = json.<?= csrf_token() ?>;
        });

    });
```
using Get Method

```javascript using Get Method

var dTable;
$(function() {
        dTable = $('#tabel').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                type: 'get',
                url: '<?= site_url('admin/siswa/dt') ?>'

            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'dtindex',
                    name: 'dtindex',
                    orderable: false,
                    searchable: false
                }, {
                    data: 'nis',
                    name: 'nis',
                    orderable: true
                }, {
                    data: 'nama',
                    name: 'nama',
                    orderable: true
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    class: 'text-center nowrap'
                }
            ],
            order: [
                ['0', 'desc']
            ],

            rowCallback: function(row, data) {
                var checkbox = "<div class=\"custom-control custom-checkbox\"><input class=\"custom-control-input cb-child\" name=\"multiple\" type=\"checkbox\" id=\"checkid" + data.id + "\" value=\"" + data.id + "\"><label class=\"custom-control-label\" for=\"checkid" + data.id + "\">&nbsp;</label></div>";
                $('td:eq(0)', row).html(checkbox);
            }
        });

    });
```

you can see in column there is  **dtindex** where its column automatically generate by library for numbering of rows. where you use **dtindex** column you must set its column whit orderable: false searchable: false, same as method **addColumn()**.

## Documentation:

Now you can use with instantiate class with table as parameter

```php
 $dt = new Datatables('siswa');
```

- **Select Table**\
  Or you can use Querybuilder for select table;

```php
$dt = new Datatables();
$dt->table('siswa');
```

- **Query Syntax referer form codeigniter query builder**\
- **Select, where, join etc functionality**\
  for query functionality, this library use query builder style from codeigniter 4 it self. you can visit https://codeigniter.com/user_guide/database/query_builder.html
  for more information

- **Add Column**\
  if you want to use
  Closure Style :

```php
$dt->addColumn('action', function ($db) {
                    $id = $db['kategori_id'];
                    return "<button title='edit' class='btn btn-sm btn-warning' onclick='edit(\"$id\")'>
                <i class='fa fa-edit'></i></button>
                <button class='btn btn-sm btn-danger' title='delete' onclick='del(\"$id\")'>
                <i class='fa fa-eraser'></i></button>";
                });
```

Or ignited datatables style

```php
$dt = new Datatables();
->addColumn('Actions', "<button title='edit' class='btn btn-sm btn-warning' onclick='edit("$1")'>
                <i class='fa fa-edit'></i></button>
                <button class='btn btn-sm btn-danger' title='delete' onclick='del("$1")'>
                <i class='fa fa-eraser'></i></button>", 'id');
```

- **Edit Column**\
 if you want to use
  Closure Style :

```php
$dt->editColumn('data_date', function ($db) {
                    return date('d, M Y', strtotime($db['data_date']));
                });
```

Or ignited datatables style

```php
$dt = new Datatables();
->editColumn('data_date', date('d, M Y', strtotime('$1')), 'data_date');
```

<br />

## Author's Profile:

Github: [https://github.com/kusmantopratama]
Facebook: [https://web.facebook.com/k.tamapratama/]

## support Me on 
[https://paypal.me/tama225?locale.x=en_US]


## dukung saya di 
[https://sociabuzz.com/tamapratama/support]
