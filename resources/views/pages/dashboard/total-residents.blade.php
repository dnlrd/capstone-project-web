<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center mb-3">
            <div class="subheader">total residents</div>
        </div>

        <div class="row align-items-center">
            <div class="col-auto">
                <span class="bg-info text-white avatar">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-building-community" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8">
                        </path>
                        <path d="M13 7l0 .01"></path>
                        <path d="M17 7l0 .01"></path>
                        <path d="M17 11l0 .01"></path>
                        <path d="M17 15l0 .01"></path>
                    </svg>
                </span>
            </div>
            <div class="col">
                <div class="d-flex align-items-baseline">
                    <div class="h1 mb-0 me-2">{{ $totalResidents }}</div>
                    <div class="me-auto">
                    @if ($previousYearResidents > 0)
                        @if ($previousPercentageResidents > 0)
                            <span class="text-success">
                                (+{{ number_format($previousPercentageResidents, 1) }}%)
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trending-up text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 17l6 -6l4 4l8 -8"></path>
                                    <path d="M14 7l7 0l0 7"></path>
                                </svg>
                            </span>
                        @elseif ($previousPercentageResidents < 0)
                            <span class="text-danger">
                                ({{ number_format($previousPercentageResidents, 1) }}%)
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trending-down text-danger" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 7l6 6l4 -4l8 8"></path>
                                    <path d="M21 10l0 7l-7 0"></path>
                                </svg>
                            </span>
                        @else
                            (No Change)
                        @endif
                    @else
                        N/A
                    @endif

                    </div>
                </div>
                <div class="text-secondary">
                    <div class="text-muted">Last Year: {{ $previousYearResidents }}</div>
                </div>
            </div>
        </div>
    </div>
    
</div>