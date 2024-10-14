<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="ti ti-search"></i>
                </a>
            </li>
        </ul>
        {{-- menu navbar --}}
        <ul class="navbar-nav quick-links d-none d-lg-flex">
            <li class="nav-item dropdown-hover d-none d-lg-block">
                <a class="nav-link text-muted" href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="nav-item dropdown-hover d-none d-lg-block">
                <a class="nav-link text-muted" href="#">Pelayanan Kesehatan</a>
            </li>
            <li class="nav-item dropdown-hover d-none d-lg-block">
                <a class="nav-link text-muted" href="#">Info KAI</a>
            </li>
            <li class="nav-item dropdown-hover d-none d-lg-block">
                <a class="nav-link text-muted" href="#">Kontak / Lapor</a>
            </li>
        </ul>
        {{-- end menu navbar --}}

        <div class="d-block d-lg-none">
            <img src="{{ asset('assets/dist/images/logos/kai-esa-logo.svg') }}" class="dark-logo" height="40"
                alt="" />
            <img src="{{ asset('assets/dist/images/logos/kai-esa-logo.svg') }}" class="light-logo" height="40"
                alt="" />
        </div>
        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <?php

                    # tanggal sekarang dalam bahasa indo
                    $hariIni = \Carbon\Carbon::now()->locale('id');
                    $hariIniDetail = $hariIni->dayName . ", " . $hariIni->day . " " . $hariIni->monthName . " " . $hariIni->year;

                    ?>
                    <li class="nav-item" style="margin-right: 8px;">
                        {{ $hariIniDetail }}
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-bell-ringing"></i>
                            <div class="notification bg-primary rounded-circle"></div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop2">
                            <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                            </div>
                            <div class="message-body" data-simplebar>
                                <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="{{ asset('assets/dist/images/profile/user-1.jpg') }}" alt="user"
                                            class="rounded-circle" width="48" height="48" />
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                        <span class="d-block">Congratulate him</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="{{ asset('assets/dist/images/profile/user-2.jpg') }}" alt="user"
                                            class="rounded-circle" width="48" height="48" />
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">New message</h6>
                                        <span class="d-block">Salma sent you new message</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="{{ asset('assets/dist/images/profile/user-3.jpg') }}" alt="user"
                                            class="rounded-circle" width="48" height="48" />
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">Bianca sent payment</h6>
                                        <span class="d-block">Check your earnings</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="{{ asset('assets/dist/images/profile/user-4.jpg') }}" alt="user"
                                            class="rounded-circle" width="48" height="48" />
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">Jolly completed tasks</h6>
                                        <span class="d-block">Assign her new tasks</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="{{ asset('assets/dist/images/profile/user-5.jpg') }}" alt="user"
                                            class="rounded-circle" width="48" height="48" />
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">John received payment</h6>
                                        <span class="d-block">$230 deducted from account</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="{{ asset('assets/dist/images/profile/user-1.jpg') }}" alt="user"
                                            class="rounded-circle" width="48" height="48" />
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                        <span class="d-block">Congratulate him</span>
                                    </div>
                                </a>
                            </div>
                            <div class="py-6 px-7 mb-1">
                                <button class="btn btn-outline-primary w-100"> See All Notifications
                                </button>
                            </div>
                        </div>
                    </li>

                    {{-- User --}}
                    @php
                        $data = session('userdata');
                        $roleString = empty($data['role']) ? '-' : join(',', $data['role']);
                    @endphp

                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    <img src="{{ $data['profile_URL'] != null ? $data['profile_URL'] : asset('assets/dist/images/profile/user-1.jpg') }}"
                                        class="rounded-circle" width="35" height="35" alt="" />
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="py-3 px-7 pb-0">
                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                </div>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    <img src="{{ $data['profile_URL'] != null ? $data['profile_URL'] : asset('assets/dist/images/profile/user-1.jpg') }}"
                                        class="rounded-circle" width="80" height="80" alt="" />
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3">{{ $data['nama'] }}</h5>
                                        <span class="mb-1 d-block text-dark">{{ $data['jabatan'] }}</span>
                                        <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                            <i class="ti ti-id-badge fs-4"></i> {{ $data['nipp'] }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-grid py-4 px-7 pt-8">
                                    <a href="{{ url('logout') }}" class="btn btn-outline-primary">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
