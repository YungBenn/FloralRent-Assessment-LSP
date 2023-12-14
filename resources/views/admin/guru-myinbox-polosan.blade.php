<!DOCTYPE html>
<html lang="en">
@include('partial.header')

<body>
    <div class="app">
        @include('partial.navbar')
        <div class="dashboard order">
            @include('partial.sidebar-guru')

            <div class="order-box dashboard-box">
                <h1 style="text-decoration: underline;text-decoration-color: #C5D22E; ">Rincian Order</h1>
                <div class="tagBungkus d-flex align-items-center">
                    <p>Order Status</p>
                    <img src="../asset/book.png" class="ms-5" alt="">
                </div>
                <div class="report">
                    <div class="reportData">
                        <div class="headData">
                            <img src="../asset/tasReport.png" alt="logo">
                            <h2>Total Penyewaan</h2>
                        </div>
                        <h1>{{ $penyewaan->count() }}</h1>
                    </div>
                    <div class="reportData">
                        <div class="headData">
                            <img src="../asset/orangReport.png" alt="logo">
                            <h2>Total User</h2>
                        </div>
                        <h1>{{ $user->count() }}</h1>
                    </div>
                    {{-- <div class="reportData">
                        <div class="headData">
                            <img src="../asset/ceklistReport.png" alt="logo">
                            <h2>Total Pendapatan</h2>
                        </div>
                        @php $total=0 @endphp
                        @foreach ($order as $ord)
                        @php
                        $ord->status === 'Verified' ? $total += $ord->price : $total +=0
                        @endphp
                        @endforeach
                        <h1>{{$total}}</h1>
                    </div> --}}
                </div>
                <div class="class-subtle dashboard-subtle">
                    Order Status
                </div>
                <div class="tableOrder">
                    <table class="order-table mx-auto">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Nama Karangan Bunga</td>
                                <td>Kode Karangan Bunga</td>
                                <td>Tanggal Sewa</td>
                                <td>Tanggal Wajib Pengembalian</td>
                                <td>Tanggal Pengembalian</td>
                                <td>Denda</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penyewaan as $item)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                {{-- <td><img src="../asset/thumbnails/{{$item->gambar}}" class="order-cover" alt=""></td> --}}
                                <td>{{$item->user->name}}</td>
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