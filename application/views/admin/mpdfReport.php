<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        /* tr:nth-child(even) {
            background-color: #dddddd;
        } */
    </style>

    <title>Report</title>
</head>

<body>
    <table>
        <thead>
            <th class="serial">#</th>
            <th>Id Order</th>
            <th>Tgl Order</th>
            <th>Nama Customer</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Total</th>
        </thead>
        <tbody>
            <?php $number = 1; ?>
            <?php foreach ($datas as $data) : ?>
                <tr>
                    <td class="serial"><?= $number ?></td>
                    <td><span><?= $data->id_order ?></span></td>
                    <td><span><?= $data->tgl_order ?></span></td>
                    <td><span><?= $data->nama_customer ?></span></td>
                    <td><span><?= $data->nama_produk ?></span></td>
                    <td><span><?= $data->jumlah ?></span></td>
                    <td class="count"><span><?= number_format($data->harga_satuan, 0, ",", ".") ?></span></td>
                    <td class="count"><span><?= number_format($data->total_harga, 0, ",", ".") ?></span></td>
                </tr>
                <?php $number++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>