<nav class="nav">
    <h2>FloralRent</h2>
    <div class="nav__box">
        <a href="/" class="nav__link">Home</a>
        <a href="/karanganbunga" class="nav__link">Karangan Bunga</a>

        @auth
        <img src="../../asset/fotoAkun.png" alt="foto akun" style="margin-right: -20px;">
        @if(auth()->check() && auth()->user()->role === "admin" )
        
        <div class="dropdown" id="">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ auth()->user()->name }}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/admin/inbox">My Inbox</a></li>
                <li><a class="dropdown-item" href="/admin/addclass">Add Class</a></li>
                <li><a class="dropdown-item" href="/admin/addclass">My Course</a></li>
                <li><a class="dropdown-item" href="/admin/setting">Edit Profile</a></li>
                <li>
                    <form action="/logout" method="post">
                        @csrf

                        <button type='submit' class='dropdown-item'>
                            <i>Logout</i>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        @else

        <div class="dropdown" id="">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ auth()->user()->name }}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/user/rent">My Rent</a></li>
                <li><a class="dropdown-item" href="/user/setting">Edit Profile</a></li>
                <li>
                    <form action="/logout" method="post">
                        @csrf

                        <button type='submit' class='dropdown-item'>
                            <i>Logout</i>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        @endif
        @else
        <a href="/login" class="nav__link nav-btn" id="loginBTN">Login</a>
        @endauth

    </div>
</nav>