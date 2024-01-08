<?php include 'functions.php'; ?>
<!doctype html>
<html>

<head>
    <meta name="robots" content="noindex, nofollow" />
    <title>Cetak Laporan</title>
    <style>
        @media print {
            @page {
                size: auto;
                margin: 0;
            }
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 13px;
            margin: 1cm;
        }

        h1 {
            font-size: 14px;
            border-bottom: 4px double #000;
            padding: 3px 0;
        }

        table {
            border-collapse: collapse;
            margin-bottom: 10px;
            margin-right: 1cm;
        }

        td,
        th {
            border: 1px solid #000;
            padding: 3px;
        }

        .wrapper {
            margin: 0 auto;
            width: 980px;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="wrapper">

        <?php
        if (is_file($_GET["m"] . '_cetak.php'))
            include($_GET["m"] . '_cetak.php');
        ?>
    </div>
</body>

</html>