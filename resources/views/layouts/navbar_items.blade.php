                    <!-- Nav items -->
                    @if(Auth::check())
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('home')}}">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <span class="nav-link-text">Beranda</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('order')}}">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="nav-link-text">Order</span>
                                </a>
                            </li>
                        </ul>
                    @endif
