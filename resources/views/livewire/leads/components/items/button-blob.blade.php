{{-- wrapper --}}
<div class='btn--blob-wrapper'>



    {{-- 1: submit --}}
    @if ($type == 'submit')


    <button class="btn--blob reset--button">
        {{ $title }}
        <span class="btn--blob__inner">
            <span class="btn--blob__blobs">
                <span class="btn--blob__blob"></span>
                <span class="btn--blob__blob"></span>
                <span class="btn--blob__blob"></span>
                <span class="btn--blob__blob"></span>
            </span>
        </span>
    </button>





    {{-- 2: sregular --}}
    @else


    <a class="btn--blob reset--button" href="{{ $url }}" @if ($modal) data-izimodal-open="{{ $modal }}"
        data-izimodal-transitionin="fadeInDown" @endif>
        {{ $title }}
        <span class="btn--blob__inner">
            <span class="btn--blob__blobs">
                <span class="btn--blob__blob"></span>
                <span class="btn--blob__blob"></span>
                <span class="btn--blob__blob"></span>
                <span class="btn--blob__blob"></span>
            </span>
        </span>
    </a>


    @endif
    {{-- end if --}}



    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}



    <br />


    {{-- graphic --}}
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
        <defs>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10"></feGaussianBlur>
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo">
                </feColorMatrix>
                <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
            </filter>
        </defs>
    </svg>
</div>