@extends('layouts.app')
@section('title', 'Tambah Data Otdp')
@section('data.otdp', 'menu-open')
@section('otdp', 'active')
@section('content')
<div class="content-wrapper" style="min-height: 1345.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Formulir otdp</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data otdp</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('otdp.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">No. Kepolisian</label>
                                        <input type="text" class="form-control" name="no" placeholder="No. Kepolisian"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tanggal Pelapor</label>

                                            <input type="date" class="form-control" required name="no_pelapor">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Usia</label>
                                        <input type="number" class="form-control" required name="umur"
                                            placeholder="Usia">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tempat Tanggal Lahir</label>
                                        <div class="row">
                                            <div class="col-4">
                                                <input type="text" class="form-control" required name="tempat_lahir"
                                                    placeholder="Contoh : Cirebon">
                                            </div>
                                            <div class="col-8">
                                                <input type="date" class="form-control" required name="tanggal_lahir">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alamat</label>
                                        <textarea class="form-control" required name="alamat"
                                            placeholder="Alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <select class="form-control" name="pekerjaan">
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="Buruh">Buruh</option>
                                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                            <option value="Pelajar">Pelajar</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Destinasi Tujuan</label>
                                        <select class="form-control" id="destinasi_tujuan" name="destinasi_tujuan">
                                            <option value="Jawa">Jawa</option>
                                            <option value="Luar Jawa">Luar Jawa</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="form_pulau" style="display: none;">
                                        <label>Pulau Tujuan</label>
                                        <select class="form-control" id="destinasi_pulau" name="destinasi_pulau">
                                            <option value=""></option>
                                            <option value="Sumatra">Sumatra</option>
                                            <option value="Kalimantan">Kalimantan</option>
                                            <option value="Sulawesi">Sulawesi</option>
                                            <option value="Bali_Nusa_Tenggara">Bali Nusa Tenggara</option>
                                            <option value="Papua">Papua</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <select class="form-control" id="provinsi" name="provinsi">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kota / Kabupaten</label>
                                        <input type="text" class="form-control" name="kota" placeholder="Kota/Kabupaten" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Dokumen</label>
                                        <input class="form-control-file" type="file" name="file" id="file"
                                            accept="image/*" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Foto</label>
                                        <input class="form-control-file" type="file" name="foto" id="file2"
                                            accept="image/*" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@push('script')

<script>
    const destinasiTujuan = document.getElementById("destinasi_tujuan");
const formPulau = document.getElementById("form_pulau");
const pulauTujuan = document.getElementById("destinasi_pulau");
const provinsiTujuan = document.getElementById("provinsi");

destinasiTujuan.addEventListener("change", function() {
  if (destinasiTujuan.value === "Jawa") {
    formPulau.style.display = "none";
    pulauTujuan.value = "";
    provinsiTujuan.style.display = "block";
    provinsiTujuan.disabled = false;
    showProvinsiJawa();
  } else {
    formPulau.style.display = "block";
  }
});

pulauTujuan.addEventListener("change", function() {
  if (pulauTujuan.value === "") {
    provinsiTujuan.innerHTML = ""; // Clear existing options
    return;
  }

  if (destinasiTujuan.value === "Luar Jawa") {
    showProvinsiNonJawa(pulauTujuan.value);
    showProvinsiNonJawa(Sumatra);
  }
});

function showProvinsiJawa() {
  provinsiTujuan.innerHTML = ""; // Clear existing options

  const jawaProvinsi = ["Jawa Barat", "Jawa Tengah", "Jawa Timur", "DKI Jakarta"];
  for (let provinsi of jawaProvinsi) {
    const option = document.createElement("option");
    option.value = provinsi;
    option.textContent = provinsi;
    provinsiTujuan.appendChild(option);
  }
}

function showProvinsiNonJawa(pulau) {
  provinsiTujuan.innerHTML = ""; // Clear existing options

  // Define provinsi for each pulau
  const pulauProvinsi = {
    Sumatra: ["Aceh", "Sumatra Utara", "Sumatra Barat", "Riau", "Kepulauan Riau", "Jambi", "Bengkulu", "Sumatra Selatan", "Kepulauan Bangka Belitung", "Lampung"],
    Kalimantan: [
        "Kalimantan Barat",
        "Kalimantan Tengah",
        "Kalimantan Selatan",
        "Kalimantan Timur",
        "Kalimantan Utara"
        ],
    Sulawesi: ["Sulawesi Utara",
        "Sulawesi Tengah",
        "Sulawesi Selatan",
        "Sulawesi Tenggara",
        "Gorontalo",
        "Sulawesi Barat"],
    "Bali_Nusa_Tenggara": ["Bali",
    "Nusa Tenggara Barat",
    "Nusa Tenggara Timur"],
    Papua: ["Papua Barat",
        "Papua",
        "Papua Selatan",
        "Papua Tengah",
        "Papua Pegunungan",
        "Papua Barat Daya"]
    };

  const selectedProvinsi = pulauProvinsi[pulau];
  if (selectedProvinsi) {
    for (let provinsi of selectedProvinsi) {
      const option = document.createElement("option");
      option.value = provinsi;
      option.textContent = provinsi;
      provinsiTujuan.appendChild(option);
    }
  }
}

// Menampilkan provinsi Jawa secara default
showProvinsiJawa();


</script>
@endpush
