<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Barang</h1>
<!-- <p class="mb-4"><a href="produksi.php">Produksi</a> > KelolaBarang</p> -->
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
<?php
if (isset($_GET['cari'])) {
    echo "<p class='mb-3 text-green' style='color: green; font-weight: bold;'>Hasil pencarian \"" . $_GET['cari'] . "\"</p>";
}
?>
<div class="container" style="max-width: 570px;">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-7" style="flex: 0 0 100%; max-width: 100%;">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 font-weight-bold" style="margin-bottom: 20px;">
                                <?php
                                if (isset($data['barang'])) {
                                    echo "Edit Barang";
                                } else {
                                    echo "Tambah Barang";
                                }
                                ?>
                            </h1>
                        </div>
                        <form class="user" action="<?php if (isset($data['barang'])) {
                                                        echo BASEURL . '/product/update';
                                                    } else {
                                                        echo BASEURL . '/product/create';
                                                    } ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php if (isset($data['barang'])) {
                                                                            echo $data['barang']['no'];
                                                                        } ?>">
                                <label class="font-weight-bold">Nama Barang</label>
                                <input type="text" class="form-control" id="exampleInputProductName" placeholder="Nama Barang" name="namabarang" value="<?php if (isset($data['barang'])) {
                                                                                                                                                            echo $data['barang']['namabarang'];
                                                                                                                                                        } ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah</label>
                                <input type="number" class="form-control" id="exampleInputHargaDasar" placeholder="Jumlah" name="jumlah" value="<?php if (isset($data['barang'])) {
                                                                                                                                                    echo $data['barang']['jumlah'];
                                                                                                                                                } ?>" required>
                            </div>

                            <button class="btn btn-primary btn-block" name="<?php if (isset($data['barang'])) {
                                                                                echo 'simpan';
                                                                            } else {
                                                                                echo 'tambah';
                                                                            } ?>" <?php if (isset($data['barang'])) {
                                                                                        echo "onclick=\"return confirm('Apakah anda yakin ingin menyimpan perubahan?')\"";
                                                                                    } ?>>
                                <?php
                                if (isset($data['barang'])) {
                                    echo "<i class='fas fa-save fa-sm text-white-50'></i><i>&nbsp;</i><i>&nbsp;</i>";
                                    echo 'Simpan';
                                } else {
                                    echo "<i class='fas fa-plus fa-sm text-white-50'></i><i>&nbsp;</i><i>&nbsp;</i>";
                                    echo 'Tambah';
                                } ?>
                            </button>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <!--div class="dataTables_wrapper dt-bootstrap4" id="dataTable_wrapper">
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="dataTables_length" id="dataTable_length">
                        <label>Tampil
                          <select name="dataTable_length" class="custom-select custom-select-sm form-control form-control-sm" aria-controls="dataTable" onchange="window.document.location.href=this.options[this.selectedIndex].value;">
                            <option value="produk.php?entri=5" <?php if (isset($_GET['entri'])) {
                                                                    if ($_GET['entri'] == 5) {
                                                                        echo "selected";
                                                                    }
                                                                } ?>>5</option>
                            <option value="produk.php?entri=10" <?php if (isset($_GET['entri'])) {
                                                                    if ($_GET['entri'] == 10) {
                                                                        echo "selected";
                                                                    }
                                                                } ?>>10</option>
                            <option value="produk.php?entri=25" <?php if (isset($_GET['entri'])) {
                                                                    if ($_GET['entri'] == 25) {
                                                                        echo "selected";
                                                                    }
                                                                } ?>>25</option>
                            <option value="produk.php?entri=50" <?php if (isset($_GET['entri'])) {
                                                                    if ($_GET['entri'] == 50) {
                                                                        echo "selected";
                                                                    }
                                                                } ?>>50</option>
                          </select> entri
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="dataTables_filter" id="dataTable_filter">
                        <form action="produk_cari.php" method="post">
                          <label>Cari:
                            <input class="form-control form-control-sm" aria-controls="dataTable" type="search" name="cari" id="cari" placeholder="">
                            <button class="btn btn-primary" type="submit" name="submit">
                              <i class="fas fa-search fa-sm"></i>
                            </button>
                          </label>  
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12"-->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['barangs'] as $barang) : ?>
                        <tr>
                            <td><?= $barang['no'] ?></td>
                            <td><?= $barang['namabarang'] ?></td>
                            <td><?= $barang['jumlah'] ?></td>
                            <td>
                                <div class="text-center">
                                    <a href="<?= BASEURL; ?>/barang/detail/<?= $barang['no'] ?>" class="btn btn-primary" style="color: white; cursor: pointer; margin: 0px 4px 4px 0px;">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="<?= BASEURL; ?>/barang/delete/<?= $barang['no'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')" class="btn btn-danger" style="color: white; cursor: pointer; margin: 0px 4px 4px 0px;">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <!--AKHIR PERULANGAN-->
                </tbody>
            </table>
        </div>
    </div>
    <!--div class="row">
                    <div class="col-sm-12 col-md-5">
                      <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite"><?php
                                                                                                        $nomor = 0;
                                                                                                        if (isset($_GET['page'])) {
                                                                                                            $nomor = ((int)$_GET['page'] * (int)$per_hal) - (int)$per_hal + 1;
                                                                                                        } else {
                                                                                                            $nomor = 1;
                                                                                                        }
                                                                                                        echo "Menampilkan " . (($jumlah_record == 0) ? 0 : $nomor) . " sampai " . (($nomor + ($per_hal - 1)) >= $jumlah_record ? $jumlah_record : ($nomor + ($per_hal - 1))) . " dari " . $jumlah_record . " entri";
                                                                                                        ?>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                      <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                        <ul class="pagination">
                        <?php
                        if (isset($_GET['page'])) {
                            $previous = (int)$_GET['page'] - 1;
                            $next = (int)$_GET['page'] + 1;
                        }
                        ?>
                          <li class="paginate_button page-item previous <?php if (isset($_GET['page'])) {
                                                                            if ($_GET['page'] == 1) {
                                                                                echo 'disabled';
                                                                            }
                                                                        } else {
                                                                            echo 'disabled';
                                                                        } ?>" id="dataTable_previous">
                            <a tabindex="0" class="page-link" aria-controls="dataTable" href="<?php if (isset($_GET['page'])) {
                                                                                                    if ($_GET['page'] != 1) {
                                                                                                        echo '?entri=' . $per_hal . '&page=' . $previous;
                                                                                                    }
                                                                                                } ?>" data-dt-idx="0">Previous</a>
                          </li>
                            <?php
                            for ($x = 1; $x <= $halaman; $x++) {
                            ?>
                              <li class="paginate_button page-item <?php if (isset($_GET['page'])) {
                                                                        if ($_GET['page'] == $x) {
                                                                            echo 'active';
                                                                        }
                                                                    } else {
                                                                        echo $x == 1 ? 'active' : '';
                                                                    } ?>">
                                <a tabindex="0" class="page-link" aria-controls="dataTable" href="?entri=<?php echo $per_hal; ?>&page=<?php echo $x; ?>" data-dt-idx="1"><?php echo $x ?></a>
                              </li>
                            <?php
                            }
                            ?>
                          
                          <li class="paginate_button page-item next <?php if (isset($_GET['page'])) {
                                                                        if ($_GET['page'] == $halaman) {
                                                                            echo 'disabled';
                                                                        }
                                                                    } else if (($jumlah_record == 0) || ($jumlah_record <= $per_hal)) {
                                                                        echo 'disabled';
                                                                    } ?>" id="dataTable_next">
                            <a tabindex="0" class="page-link" aria-controls="dataTable" href="<?php if (isset($_GET['page'])) {
                                                                                                    if ($_GET['page'] != $halaman) {
                                                                                                        echo '?entri=' . $per_hal . '&page=' . $next;
                                                                                                    }
                                                                                                } else {
                                                                                                    echo $halaman > 1 ? '?entri=' . $per_hal . '&page=2' : '';
                                                                                                } ?>" data-dt-idx="2">Next</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div-->