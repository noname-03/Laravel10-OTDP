@extends('layouts.app')
@section('title', 'Rekomendasi')
@section('data.otdp', 'menu-open')
@section('recomendation', 'active')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rekomendasi</h1>
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
                            <a href="{{ route('otdp.create') }}" type="button" class="btn btn-primary btn-sm">Tambah
                                Data</a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Umur</th>
                                        <th>Pekerjaan</th>
                                        <th>Destinasi Tujuan</th>

                                        <th>Hasil</th>
                                        <th>Nominal</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_otdps as $otdp)
                                    @php
                                $nominal = 0;
                                if ($otdp->hasil == 'Jarak Dekat') {
                                    $nominal = 120.000;
                                } else {
                                    $nominal = 150.000;
                                }
                            @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $otdp->nama }}</td>
                                        <td>{{ $otdp->umur }}</td>
                                        <td>{{ $otdp->pekerjaan }}</td>
                                        <td>{{ $otdp->destinasi_tujuan }}</td>
                                        <td>{{ $otdp->hasil }}</td>
                                        <td>Rp.{{ $nominal }}.000</td>
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
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }},
                {
                extend: 'excel'
            }],
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush
