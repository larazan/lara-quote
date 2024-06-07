@extends('frontend.layout')

@section('content')

<div class="flex bg-white min-h-screen pt-[60px] md:pt-[100px]">
    <div class="flex flex-row w-full">
        <div class="flex flex-1 flex-col items-center justify-center relative">
            <div class="flex flex-1 flex-col pb-18 px-3 md:px-0 max-w-sm md:max-w-2xl">

                <div class="flex py-8 md:py-20 relative">
                    <div class="flex flex-col gap-y-24 md:gap-y-32 mx-auto max-w-6xl">
                        <div class="">
                            <div class="grid grid-cols-1 mx-auto md:grid-cols-2 gap-x-12 gap-y-6">
                                <div class="image false my-auto">
                                    <img width="400" height="400" class="rounded-xl md:w-3/4 mx-auto" src="{{ url('frontend/img/quote4.png') }}" />
                                </div>
                                <div class="flex flex-col gap-y-4 mx-auto my-auto">
                                    <h2 class="text-black font-extrabold text-3xl md:text-4xl mb-2 text-left">
                                        The Future of Quote Creation
                                    </h2>
                                    <div class="flex flex-col gap-y-4">
                                        <div class="flex gap-x-4 max-w-2xl">

                                            <div>
                                                <h3 class="text-md md:text-lg text-gray-700 font-bold mb-1">
                                                    Embracing AI Quotes
                                                </h3>
                                                <p class="md:text-lg mb-4 text-gray-600">
                                                    Using AI into the realm of quote creation marks a
                                                    transformative shift. Our AI Quote Generator can
                                                    intuitively produce quotes that resonate with
                                                    contemporary themes and ideas, making it an invaluable
                                                    tool for modern communicators.
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="grid grid-cols-1 mx-auto md:grid-cols-2 gap-x-12 gap-y-6">
                                <div class="image md:order-2 my-auto">
                                    <img width="400" height="400" class="rounded-xl md:w-3/4 mx-auto" src="{{ url('frontend/img/quote4.png') }}" />
                                </div>
                                <div class="flex flex-col gap-y-4 mx-auto my-auto">
                                    <h2 class="text-black font-extrabold text-3xl md:text-4xl mb-2 text-left">
                                        Personalized Quotes in Seconds
                                    </h2>
                                    <div class="flex flex-col gap-y-4">
                                        <div class="flex gap-x-4 max-w-2xl">

                                            <div>
                                                <h3 class="text-md md:text-lg text-gray-700 font-bold mb-1">
                                                    Real Time Quote Generation
                                                </h3>
                                                <p class="md:text-lg mb-4 text-gray-600">
                                                    The speed and efficiency of our AI Quote Generator are
                                                    unmatched. Providing real-time, personalized quotes, it
                                                    caters to the fast-paced needs of today&apos;s users,
                                                    delivering quality content without the wait.
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="grid grid-cols-1 mx-auto md:grid-cols-2 gap-x-12 gap-y-6">
                                <div class="image false my-auto">
                                    <img width="400" height="400" class="rounded-xl md:w-3/4 mx-auto" src="{{ url('frontend/img/quote4.png') }}" />
                                </div>
                                <div class="flex flex-col gap-y-4 mx-auto my-auto">
                                    <h2 class="text-black font-extrabold text-3xl md:text-4xl mb-2 text-left">
                                        Enhancing Creativity with AI
                                    </h2>
                                    <div class="flex flex-col gap-y-4">
                                        <div class="flex gap-x-4 max-w-2xl">

                                            <div>
                                                <h3 class="text-md md:text-lg text-gray-700 font-bold mb-1">
                                                    Breaking Creative Boundaries
                                                </h3>
                                                <p class="md:text-lg mb-4 text-gray-600">
                                                    Our AI Quote Generator is not just a tool but a catalyst
                                                    for breaking creative boundaries. It encourages users to
                                                    explore new realms of thought and expression, pushing
                                                    the limits of conventional quote-making.
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="grid grid-cols-1 mx-auto md:grid-cols-2 gap-x-12 gap-y-6">
                                <div class="image md:order-2 my-auto">
                                    <img width="400" height="400" class="rounded-xl md:w-3/4 mx-auto" src="{{ url('frontend/img/quote4.png') }}" />
                                </div>
                                <div class="flex flex-col gap-y-4 mx-auto my-auto">
                                    <h2 class="text-black font-extrabold text-3xl md:text-4xl mb-2 text-left">
                                        Easy Access to Inspirational Quotes
                                    </h2>
                                    <div class="flex flex-col gap-y-4">
                                        <div class="flex gap-x-4 max-w-2xl">

                                            <div>
                                                <h3 class="text-md md:text-lg text-gray-700 font-bold mb-1">
                                                    A Library of Quotes at Your Disposal
                                                </h3>
                                                <p class="md:text-lg mb-4 text-gray-600">
                                                    Our AI Quote Generator functions like a vast library,
                                                    offering easy access to a wide range of inspirational
                                                    quotes. Whether you&apos;re looking for wisdom, humor,
                                                    or motivation, the generator provides an extensive
                                                    collection to choose from.
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <section>
                    <div class="wrap mx-auto flex flex-col bg-white md:flex-row divide-y-2 md:divide-y-0 md:divide-x-2 divide-red">
                        <div class="px-6 py-8 md:pt-16 md:pb-24 md:text-center md:w-1/2" data-controller="animated-number">
                            <p>
                                <b class="block font-heading text-5xl md:text-6xl text-black leading-snug mt-1 md:my-4" data-target="animated-number.stat" data-stat="1310904">
                                    1,310,889
                                </b>
                                <span class="text-xl text-black">Quotes</span>
                            </p>
                        </div>
                        <div class="px-6 py-8 md:pt-16 md:pb-24 md:text-center md:w-1/2" data-controller="animated-number">
                            <p>
                                <b class="block font-heading text-5xl md:text-6xl text-black leading-snug mt-1 md:my-4" data-target="animated-number.stat" data-stat="151284">
                                    151,269
                                </b>
                                <span class="text-xl text-black">Famous People</span>
                            </p>
                        </div>
                    </div>
                </section>

            </div>

            @include('frontend.components._subscribe_form')

        </div>
    </div>
</div>

@endsection