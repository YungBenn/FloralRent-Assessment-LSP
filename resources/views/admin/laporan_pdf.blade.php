<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penyewaan FloralRent</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h3>Laporan Penyewaan</h3>
	</center>

	<table class='table table-bordered mt-3'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Nama Karangan Bunga</th>
				<th>Kode Karangan Bunga</th>
				<th>Tanggal Sewa</th>
				<th>Tanggal Wajib Pengembalian</th>
                <th>Tanggal Pengembalian</th>
			</tr>
		</thead>
		<tbody>
        @forelse ($riwayat_penyewaan as $item )
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->karangan_bunga->nama_karanganbunga }}</td>
            <td>{{ $item->karangan_bunga->kode_karanganbunga }}</td>
            <td>{{ $item->tanggal_sewa }}</td>
            <td>{{ $item->tanggal_wajib_kembali }}</td>
            <td>{{ $item->tanggal_pengembalian }}</td>
        </tr>
        @empty

        @endforelse
		</tbody>
	</table>

</body>
</html>