<!DOCTYPE html>
<html lang="en">
@include('partial.header')

<body>
    <div class="app">
        @include('partial.navbar')
        <div class="dashboard order">
            @include('partial.sidebar-admin')

            <div class="order-box dashboard-box">
                <h1 style="text-decoration: underline;text-decoration-color: #C5D22E; ">Daftar Anggota</h1>
                <div class="tagBungkus d-flex align-items-center">
                    <a href="/admin/addanggota" class="btn btn-info mb-3">Tambah Anggota</a>
                </div>
                <div class="tableOrder">
                    <table class="order-table mx-auto">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Email</td>
                                <td>NoTelp</td>
                                <td>role</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td>{{ $item->role }}</td>
                                <td>
                                    <form action="/admin/deleteanggota/{{$item->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <button type="button" class="btn btn-warning"><a href="/admin/anggota/{{$item->id}}">Edit</button>
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