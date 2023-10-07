<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center mb-3">
            <div class="subheader">Female</div>
        </div>

        <div class="row d-flex align-items-center">
            <div class="col-auto">
                <span class="bg-pink text-white avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-woman"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 16v5"></path>
                        <path d="M14 16v5"></path>
                        <path d="M8 16h8l-2 -7h-4z"></path>
                        <path d="M5 11c1.667 -1.333 3.333 -2 5 -2"></path>
                        <path d="M19 11c-1.667 -1.333 -3.333 -2 -5 -2"></path>
                        <path d="M12 4m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    </svg>
                </span>
            </div>
            <div class="col">
                <div class="d-flex align-items-baseline">
                    <div class="h1 mb-0 me-2">{{ $femaleResidents }}</div>
                    <div class="me-auto">
                        @if ($previousYearFemale > 0)
                            @if ($previousPercentageFemale > 0)
                                <span class="text-success">
                                    (+{{ number_format($previousPercentageFemale, 1) }}%)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trending-up text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 17l6 -6l4 4l8 -8"></path>
                                        <path d="M14 7l7 0l0 7"></path>
                                    </svg>
                                </span>
                            @elseif ($previousPercentageFemale < 0)
                                <span class="text-danger">
                                    ({{ number_format($previousPercentageFemale, 1) }}%)
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
                    <div class="text-muted">Last Year: {{ $previousYearFemale }}</div>
                </div>
            </div>
        </div>
    </div>
    
</div>