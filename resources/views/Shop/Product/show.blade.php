@include('shop.header')

<style>
    html,
    body {
        position: relative;
        height: 100%;
    }

    body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
    }

    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .markdown p {
        margin: 1em !important;
    }

    body {
        background: #000;
        color: #000;
    }

    .swiper {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-slide {
        background-size: cover;
        background-position: center;
    }

    .productSwiper2 {
        height: 80%;
        width: 100%;
    }

    .productSwiper {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
    }

    .productSwiper .swiper-slide {
        width: 25%;
        height: 100%;
        opacity: 0.4;
    }

    .productSwiper .swiper-slide-thumb-active {
        opacity: 1;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
</style>

<div class='container py-8 px-6 mx-auto'>

    <nav id="store" class="w-full z-30 top-0 px-6 py-1 mb-5">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-center mt-0 px-2 py-3">

            <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-red-800 text-2xl "
                href="#">
                {{ $product?->name }}
                -
                {{ number_format($product?->price, 2, '.') }}
            </a>


        </div>
    </nav>


    <div class="grid lg:grid-cols-2 md:grid-cols-1 sm:grid-cols-1 gap-4">

        <div class="">
            <!-- Swiper -->

            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper productSwiper2">
                <div class="swiper-wrapper">

                    @if ($product->image)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $product->image) }}" />
                        </div>
                    @endif

                    @if ($product->images)
                        @foreach ($product->images as $image)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $image) }}" />
                            </div>
                        @endforeach
                    @endif


                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div thumbsSlider="" class="swiper productSwiper">
                <div class="swiper-wrapper">

                    @if ($product->image)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $product->image) }}" />
                        </div>
                    @endif

                    @if ($product->images)
                        @foreach ($product->images as $image)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $image) }}" />
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>


        <div class="  place-order-form">
            {{-- Start Place Order Form  --}}

            @include('shop.product.form')

            {{-- End Place Order form --}}
        </div>

    </div>




    <br>
    <hr>

    <div class="mt-5 markdown">


        @if ($product?->description)
            {!! Str::markdown($product?->description) !!}
        @endif
    </div>

</div>

</div>

@include('shop.footer')

<script>
    var swiper = new Swiper(".productSwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".productSwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>
