<!DOCTYPE html>
<html>
<head>
    <title>LAlapar Restaurant | User</title>
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="asset/style.css">
    <style type="text/css">
        body {
            background: rgb(4, 4, 34);
        }

    	.gabung {
    		background-color: rgba(255, 255, 255, 0.8);
    		width: 326px;
    		color: black;
    		margin: 20px auto;
    		padding: 15px;
    	}
    </style>
</head>
<body>
    <a href="dashboard_user.php" style="font-size: 40px; color: white;" ><i class="bi bi-arrow-left-short"></i></a>
    <h2 align="center" style="color: white;">NOTA PESANAN ANDA</h2>
    <div class="gabung">
        <h3 align="center">LAlapar Restaurant</h3>
        <h4 align="center">Bukti Pembayaran</h4>
        <?php session_start(); ?>
        <table border="0">
            <tr>
                <td width="300">Nama</td>
                <td width="500" align="right"><?php echo $_SESSION['name']; ?></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td align="right"><?php echo $_SESSION['tanggal']; ?></td>
            </tr>
            <tr>
                <td colspan="2">-------------------------------------------------------</td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td align="right">Alamat resto anda</td>
            </tr>
            <tr>
                <td>Pelayan</td>
                <td align="right">LAlapar Restaurant</td>
            </tr>
            <tr>
                <td>Kasir</td>
                <td align="right">LAlapar Restaurant</td>
            </tr>
            <tr>
                <td colspan="2">-------------------------------------------------------</td>
            </tr>
            <?php
            include "../koneksi.php";
            error_reporting(0);
            $id = $_SESSION['id'];
            $datapesanan = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_pengunjung = '$id'");
                while ($tampil = mysqli_fetch_array($datapesanan)){
                    $total = $tampil['total'];
                    $subtotal+=$total;
                    $pajak = $subtotal/10;
                    $totalbayar = $subtotal + $pajak;
                    ?>
                    <tr>
                        <td><?php echo $tampil['menu']?></td>
                        <td align="right"></td>
                    </tr>
                    <tr>
                        <td><?php echo $tampil['jumlah']; echo ' x Rp. '; echo number_format($tampil['harga']); ?></td>
                        <td align="right">Rp. <?php echo number_format($tampil['total']); ?></td>
                    </tr>
                    <?php } ?>
            <tr>
                <td colspan="2">-------------------------------------------------------</td>
            </tr>
            <tr>
                <td>Subtotal</td>
                <td align="right">Rp. <?php echo number_format($subtotal) ?></td>
            </tr>
            <tr>
                <td>Pajak 10%</td>
                <td align="right">Rp. <?php echo number_format($pajak) ?></td>
            </tr>
            <tr>
                <td colspan="2">-------------------------------------------------------</td>
            </tr>
            <tr>
                <td width="400">Total Pembayaran</td>
                <td align="right" width="400">Rp. <?php echo number_format($totalbayar) ?></td>
            </tr>
            <tr>
                <td colspan="2">-------------------------------------------------------</td>
            </tr>
        </table>
        <h4 align="center">Terima Kasih</h4>
    </div>
    <table align="center">
        <tr><td><button class="btn btn-secondary" onclick="window.print()">Cetak</button></td></tr>
    </table>
</body>
</html>