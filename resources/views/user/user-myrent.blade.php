<!DOCTYPE html>
<html lang="en">
@include('partial.header')

<body>
    <div class="app">
        @include('partial.navbar')
        <div class="dashboard order">
            @include('partial.sidebar-user')

            <div class="order-box dashboard-box">
                <h1 style="text-decoration: underline;text-decoration-color: #C5D22E; ">Rincian Order</h1>
                
                <div class="titleVideo d-flex align-items-center">
                    <p>Order Status</p>
                    <img src="../../../asset/coin.png" alt="" class="ms-4">
                </div>
                <div class="class-subtle dashboard-subtle">
                    Order Status
                </div>
                <div class="tableOrder">
                    <table class="order-table mx-auto">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Karangan Bunga</td>
                                <td>Kode Karangan Bunga</td>
                                <td>Tanggal Sewa</td>
                                <td>Tanggal Wajib Pengembalian</td>
                                <td>Tanggal Pengembalian</td>
                                <td>Denda</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penyewaanuser as $item)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $item->karangan_bunga->nama_karanganbunga }}</td>
                                <td>{{ $item->karangan_bunga->kode_karanganbunga }}</td>
                                <td>{{ $item->tanggal_sewa }}</td>
                                <td>{{ $item->tanggal_wajib_kembali }}</td>
                                <td>{{ $item->tanggal_pengembalian }}</td>
                                <td style="{{ $item->denda == '0' ? 'background-color: green; color: white;' : ($item->denda == null ? 'background-color: white; color: white;' : 'color: white;') }}">{{ $item->denda }}</td>
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