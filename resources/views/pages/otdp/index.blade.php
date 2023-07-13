@extends('layouts.app')
@section('title', 'Data Otdp')
@section('data.otdp', 'menu-open')
@section('otdp', 'active')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Otdp</h1>
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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>No. Kepolisian</th>
                                        <th>Umur</th>
                                        <th>Tempat Tanggal Lahir</th>
                                        <th>Pekerjaan</th>
                                        <th>Destinasi Tujuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_otdps as $otdp)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $otdp->nama }}</td>
                                        <td>{{ $otdp->no_kepolisian }}</td>
                                        <td>{{ $otdp->umur }}</td>
                                        <td>{{ $otdp->tempat_lahir }} {{$otdp->tanggal_lahir}}</td>
                                        <td>{{ $otdp->pekerjaan }}</td>
                                        <td>{{ $otdp->destinasi_tujuan }}</td>
                                        <td style="text-align: center;">
                                            <form action="{{ route('otdp.destroy', $otdp->id) }}" method="POST">
                                                @method('DELETE') @csrf
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('otdp.edit', $otdp->id)}}"
                                                        class="btn btn-sm btn-outline-secondary">
                                                        Edit
                                                    </a>
                                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                                        class="btn btn-sm btn-outline-danger">
                                                        Delete
                                                    </button>
                                                </div>
                                            </form>

                                        </td>
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
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
</script>
@endpush