<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <tbody>
            <?php $number = 1; ?>
            <?php foreach ($report as $report) : ?>
                <tr>
                    <td class="serial"><?= $number ?></td>
                    <td><span><?= $report->id_order ?></span></td>
                    <td><span><?= $report->tgl_order ?></span></td>
                    <td><span><?= $report->nama_customer ?></span></td>
                    <td><span><?= $report->nama_produk ?></span></td>
                    <td><span><?= $report->jumlah ?></span></td>
                    <td class="count"><span><?= $report->harga_satuan ?></span></td>
                    <td class="count"><span><?= $report->total_harga ?></span></td>
                </tr>
                <?php $number++; ?>
            <?php endforeach; ?>
        </tbody>
        </tbody>
    </table>
</body>

</html>