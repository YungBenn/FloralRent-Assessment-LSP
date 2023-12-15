<!DOCTYPE html>
<html lang="en">
@include('partial.header')

<body>
    <div class="app">
        @include('partial.navbar')
        <div class="dashboard addclass">
            @include('partial.sidebar-admin')
            <div class="addclass-box dashboard-box">
                <h1 style="text-decoration: underline;text-decoration-color: #C5D22E;" >Edit Karangan Bunga</h1>
                <div class="tagBungkus d-flex align-items-center">
                </div>
                <div class="class-subtle dashboard-subtle">
                        <img src="../asset/edit.svg" alt="">
                        Edit Karangan Bunga
                </div>
            <form class="dashboard-form" action="{{ route('anggota.store')}}" method="post">
                @csrf
                <div class="addclass-input-grup dashboard-input-grup">
                    <label for="name">Nama Anggota</label>
                    <input class="w-100" type="text" name="name" id="title" value="" placeholder="Masukkan Nama Anggota">
                </div>
                <div class="addclass-input-grup dashboard-input-grup">
                    <label for="email">Email</label>
                    <input class="w-100" type="text" name="email" id="title" value="" placeholder="Masukkan Email Anggota">
                </div>
                <div class="addclass-input-grup dashboard-input-grup">
                    <label for="no_telp">No Telp</label>
                    <input class="w-100" type="text" name="no_telp" id="title" value="" placeholder="Masukkan notelp Anggota">
                </div>
                <div class="addclass-input-grup dashboard-input-grup">
                    <label for="role" class="text-primary font-weight-bold">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="addclass-input-grup dashboard-input-grup">
                    <label for="password">Password</label>
                    <input class="w-100" type="password" name="password" id="password" min="0" max='200000' value=""
                        placeholder="Masukkan passwod">
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