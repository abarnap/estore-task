<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
            <h5 class="m-0 text-primary">{{env('APP_NAME')}}</h5>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link mx-lg-2 {{Request::is('/')?'active':''}}" aria-current="page"
                        href="{{url('/')}}">
                        Home
                    </a>
                </li>
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">
                    @if(\Auth::user() && \Auth::user()->role == 'Customer')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="m-0">{{\Auth::user()->name}}</span> <x-bi-person-circle
                                class="ms-2 text-secondary" />
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('myOrders')}}">My Orders</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{url('logout')}}">Logout</a></li>
                        </ul>
                    </li>
                    @elseif(\Auth::user() && \Auth::user()->role == 'Admin')
                    <li class="nav-item custom-nav-item">
                        <a class="nav-link d-flex align-items-center" href="{{url('admin')}}">
                            <span class="m-0">Back to Dashboard</span> <x-bi-house-fill class="ms-2 text-secondary" />
                        </a>
                    </li>
                    @else
                    <li class="nav-item custom-nav-item">
                        <a class="nav-link d-flex align-items-center" href="{{url('login')}}">
                            <span class="m-0">Login</span> <x-bi-person-circle class="ms-2 text-secondary" />
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>