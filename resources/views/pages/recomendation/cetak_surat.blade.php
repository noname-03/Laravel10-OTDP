<body onload="javascript:window.print()" style="margin: auto; width:90%">
<div style="margin-left: 10px; margin-right: 10px;"></div>

<p>&nbsp;</p>
@php
$nolapor = $data_otdp->no_pelapor;

$nolapor_formatted = date("d-m-Y", strtotime($nolapor));
@endphp
<table width="100%" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td rowspan="3"><div align="center"><img src="{{ asset('admin/dist/images/KotaCirebon.png') }}" width="100" height="100"></div></td>

        <td><div align="center"><font size="5">PEMERINTAH DAERAH KOTA CIREBON</font></div></td>
	</tr>
	<tr>
		<td><div align="center"><font size="6">DINAS SOSIAL</font></div></td>
	</tr>
	<tr>
		<td><div align="center"><font size="3">Jl. Brigjend Dharsono No. 4 By Pass Telp. (0231) 486867 Fax. (0231) 486867</font></div></td>
	</tr>
    <tr>

    </tr>
</table>
<div style="margin: 0; padding: 0;"><hr style="width: 100%; border: 2px solid black;"></div>
<p align="justify">&nbsp &nbsp &nbsp Bedasarkan Surat Keterangan Polri Jawa Barat Resor Cirebon Kota Sektor Nomor : {{ $data_otdp->no_kepolisian }} Tanggal {{ $nolapor_formatted }} Perihal Permohonan bantuan / pertolongan Orang Terlantar Diperjalanan ke Tempat asalnya, maka dengan ini kami hadapkan kepada saudara:</p>
      <div style="width: 50%; text-align: left; float: right;"></div><br>
       @php
       $tanggal_lahir = $data_otdp->tanggal_lahir;

$tanggal_lahir_formatted = date("d-m-Y", strtotime($tanggal_lahir));



                                $nominal = 0;
                                if ($data_otdp->hasil == 'Jarak Dekat') {
                                    $nominal = 120.000;
                                } else {
                                    $nominal = 150.000;
                                }
                            @endphp
        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"> {{$data_otdp->nama}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Tempat, tanggal lahir</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $data_otdp->tempat_lahir }}, {{$tanggal_lahir_formatted}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Pekerjaan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$data_otdp->pekerjaan }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{$data_otdp->alamat}}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat Tujuan</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{$data_otdp->kota}}-{{ $data_otdp->destinasi_tujuan }}</td>
            </tr>
              <tr>
                <td style="width: 30%; vertical-align: top;">Hasil Algoritma C4.5 </td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{$data_otdp->hasil}}</td>
            </tr>
              <tr>
                <td style="width: 30%; vertical-align: top;">Nomial </td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">Rp.{{$nominal}}.000</td>
            </tr>


        </table>

        <p align="justify">&nbsp &nbsp &nbsp Setelah kami mengadakan wawancara seperlunya, ternyata yang bersangkutan di Kota Cirebon dalam keadaan terlantar dan tidak mempunyai sanak saudara. Sehubungan anggaran pemulangan orang terlantar di perjalanan sangat terbatas, dengan ini kami mohon bentuan saudara agar klien tersebut dapat diikut sertakan dalam angkutan bus menuju</p>
        <p align="justify">&nbsp &nbsp &nbsp Demikian surat keterangan ini dibuat untuk dipergunakan untuk dipergunakan sebagaimana mestinya dan atas kerjasamanya kami ucapkan terima kasih</p>
        <div style="width: 50%; text-align: left; float: right;"></div><br>
        <div style="width: 50%; text-align: left; float: right;"><b>KOTA CIREBON</b></div><br>
        <div style="width: 50%; text-align: left; float: right;"><b>Sub koodinator Perlindungan dan Jamsos</b></div><br><br><br><br><br>
        <div style="width: 50%; text-align: left; float: right;">MEISI SULIZA ,S.Pi</div><br>
        <div style="width: 50%; text-align: left; float: right;">NIP. 19720523 199903 2 002</div>
<br><br><br><br>
</body>
        {{-- <?php echo date("d M Y") ?> --}}
