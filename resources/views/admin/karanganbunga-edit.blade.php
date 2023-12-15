<!DOCTYPE html>
<html lang="en">
@include('partial.header')

<body>
    <div class="app">
        @include('partial.navbar')
        <div class="dashboard order">
            @include('partial.sidebar-guru')
            
            <h1>{{ $title }}</h1>
            <form action="{{ route('admin.updateKaranganBunga', $karanganbunga->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="addclass-input-grup dashboard-input-grup">
                        <label for="nama_karanganbunga">Nama Karangan Bunga</label>
                        <input class="w-100" type="text" name="nama_karanganbunga" id="title" value="" placeholder="Masukkan Nama Karangan Bunga" required>
                    </div>
                    <div class="addclass-input-grup dashboard-input-grup">
                        <label for="kode_karanganbunga">Kode Karangan Bunga</label>
                        <input class="w-100" type="text" name="kode_karanganbunga" id="title" value="" placeholder="Masukkan Kode Karangan Bunga"
                            required>
                    </div>
                    <div class="addclass-input-grup dashboard-input-grup">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="" id="description" cols="30" rows="10" maxlength="100"></textarea>
                        <!-- <input type="text" name="description" id="description" value=""
                            placeholder="Enter course description" required> -->
                    </div>
                    <div class="addclass-input-grup dashboard-input-grup">
                        <label for="kategori" class="font-weight-bold">Kategori</label>
                        <select class="w-100" name="kategori[]" id="multiselect" multiple="multiple">
                            @forelse ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @empty
                                tidak ada kategori
                            @endforelse
    
                        </select>
                    </div>
                    <div class="addclass-input-grup dashboard-input-grup">
                        <label for="pengirim">Pengirim</label>
                        <input class="w-100" type="text" name="pengirim" id="pengirim" min="0" max='200000' value=""
                            placeholder="Masukkan Nama Pengirim" required>
                    </div>
                    <div class="addclass-input-grup dashboard-input-grup">
                        <label for="gambar">Gambar</label>
                        <img class="img-preview img-fluid mb-3 col-md-5">
                        <input type="file" name="gambar" id="gambar" class="addclass-video" class=""
                            accept="image/*" class="setting-edit-photo" required onchange="previewImage()">
                    </div>
                <!-- Add more form fields if needed -->
                <button type="submit">Update</button>
            </form>
        </div>

        @include('partial.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>