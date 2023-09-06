            <!-- Navbar -->
            <nav  style="z-index: 5"    
                class=" navbar navbar-expand-lg blur border-radius-xl top-0 z-index-1 shadow position-fixed mt-4 py-2 start-0 end-0 mx-4">
                <div class="container-fluid">
                        @guest
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item ">
                                <a class="nav-link " href="{{ route('welcome') }}">
                                    <img src="{{ asset('img/clinic_logo1.png') }}" alt="https://localhost" class="circular-icon">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('welcome') }}">
                                الصفحة الرئيسية
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('registration') }}">
                                    التسجيل في الموقع
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('login') }}"> تسجيل الدخول  </a>
                            </li>
                        </ul>
                        @else
                        <ul class="navbar-nav mx-auto">
                        @if (Auth::check())
                            <li class="nav-item ">
                                <a class="nav-link " href="{{route('verifyUser')}}">
                                    <img src="{{ asset('img/userIcon.jpg') }}" alt="https://localhost/users" class="circular-icon">
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('users.show', ['id' => Auth::user()->id]) }}">
                                    {{ Auth::user()->user_full_name }}
                                </a>
                            </li>
                        @endif
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('logout') }}">تسجيل الخروج</a>
                            </li>
                        </ul>
                        @endguest
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{route('aboute')}}">حول الموقع</a> 
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{route('contact')}}">تواصل معنا</a> 
                            </li>
                        </ul>
                        <ul class="navbar-nav d-lg-block d-none">
                            <li class="nav-item">
                                <a href="https://www.qou.edu/" target="_blank"
                                    class="btn btn-sm mb-0 me-1 btn-primary">Qou</a>
                            </li>
                        </ul>

                </div>
            </nav>
            <!-- End Navbar -->