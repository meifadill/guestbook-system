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
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://127.0.0.1:8000/broadcast">
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

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/data-tamu-inap">
            <!-- <i class="fas fa-fw fa-chart-area"></i> -->
            <span>Data Tamu Reservasi</span></a>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Charts -->
    <li class="nav-item" hidden>
        <a class="nav-link" href="http://127.0.0.1:8000/data-tamu">
            <!-- <i class="fas fa-fw fa-chart-area"></i> -->
            <span>Data Rombongan Tamu</span></a>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider" hidden>

    <!-- Nav Item - Tables -->
    <li class="nav-item  active">
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
                <div class="container-fluid pl-4">

                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Nomor Subscriber</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nomor</th>
                                            <th>Nama</th>
                                            <th>Daftar</th>
                                            <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach($data_subscribe as $item)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->no}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <button type="button" class="btn-sm btn btn-primary" data-toggle="modal" data-target="#ModalSubscribe-{{$item->id_subscribe}}">Edit</button>
                                                <a href="/delete-nomor/{{$item->id_subscribe}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating">
                        <!-- ketika tombol broadcast ditekan maka akan mengeksekusi  form aksi dibawah -->
                        <form action="{{route('kirim.broadcast')}}" enctype="multipart/form-data"  method="post">
                            @csrf
                            <input type="text" class="form-control" name="judul" placeholder="Judul / Event" required>
                            <textarea name="pesan" class="form-control" placeholder="Write text here" id="floatingTextarea2" style="height: 100px; margin-bottom: 10px; margin-top: 5px;" required></textarea>
                            <input class="btn btn-primary" type="submit" value="Broadcast"> 
                        </form>
                    </div>
                    <br>

                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">History Broadcast</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul (Event)</th>
                                            <th>Pesan</th>
                                            <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach($data_broadcast as $item)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->judul}}</td>
                                            <td>{{$item->pesan}}</td>
                                            <td>
                                                <a href="/delete-broadcast/{{$item->id_broadcast}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm">Hapus</a>

                                            </td>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logutmodal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logutmodal">Yakin ingin keluar?</h5>
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



<!-- Modal Subscriber -->
@foreach($data_subscribe as $item)
<div class="modal fade" id="ModalSubscribe-{{$item->id_subscribe}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{$item->id_subscribe}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel-{{$item->id_subscribe}}">Detail Nomor Subscriber</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('editNomor')}}" method="post">
      <div class="modal-body">
        @csrf
        <input type="hidden" name="id" value="{{$item->id_subscribe}}">
        <input type="text" class="form-control" name="no" value="{{$item->no}}">
        <br>
        <input type="text" class="form-control" name="nama" value="{{$item->nama}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="http://wa.me/{{$item->no}}" class="btn btn-primary" target="blank">Cek Nomor</a>
        <input class="btn btn-success" type="submit" value="Simpan">
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach
<!-- Modal Subscriber -->



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

    <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
    
    </script> -->

</body>

</html>