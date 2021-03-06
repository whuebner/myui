<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>TableGrid Last Version</title>
    <link type="text/css" href="../../css/main.css" rel="stylesheet">
    <script type="text/javascript" src="../../scripts/prototype/1.7/prototype.js"></script>
    <script type="text/javascript" src="../../scripts/scriptaculous/scriptaculous.js"></script>
    <script type="text/javascript" src="../../scripts/myui/myui.js"></script>
</head>
<script type="text/javascript">
    var countryList = [
        {value: 'UK', text: 'United Kingdon'},
        {value: 'US', text: 'United States'},
        {value: 'UC', text: 'Ucranie'},
        {value: 'CL', text: 'Chile'},
        {value: 'CH', text: 'China'},
        {value: 'AR', text: 'Argentina'},
        {value: 'AG', text: 'Argelia'},
        {value: 'IT', text: 'Italy'},
        {value: 'BR', text: 'Brazil'},
        {value: 'ES', text: 'Spain'}
    ];

    var tableModel = {
        options : {
            width: '640px',
            title: 'JAW Motors Inventory',
            pager: {
                pageParameter : 'page'
            },
            addSettingBehavior : false,
            rowClass : function(rowIdx) {
                var className = '';
                if (rowIdx % 2 == 0) {
                    className = 'hightlight';
                }
                return className;
            },
            toolbar : {
                elements: [MY.TableGrid.ADD_BTN, MY.TableGrid.DEL_BTN, MY.TableGrid.SAVE_BTN],
                onSave: function() {
                    var modifiedRows = tableGrid1.getModifiedRows();
                    var temp = '';
                    for (var i = 0; i < modifiedRows.length; i++) {
                        for (var p in modifiedRows[i]) {
                            temp += p + '=' + modifiedRows[i][p] + '&';
                        }
                    }
                    alert(temp);
                },
                onAdd: function() {
                    alert('on add handler');
                },
                onDelete: function() {
                    alert('on delete handler');
                }
            }
        },
        columnModel : [
            {
                id : 'carId',
                title : 'Id',
                width : 30,
                editable: true,
                editor: 'checkbox',
                sortable: false
            },
            {
                 id: 'generalInfo',
                 title: 'General Info',
                 children: [
                    {
                         id : 'manufacturer',
                         title : 'Manufacturer',
                         width : 140,
                         editable: true,
                         sortable: false
                    },
                    {
                        id : 'model',
                        title : 'Model',
                        width : 120,
                        editable: true
                    },
                    {
                        id : 'year',
                        title : 'Year',
                        width : 60,
                        editable: true,
                        editor: new MY.TextField({
                              validate : function(value, errors){
                                   return parseInt(value) > 1900;
                              }
                        })
                     }
                 ]
            },
            {
                id : 'price',
                title : 'Price',
                width : 70,
                type: 'number',
                editable: true
            },
            {
                id : 'dateAcquired',
                title : 'Date acquired',
                width : 120,
                editable: true,
                editor: new MY.DatePicker({})
            },
            {
                id : 'origCountry',
                title : 'Origin Country',
                width : 100,
                editable: true,
                editor: new MY.ComboBox({
                    items: countryList
                })
            }
        ],
        url: 'get_all_cars.php'
    };


    var tableGrid1 = null;
    window.onload = function() {
        tableGrid1 = new MY.TableGrid(tableModel);
        tableGrid1.show('mytable1');
    };
</script>
<body>
    <div class="container">
        <div class="samples">
            <h1>TableGrid Last Version</h1>
            <div id="mytable1" style="position:relative; width: 640px; height: 350px"></div>
        </div>
    </div>
</body>
</html>