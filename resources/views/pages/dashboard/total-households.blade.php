<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center mb-3">
            <div class="subheader">Total Households for Year {{ $selectedYear }}</div>                    
        </div>
        <div class="row d-flex align-items-center">
            <div class="col-auto">
                <span class="bg-dark text-white avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                    </svg>
                </span>
            </div>
            <div class="col">
                <div class="d-flex align-items-baseline">
                    <div class="h1 mb-0 me-2">{{ $totalHouseholds }}</div>
                    <div class="me-auto">                      
                        @if ($previousYearHousehold > 0)
                            @if ($previousPercentageHousehold > 0)
                                <span class="text-success">
                                    (+{{ number_format($previousPercentageHousehold, 1) }}%)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trending-up text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 17l6 -6l4 4l8 -8"></path>
                                        <path d="M14 7l7 0l0 7"></path>
                                    </svg>
                                </span>
                            @elseif ($previousPercentageHousehold < 0)
                                <span class="text-danger">
                                    ({{ number_format($previousPercentageHousehold, 1) }}%)
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
                    <div class="text-muted">Last Year: {{ $previousYearHousehold }}</div>
                </div>
            </div>
        </div>
    </div>
</div>