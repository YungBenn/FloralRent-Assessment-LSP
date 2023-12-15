<!DOCTYPE html>
<html lang="en">
@include('partial.header')

<body>
    <div class="app">
        @include('partial.navbar')
        <section class="karanganbunga-container">
            <div class="course-box">
                <div class="course-sideFilter">
                    <div class="karanganbunga-type">
                        <h2>Type</h2>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="starter" name="starter" id="starter">
                            <label class="form-check-label" for="starter">Starter (Rp 0)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="freemium" name="freemium"
                                id="freemium">
                            <label class="form-check-label" for="freemium">Freemium (Rp 0)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="premium" name="premium" id="premium">
                            <label class="form-check-label" for="premium">Premium</label>
                        </div>
                    </div>
                    <a href="/user/addpenyewaan">
                        <div class="add-penyewaan">
                            Sewa
                        </div>
                    </a>
                </div>
                <div class="course__search">
                    <form action="/karanganbunga" method="" class="course-input-box mb-5">
                        <img src="asset/search.png" alt="">
                        <input type="text" class="course-input" name="search" value="{{ request('search') }}" autocomplete="off"
                            placeholder="Search Karangan Bunga">
                    </form>
                    <div class="course-content">
                        @foreach ($karanganbunga as $item)
                            <div class="course__card">
                                <img src="../asset/gambar/{{$item->gambar}}" alt="image" class="course__img">
                                <h1>{{ Str::limit($item->nama_karanganbunga, 25) }}</h1>
                                <p>{{ Str::limit($item->deskripsi, 30) }}</p>
                                <div class="course__detail">
                                    <span>
                                        <img src="../../asset/book.svg" alt="">
                                        {{$item->kode_karanganbunga}}
                                    </span>
                                    <span>
                                        <img src="asset/bookmark.svg" alt="">
                                        {{$item->pengirim}}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        @include('partial.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>