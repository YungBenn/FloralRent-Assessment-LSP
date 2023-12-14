<!DOCTYPE html>
<html lang="en">
@include('partial.header')

<body>
    <div class="app">
        @include('partial.navbar')
        <div class="dashboard addclass">
            @include('partial.sidebar-guru')
            <div class="addclass-box dashboard-box">
                <h1 style="text-decoration: underline;text-decoration-color: #C5D22E;" >Tambah Karangan Bunga</h1>
                <div class="tagBungkus d-flex align-items-center">
                    <p>Tambah</p>
                    <img src="../asset/security.png" class="ms-5" alt="">
                </div>
                <div class="class-subtle dashboard-subtle">
                        <img src="../asset/edit.svg" alt="">
                        Tambah Karangan Bunga
                </div>
                <form action="{{route('kategori.store')}}" class="dashboard-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="addclass-subtle dashboard-subtle">
                        <img src="../asset/edit.svg" alt="">
                        Tambah Karangan Bunga
                    </div>

                    <div class="addclass-input-grup dashboard-input-grup">
                        <label for="nama">nama kategori</label>
                        <input class="w-100" type="text" name="nama" id="title" value="" placeholder="Ketik nama kategori" required>
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