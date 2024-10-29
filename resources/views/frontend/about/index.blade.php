@extends('frontend.layout')

@section('content')

@include('frontend.components._newsfeed')

<div class="flex bg-white min-h-screen pt-20 md:pt-[60px]">
  <div class="flex flex-row w-full">
    <div class="flex flex-1 flex-col items-center justify-center relative">
      <div class="flex flex-1 flex-col pb-6 max-w-md md:max-w-2xl ">
        <section class="w-full mx-auto mt-2 md:mt-10 px-5 ">
          <h5 class="font-semibold md:font-bold text-2xl md:text-3xl text-center text-black">
            About
          </h5>
          <p class=" mt-4 text-base font-semibold text-gray-700">
            Now&amp;Me is a safe space for people, from all walks of life,
            to take their <i>“first step”</i> towards accepting their
            feelings and talking about them.
          </p>
          <article class="mx-auto mt-10 prose-previewify">

            <p class="text-lg">
              <strong>Address</strong>
            </p>
            <ul class="text-base py-4 text-black">
              <li>2208 Hillrise Ave</li>
              <li>Elizabethton, TN 37643</li>
              <li>USA</li>
            </ul>
            <h2 class="text-lg">Complaints</h2>
            <p class="text-base py-4">
              If you have any complaints or issues, please seek contact
              with us first. We do not intend to harm users and
              businesses. We&apos;d love to avoid (unnecessary) legal trouble.
            </p>
            <p class="text-base">
              You can send an email to(mailto:
              <a href="mailto:logan@previewlinks.io">
                logan@previewlinks.io
              </a>
              ) regarding your concerns.
            </p>
          </article>
        </section>
      </div>
    
    </div>
  </div>
</div>



@endsection