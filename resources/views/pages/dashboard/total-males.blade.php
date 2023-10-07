<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center mb-3">
            <div class="subheader">Male</div>
        </div>
        <div class="row align-items-center">
            <div class="col-auto">
                <span class="bg-primary text-white avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-man"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 16v5"></path>
                        <path d="M14 16v5"></path>
                        <path d="M9 9h6l-1 7h-4z"></path>
                        <path d="M5 11c1.333 -1.333 2.667 -2 4 -2"></path>
                        <path d="M19 11c-1.333 -1.333 -2.667 -2 -4 -2"></path>
                        <path d="M12 4m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    </svg>
                </span>
            </div>
            <div class="col">
                <div class="d-flex align-items-baseline">
                    <div class="h1 mb-0 me-2">{{ $maleResidents }}</div>
                    <div class="me-auto">
                        @if ($previousYearMale > 0)
    
                            @if ($previousPercentageMale > 0)
                                <span class="text-success">
                                    (+{{ number_format($previousPercentageMale, 1) }}%)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trending-up text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 17l6 -6l4 4l8 -8"></path>
                                        <path d="M14 7l7 0l0 7"></path>
                                    </svg>
                                </span>
                            @elseif ($previousPercentageMale < 0)
                                <span class="text-danger">
                                    ({{ number_format($previousPercentageMale, 1) }}%)
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
                    <div class="text-muted">Last Year: {{ $previousYearMale }}</div>
                </div>
            </div>
        </div>
    </div>
    
</div>