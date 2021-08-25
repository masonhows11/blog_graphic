<div class="container-fluid wrapper">
    <!-- start nav-bar           -->
    <div class="row">
        <nav class="navbar navbar-light  navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand text-white" href="/">BARD GRAPH</a>
                <button class="navbar-toggler" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarToggler"
                        aria-controls="navbarToggler"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarToggler">

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <div class="navbar-text text-white">جملات انگیزشی</div>
                        </li>

                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            @auth
                            <li class="nav-item dropdown nav-login">
                                <a class="nav-link text-white"
                                   href="#"
                                   role="button"
                                   data-bs-toggle="dropdown"
                                   aria-expanded="false"
                                   id="navbarDropdownLink">
                                    {{ \Illuminate\Support\Facades\Auth::user()->user_name }}
                                </a>
                                <ul class="dropdown dropdown-menu" aria-labelledby="navbarDropdownLink">
                                    <li><a class="dropdown-item text-center" href="/profile">پروفایل</a></li>
                                    <li><a class="dropdown-item text-center" href="/logout">خروج</a></li>
                                </ul>
                            </li>
                             @else
                            <li class="nav-item nav-login">
                                <a class="nav-link text-white" href="/loginForm">ورود</a>
                            </li>

                            <li class="nav-item nav-register">
                                <a class="nav-link text-white" href="/registerForm">ثبت نام</a>
                            </li>
                            @endauth

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- end nav-bar            -->
</div>




