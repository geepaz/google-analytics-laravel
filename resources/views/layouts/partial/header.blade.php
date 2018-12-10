<div class="fixed-top header-projects">
    <nav class="navbar navbar-expand-md navbar-light bg-white d-flex-none">
        <div class="media align-items-center">
            <a href="{{ url('/') }}" class="drawer-brand-circle mr-2">A</a>
            <div class="media-body">
                <a href="{{ url('/') }}" class="page-title m-0">Analytics</a>
            </div>
        </div>
        <button class="btn btn-link text-white pl-0 d-md-none" type="button" data-toggle="sidebar">
        <i class="material-icons align-middle md-36">short_text</i>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ml-auto align-items-center">

                <li class="nav-item nav-divider"></li>
                <li class="nav-item dropdown nav-dropdown d-flex align-items-center">
                    <a href="javascript:void(0)" class="nav-link dropdown-toggle dropdown-clear-caret" data-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->fname }} {{ auth()->user()->lname }}
                    <img src="{{ asset('upload/profile/'.auth()->user()->image) }}" class="img-fluid rounded-circle ml-1" width="35"
                        alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-account">
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{ route('profile.index') }}" class="dropdown-item ">
                                <i class="material-icons md-18 align-middle mr-1">account_circle</i>
                                <span class="align-middle">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.settings') }}" class="dropdown-item">
                                <i class="material-icons md-18 align-middle mr-1">settings</i>
                                <span class="align-middle">Setting</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                                    <i class="material-icons md-18 align-middle mr-1">exit_to_app</i>
                                    <span class="align-middle">Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>