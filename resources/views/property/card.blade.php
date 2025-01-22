<style>
    .shape{
        border-style: solid;
        border-color: rgba(255,255,255,0) #d9534f rgba(255,255,255,0) rgba(255,255,255,0);
        border-width: 0 70px 40px 0;
        height: 0px;
        width: 0px;
        -ms-transform:rotate(360deg); /* IE 9 */
        -o-transform: rotate(360deg);  /* Opera 10.5 */
        -webkit-transform:rotate(360deg); /* Safari and Chrome */
        transform:rotate(360deg);
        position: absolute;
        top: 0;
        right: 0;
        border-top-right-radius: 6px;
    }
    .shape-text{
        color:#fff;
        font-size:12px;
        position:relative;
        right:-36px;
        top:-2px;
        white-space: nowrap;
        -ms-transform:rotate(30deg); /* IE 9 */
        -o-transform: rotate(360deg);  /* Opera 10.5 */
        -webkit-transform:rotate(30deg); /* Safari and Chrome */
        transform:rotate(30deg);
    }
</style>
<div class="card">
    <div class="card-body">
        @if($property->sold)
        <div class="shape">
            <div class="shape-text">Vendu</div>
        </div>
        @endif
        <h5 class="card-title">
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a>
        </h5>
        <p class="card-text">{{ $property->surface }} m² - {{ $property->city }} ({{ $property->postal_code }})</p>
        <div class="text-primary fw-bold" style="font-size: 1.4rem">
            {{ number_format($property->price, thousands_separator: ' ') }} €
        </div>
    </div>
</div>
