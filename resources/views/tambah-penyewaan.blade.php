<!DOCTYPE html>
<html lang="en">
@include('partial.header')
@include('sweetalert::alert')

<body>
    <div class="app">
        @include('partial.navbar')
        <section class="karanganbunga-container">
         <div class="addclass-box dashboard-box">
                <h1 style="text-decoration: underline;text-decoration-color: #C5D22E;" >Tambah Penyewaan</h1>
                <div class="tagBungkus d-flex align-items-center">
                    <p>Tambah</p>
                    <img src="../asset/security.png" class="ms-5" alt="">
                </div>
                <div class="class-subtle dashboard-subtle">
                        <img src="../asset/edit.svg" alt="">
                        Tambah Penyewaan
                </div>
                <form action="{{route('penyewaan.userstore')}}" class="dashboard-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="addclass-subtle dashboard-subtle">
                        <img src="../asset/edit.svg" alt="">
                        Tambah Penyewaan
                    </div>

                    <div class="addclass-input-grup dashboard-input-grup">
                        <label for="users_id" class="text-primary font-weight-bold">User</label>
                        <select name="users_id" id="" class="form-control">
                            <option value=""></option>
                            @forelse ($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @empty
                                user tidak tersedia
                            @endforelse
                        </select>
                    </div>

                    @error('users_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="addclass-input-grup dashboard-input-grup">
                        <label for="karanganbunga_id" class="text-primary font-weight-bold">Karangan bunga yang akan disewa</label>
                        <select name="karanganbunga_id" id="karanganbunga_id" class="form-control">
                            @forelse ($karanganbunga as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_karanganbunga }} ( {{ $item->kode_karanganbunga }} ) - {{ $item->status }}</option>
                            @empty
                                tidak ada karangan bunga yang tersedia
                            @endforelse
                        </select>
                    </div>

                    @error('karanganbunga_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <!-- tombol submit -->
                    <button class="addclass-cta cta" type="submit">Submit</button>
                </form>
            </div>
        </section>

        @include('partial.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>