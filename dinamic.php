<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
        <title>Autocomplete Input Dengan PHP MySQLi &minus; MasRud.com</title>
        <style>
            .container {
                left: 50%;
                position: absolute;
                top: 10%;
                transform: translate(-50%, -10%);
            }
            input[type=text] {
                border: 2px solid #ddd;
                border-radius: 3px;
                font-size: 16px;
                padding: .75em;
                width: 320px;
            }
            .autocomplete-suggestions {
                border: 1px solid #999;
                background: #FFF;
                overflow: auto;
            }
            .autocomplete-suggestion {
                padding: 2px 5px;
                white-space: nowrap;
                overflow: hidden;
            }
            .autocomplete-selected {
                background: #F0F0F0;
            }
            .autocomplete-suggestions strong {
                font-weight: normal;
                color: #3399FF;
            }
            .autocomplete-group {
                padding: 2px 5px;
            }
            .autocomplete-group strong {
                display: block;
                border-bottom: 1px solid #000;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h3>Autocomplete Input Dengan PHP MySQLi</h3>
            <form action="" method="post">
                <input type="text" id="buah" name="buah" placeholder="Nama Buah" value="">
            </form>
        </div>

        <!-- Memanggil jQuery.js -->
        <script src="jquery-3.2.1.min.js"></script>

        <!-- Memanggil Autocomplete.js -->
        <script src="jquery.autocomplete.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                // Selector input yang akan menampilkan autocomplete.
                $( "#buah" ).autocomplete({
                    serviceUrl: "source.php",   // Kode php untuk prosesing data
                    dataType: "JSON",           // Tipe ddata JSON
                    onSelect: function (suggestion) {
                        $( "#buah" ).val("" + suggestion.buah);
                    }
                });
            })
        </script>
    </body>
</html>
