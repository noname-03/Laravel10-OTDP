@extends('layouts.app')
@section('title', 'Dashboard')
@section('dashboard', 'active')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h5><b>LAYANAN PEMBUATAN PENGANTAR BAGI ORANG TERLANTAR DALAM PERJALANAN (OTDP)</b></h5>
                        </div>
                        <div class="card-body">
                            <p>Pelayanan Orang Terlantar Dalam Perjalanan (atau otdp) / merupakan layanan yang diberikan
                                pemerintah daerah kota cirebon / melalui dinas sosial kepada masyarakat miskin atau
                                tidak
                                mampu yang kehabisan ongkos atau bekal / sehingga terlantar di wilayah kota cirebon.
                                kegiatan ini bertujuan / memberikan bantuan kepada masyarakat miskin atau tidak mampu
                                yang
                                terlantar di wilayah kota cirebon / untuk dikembalikan ke daerah asal sebagai bentuk
                                kepedulian kepada sesama. / tata cara pengembalian “otdp” ini dilakukan bersama dinas
                                perhubungan melalui upt. terminal harjamukti / yang selanjutnya diberangkatkan ke daerah
                                asal / baik secara langsung maupun estafet.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h5><b>Persyaratan Orang Terlantar Dalam Perjalanan (OTDP)</b></h5>
                        </div>
                        <div class="card-body">
                            <p>
                                1. Surat Keterangan Terlantar dari Polsek atau Polres wilayah hukum di Kota Cirebon.
                                <br>
                                2. Surat Pengantar dari Dinas Sosial sebelumnya (jika otdp tersebut estafet). <br>
                                3. Menunjukan KTP asli ataupun fotocopy (Opsional). <br>
                                Dari 3 persyaratan diatas ada satu persyatan yang wajib orang terlantar bawa yaitu
                                adalah Surat Keterangan Terlantar dari Polsek atau Polres Wilayah Hukum yang ada di Kota
                                Cirebon

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection