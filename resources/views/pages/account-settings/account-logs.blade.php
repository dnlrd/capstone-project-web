@extends('layouts.app')
@section('title', 'Account logs')
@section('content')
    <div class="page-header d-print-none text-black">
        <div class="container-xl">

            @if (session('success'))
                <div id="success-message" class="alert alert-success mb-2">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('info'))
                <div id="success-message" class="alert alert-info mb-2">
                    {{ session('info') }}
                </div>
            @endif
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Account Settings
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Last commits</h3>
                </div>
                <div class="list-group list-group-flush list-group-hoverable">
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto"><span class="badge bg-red"></span></div>
                            <div class="col-auto">
                                <a href="#">
                                    <span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
                                </a>
                            </div>
                            <div class="col text-truncate">
                                <a href="#" class="text-reset d-block">Paweł Kuna</a>
                                <div class="d-block text-secondary text-truncate mt-n1">Change deprecated html tags to text
                                    decoration classes (#29604)</div>
                            </div>
                            <div class="col-auto">
                                <a href="#" class="list-group-item-actions">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto"><span class="badge"></span></div>
                            <div class="col-auto">
                                <a href="#">
                                    <span class="avatar">JL</span>
                                </a>
                            </div>
                            <div class="col text-truncate">
                                <a href="#" class="text-reset d-block">Jeffie Lewzey</a>
                                <div class="d-block text-secondary text-truncate mt-n1">justify-content:between ⇒
                                    justify-content:space-between (#29734)</div>
                            </div>
                            <div class="col-auto">
                                <a href="#" class="list-group-item-actions">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto"><span class="badge bg-"></span></div>
                            <div class="col-auto">
                                <a href="#">
                                    <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                                </a>
                            </div>
                            <div class="col text-truncate">
                                <a href="#" class="text-reset d-block">Mallory Hulme</a>
                                <div class="d-block text-secondary text-truncate mt-n1">Update change-version.js (#29736)
                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="#" class="list-group-item-actions">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto"><span class="badge bg-green"></span></div>
                            <div class="col-auto">
                                <a href="#">
                                    <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)"></span>
                                </a>
                            </div>
                            <div class="col text-truncate">
                                <a href="#" class="text-reset d-block">Dunn Slane</a>
                                <div class="d-block text-secondary text-truncate mt-n1">Regenerate package-lock.json
                                    (#29730)</div>
                            </div>
                            <div class="col-auto">
                                <a href="#" class="list-group-item-actions">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto"><span class="badge bg-red"></span></div>
                            <div class="col-auto">
                                <a href="#">
                                    <span class="avatar" style="background-image: url(./static/avatars/000f.jpg)"></span>
                                </a>
                            </div>
                            <div class="col text-truncate">
                                <a href="#" class="text-reset d-block">Emmy Levet</a>
                                <div class="d-block text-secondary text-truncate mt-n1">Some minor text tweaks</div>
                            </div>
                            <div class="col-auto">
                                <a href="#" class="list-group-item-actions">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto"><span class="badge bg-yellow"></span></div>
                            <div class="col-auto">
                                <a href="#">
                                    <span class="avatar" style="background-image: url(./static/avatars/001f.jpg)"></span>
                                </a>
                            </div>
                            <div class="col text-truncate">
                                <a href="#" class="text-reset d-block">Maryjo Lebarree</a>
                                <div class="d-block text-secondary text-truncate mt-n1">Link to versioned docs</div>
                            </div>
                            <div class="col-auto">
                                <a href="#" class="list-group-item-actions">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto"><span class="badge"></span></div>
                            <div class="col-auto">
                                <a href="#">
                                    <span class="avatar">EP</span>
                                </a>
                            </div>
                            <div class="col text-truncate">
                                <a href="#" class="text-reset d-block">Egan Poetz</a>
                                <div class="d-block text-secondary text-truncate mt-n1">Copywriting edits</div>
                            </div>
                            <div class="col-auto">
                                <a href="#" class="list-group-item-actions">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto"><span class="badge bg-yellow"></span></div>
                            <div class="col-auto">
                                <a href="#">
                                    <span class="avatar" style="background-image: url(./static/avatars/002f.jpg)"></span>
                                </a>
                            </div>
                            <div class="col text-truncate">
                                <a href="#" class="text-reset d-block">Kellie Skingley</a>
                                <div class="d-block text-secondary text-truncate mt-n1">Enable RFS for font resizing</div>
                            </div>
                            <div class="col-auto">
                                <a href="#" class="list-group-item-actions">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
