<!--  Marques -->
<section class="bg-white py-8">

    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

        <nav id="store" class="w-full z-30 top-0 px-6 py-1 mb-5">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-center mt-0 px-2 py-3">

                <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 lg:text-4xl sm:text-large"
                    href="#">
                    Marques
                </a>


            </div>
        </nav>
        @if ($brands)
            @foreach ($brands as $brand)
                <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col justify-center">
                    <a href="/brand/{{ $brand->id }}" class="text-center ">


                        @if (file_exists('storage/' . $brand->image))
                            <?php $image = asset('storage/' . $brand->image); ?>;
                        @else
                            <?php $image = $brand->image; ?>
                        @endif

                        <img class="hover:grow hover:shadow-lg " width="200" height="200" style="display: inline;"
                            src="{{ $image }}">
                        <div class="pt-3 flex items-center justify-center justify-center">
                            <p class="text-center " style="font-size: 35px; font-weight:bold">{{ $brand->name }}
                            </p>

                        </div>

                    </a>
                </div>
            @endforeach


        @endif


    </div>
    <div class="container w-full flex justify-center">
        <br>
        {{ $brands->links() }}
    </div>
</section>

<!-- End  Marques -->
