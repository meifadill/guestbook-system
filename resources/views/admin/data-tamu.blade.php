<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Data Tamu</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="vendor/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

     <!-- Page Wrapper -->
     <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://127.0.0.1:8000/data-tamu">
        <div class="sidebar-brand-text mx-3">Homestay Java Turtle</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/beranda">
            <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/data-tamu-inap">
            <!-- <i class="fas fa-fw fa-chart-area"></i> -->
            <span>Data Tamu Reservasi</span></a>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Charts -->
    <li class="nav-item" hidden>
        <a class="nav-link active" href="http://127.0.0.1:8000/data-tamu">
            <!-- <i class="fas fa-fw fa-chart-area"></i> -->
            <span>Data Rombongan Tamu</span></a>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider" hidden>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/broadcast">
            <!-- <i class="fas fa-fw fa-table"></i> -->
            <span>Broadcast Promo</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <!-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> -->

</ul>
<!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin Homestay</span>
                                <img class="img-profile rounded-circle"
                                    src="vendor/admin/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid text-center pl-4 ml-4">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Tabel Data Tamu</h1> -->
                
                    <!-- DataTales Example -->
                    <div class="card shadow mb-10 mr-5">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tamu Rombongan</h6>
                        </div>
                        <div class="card-body">
                            <div class="row ml-5 pl-5 mr-5">
                                <div class="col-md-4 ml-5">
                                    <div class="form-group">
                                        <label>Dari Tanggal</label>
                                        <form action="{{route('filter')}}" method="post">
                                            @csrf
                                        <input type="date" class="form-control" name="tanggal1" required>
                                        <br>
                                        <div class="col text-right">
                                            <a href="/export-tamu" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm text-right">
                                            <i class="fas fa-download fa-sm text-white-50"></i> Ekspor</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 ml-5">
                                    <div class="form-group">
                                        <label>Sampai Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal2" required>
                                        <br>
                                        <div class="col text-left">
                                            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm text-center">
                                            <i class="fas fa-search fa-sm text-white-50 "></i> Tampilkan</a>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableTamu" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Check in</th>
                                            <th>Check out</th>
                                            <th>Nama</th>
                                            <th>Pekerjaan</th>
                                            <th>Alamat</th>
                                            <th>No Hp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach($alls as $all)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$all->check_in}}</td>
                                            <td>{{$all->check_out}}</td>
                                            <td>{{$all->nama}}</td>
                                            <td>{{$all->pekerjaan}}</td>
                                            <td>{{$all->alamat}}</td>
                                            <td>{{$all->no_hp}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" dibawah jika ingin keluar dari halaman admin sistem buku tamu.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/admin/vendor/jquery/jquery.min.js"></script>
    <script src="vendor/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="vendor/admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="vendor/admin/js/demo/datatables-demo.js"></script>

</body>

</html>