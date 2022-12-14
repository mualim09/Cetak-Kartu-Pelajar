<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Halaman Admin</h3>
        </div>

        <div>
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pelanggaran</h4>
                <div class="table-responsive m-t-40">

                    <a href="<?= base_url() ?>Admin/pelanggaran_tambah" class="btn btn-rounded btn-sm btn-primary">Tambah</a>
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Siswa</td>
                                <td>XII TKJ 2</td>
                                <td>
                                    <a class="btn btn-sm btn-rounded btn-danger" href=""><i class="fa fa-times"></i></a>
                                    <a class="btn btn-sm btn-rounded btn-warning" href=""><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-sm btn-rounded btn-info" href=""><i class="fa fa-eye"></i></a>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>