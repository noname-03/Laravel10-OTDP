@extends('layouts.app')
@section('title', 'Hasil')
@section('data.otdp', 'menu-open')
@section('hasil', 'active')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                    data-toggle="dropdown">
                                    Filter
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('hasil.index') }}">Semua</a>
                                    <a class="dropdown-item"
                                        href="{{ route('hasil.index', ['month' => date('n')]) }}">Per Bulan</a>
                                    <a class="dropdown-item"
                                        href="{{ route('hasil.index', ['week' => date('W')]) }}">Per Minggu</a>
                                    <a class="dropdown-item"
                                        href="{{ route('hasil.index', ['year' => date('Y')]) }}">Per Tahun</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>No. Kepolisian</th>
                                        <th>No. Pelapor</th>
                                        <th>Alamat</th>
                                        <th>Umur</th>
                                        <th>Tempat Tanggal Lahir</th>
                                        <th>Pekerjaan</th>
                                        <th>Destinasi Tujuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_otdps as $otdp)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $otdp->nama }}</td>
                                        <td>{{ $otdp->no_kepolisian }}</td>
                                        <td>{{ $otdp->no_pelapor }}</td>
                                        <td>{{ $otdp->alamat }}</td>
                                        <td>{{ $otdp->umur }}</td>
                                        <td>{{ $otdp->tempat_lahir }} {{$otdp->tanggal_lahir}}</td>
                                        <td>{{ $otdp->pekerjaan }}</td>
                                        <td>{{$otdp->kota}}-{{ $otdp->destinasi_tujuan }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@push('script')
<!-- Page specific script -->
<script>
    $(function() {
        $("#example3").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [
                {
                    extend: 'pdf',
                },
                {
                    extend: 'excel'
                }
            ],
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush