<section class="royal py-5 ">
    <div class="container">
        <div class="row m-0">

            <div class="col-lg-6 text-center" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{$image}}" class="col-lg-10 col-md-8 col-12 my-5 animated" alt="logo">
            </div>

            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 class="text-white text-center text-shadow" data-aos="fade-up" data-aos-delay="200">
                    {{$title}}
                </h1>
                @if(isset($description))
                    <p style="font-size: larger" class="text-white text-center text-shadow mt-2" data-aos="fade-up" data-aos-delay="250">
                        {{$description}}
                    </p>
                @endif
            </div>

        </div>
    </div>

</section>
