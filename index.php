<?php
include 'fungsi.php';
$jumlah = new Jumlah();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iKantin Wikrama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="fa fa-shopping-cart"></i> iKantin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><i class="fa fa-home"></i>
                            Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                class="fa fa-shopping-cart"></i> Beli</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="jumbotron mt-5 py-4 px-5 bg-primary ">
            <h1 class="display-7 text-white"> <i class="fa fa-shopping-cart"></i> Selamat Datang di iKantin
                Wikrama!</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <img src="img/1.png" alt="" width="200" class="img-thumbnail rounded-circle">
                <img src="img/2.jpg" alt="" width="200" class="img-thumbnail rounded-circle">
                <img src="img/3.jpg" alt="" width="200" class="img-thumbnail rounded-circle">
                <img src="img/4.jpg" alt="" width="200" class="img-thumbnail rounded-circle">
                <h3>Beli Sekarang!</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal"><i class="fa fa-shopping-cart"></i> Beli</button>

                <?php
                if (isset($_POST['check'])) {
                    $jmlRebus = $_POST['mierebus'];
                    $jmlRebustelur = $_POST['mierebustelur'];
                    $jmlGoreng = $_POST['miegoreng'];
                    $jmlGorengtelur = $_POST['miegorengtelur'];

                    if ($jmlRebus == null) {
                        $jumlah->getJumlah(0, $jmlRebustelur, $jmlGoreng, $jmlGorengtelur);
                    } elseif ($jmlRebustelur == null) {
                        $jumlah->getJumlah($jmlRebus, 0, $jmlGoreng, $jmlGorengtelur);
                    } elseif ($jmlGoreng == null) {
                        $jumlah->getJumlah($jmlRebus, $jmlRebustelur, 0, $jmlGorengtelur);
                    } elseif ($jmlGorengtelur == null) {
                        $jumlah->getJumlah($jmlRebus, $jmlRebustelur, $jmlGoreng, 0);
                    } else {
                        $jumlah->getJumlah($jmlRebus, $jmlRebustelur, $jmlGoreng, $jmlGorengtelur);
                    }

                    $jumlah->setHarga();
                    $jumlah->cetakStruk();
                }
                ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Pembelian</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="form">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Masukkan Jumlah Mie Rebus yang
                                Dibeli</label>
                            <input type="number" class="form-control" name="mierebus" id="mierebus" value="0">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Masukkan Jumlah Mie Rebus Telur yang
                                Dibeli</label>
                            <input type="number" class="form-control" name="mierebustelur" id="mierebustelur"
                                value="0">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Masukkan Jumlah Mie Goreng yang
                                Dibeli</label>
                            <input type="number" class="form-control" name="miegoreng" id="miegoreng" value="0">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Masukkan Jumlah Mie Goreng Telur yang
                                Dibeli</label>
                            <input type="number" class="form-control" name="miegorengtelur" id="miegorengtelur"
                                value="0">
                        </div>

                        <div class="modal-footer">
                            <button type="button" id="btnbakwan" onclick="OnlyR()" class="btn btn-primary"
                                style="float:left;">Mie Rebus</button>
                            <button type="button" id="btnbakso" onclick="OnlyRt()" class="btn btn-primary"
                                style="float:left;">Mie Rebus Telur</button>
                            <button type="button" id="btnkopi" onclick="OnlyR()" class="btn btn-primary"
                                style="float:left;">Mie Goreng</button>
                            <button type="button" id="btnkue" onclick="OnlyRt()" class="btn btn-primary"
                                style="float:left;">Mie Goreng Telur</button>
                            <button type="button" id="btnkeduanya" onclick="Semua()" class="btn btn-primary"
                                style="float:left;"> Semua</button>
                            <div class="">
                                <button type="submit" onclick="exit()" class="btn btn-primary"
                                    data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                <button type="submit" class="btn btn-primary" name="check"><i
                                        class="fa fa-check"></i>
                                    Cek Total</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</body>

</html>

<script type="text/javascript">
    function OnlyR() {
        document.getElementById("miegoreng").readOnly = true;
        document.getElementById("miegorengtelur").readOnly = true;
        document.getElementById("mierebus").readOnly = false;
        document.getElementById("mierebustelur").readOnly = true;
        document.getElementById("btnG").disabled = false;
        document.getElementById("btnGt").disabled = false;
        document.getElementById("btnR").disabled = true;
        document.getElementById("btnRt").disabled = false;
    }

    function OnlyRt() {
        document.getElementById("miegoreng").readOnly = true;
        document.getElementById("miegorengtelur").readOnly = true;
        document.getElementById("mierebus").readOnly = true;
        document.getElementById("mierebustelur").readOnly = false;
        document.getElementById("btnG").disabled = false;
        document.getElementById("btnGt").disabled = false;
        document.getElementById("btnR").disabled = false;
        document.getElementById("btnRt").disabled = true;
    }

    function Semua() {
        document.getElementById("miegoreng").readOnly = false;
        document.getElementById("miegorengtelur").readOnly = false;
        document.getElementById("mierebus").readOnly = false;
        document.getElementById("mierebustelur").readOnly = false;
        document.getElementById("btnG").disabled = false;
        document.getElementById("btnGt").disabled = false;
        document.getElementById("btnR").disabled = false;
        document.getElementById("btnRt").disabled = false;
    }

    function exit() {
        document.getElementById("miegoreng").readOnly = true;
        document.getElementById("miegorengtelur").readOnly = true;
        document.getElementById("mierebus").readOnly = true;
        document.getElementById("mierebustelur").readOnly = true;
    }
</script>
