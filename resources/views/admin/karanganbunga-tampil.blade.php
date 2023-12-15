<!DOCTYPE html>
<html lang="en">
@include('partial.header')

<body>
    <div class="app">
        @include('partial.navbar')
        <div class="dashboard order">
            @include('partial.sidebar-guru')

            <div class="order-box dashboard-box">
                <h1 style="text-decoration: underline;text-decoration-color: #C5D22E; ">Daftar Karangan Bunga</h1>
                <div class="tagBungkus d-flex align-items-center">
                    <a href="/floralrent/tambahkaranganbunga" class="btn btn-info mb-3">Tambah Karangan Bunga</a>
                </div>
                <div class="tableOrder">
                    <table class="order-table mx-auto">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode Karangan Bunga</td>
                                <td>Nama Karangan Bunga</td>
                                <td>Deskripsi</td>
                                <td>Pengirim</td>
                                <td>Status</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($karanganbunga as $item)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                {{-- <td><img src="../asset/thumbnails/{{$item->gambar}}" class="order-cover" alt=""></td> --}}
                                <td>{{ $item->kode_karanganbunga }}</td>
                                <td>{{ $item->nama_karanganbunga }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->pengirim }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger"><a href="hapuskaranganbunga">Delete</button>
                                    <button type="button" class="btn btn-warning"><a href="editkaranganbunga">Edit</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('partial.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>