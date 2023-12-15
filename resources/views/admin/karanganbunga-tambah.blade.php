<!DOCTYPE html>
<html lang="en">
@include('partial.header')

<body>
    <div class="app">
        @include('partial.navbar')
        <div class="dashboard addclass">
            @include('partial.sidebar-admin')
            <div class="addclass-box dashboard-box">
                <h1 style="text-decoration: underline;text-decoration-color: #C5D22E;" >Tambah Karangan Bunga</h1>
                <div class="tagBungkus d-flex align-items-center">
                </div>
                <div class="class-subtle dashboard-subtle">
                        <img src="../asset/edit.svg" alt="">
                        Tambah Karangan Bunga
                </div>
                <form action="{{route('course.store')}}" class="dashboard-form" method="POST" enctype="multipart/form-data">
                    @csrf

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
                    <!-- tombol submit -->
                    <button class="addclass-cta cta" type="submit">Submit</button>
                </form>
            </div>
        </div>

        @include('partial.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // for preview image
    function previewImage() {
        const image = document.querySelector("#thumbnail");
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    </script>
</body>

</html>