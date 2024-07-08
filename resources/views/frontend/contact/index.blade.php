@extends('frontend.layout')

@section('content')

<main class="flex h-max py-8 md:py-20 bg-white pt-16 md:pt-[120px]">
    <div class="flex  w-full2">

        <div class="max-w-full xl:max-w-[1800px] mx-auto flex flex-col justify-center items-center">
            @if(Session::has('success'))
            <div class="flex mx-auto w-full px-6 mb-12">
                <div class="flex items-center space-x-2 w-full p-4 text-white bg-green-500 rounded">
                    <h2 class="text-md font-semibold">Success</h2>
                    <p class="text-sm font-semibold leading-none text-white">{{ Session::get('success') }}</p>
                </div>
            </div>
            @endif
            <div class="flex flex-col md:flex-row w-full space-y-3 md:divide-x-2 px-10 md:space-y-0 max-w-full">

                <div class="flex justify-center flex-col md:flex-row">
                    <div class="md:pr-[72px] md:max-w-[50%] md:w-[50%] pb-[48px] md:pb-0 ">
                        <div class="flex flex-col space-y-3">
                            <h3 class="text-2xl md:text-4xl font-bold leading-8 text-black">
                                Contact Us
                            </h3>
                            <div>
                                <h2 class="text-lg md:text-2xl font-semibold text-gray-900">
                                    Customer Support
                                </h2>
                                <p class="text-gray-900  py-2 text-sm leading-tight">
                                    Question about an order? Problem with your camera? Or just
                                    looking for some free advice? Check out our
                                    <a href="http://support.polaroid.com/" target="_blank" rel="noreferrer" class="underline break-all md:break-normal">
                                        FAQs
                                    </a>
                                    , and if you’re still not sure, you can contact our
                                    Customer Support team
                                    <a href="https://support.polaroid.com/hc/requests/new" target="_blank" rel="noreferrer" class="underline break-all md:break-normal">
                                        here
                                    </a>
                                    .
                                </p>

                                <h2 class="text-lg md:text-2xl font-semibold text-gray-900">
                                    Press
                                </h2>
                                <p class="text-gray-900  py-2 text-sm leading-tight">
                                    If you&apos;re a journalist or blogger interested in photo and
                                    interview requests, or just looking to know more about
                                    Polaroid, get in touch with our press team at
                                    press@polaroid.com
                                </p>

                                <h2 class="text-lg md:text-2xl font-semibold text-gray-900">
                                    Partnerships
                                </h2>
                                <p class="text-gray-900  py-2 text-sm leading-tight">
                                    If your brand or organization is interested in teaming up
                                    with us for a potential partnership or collaboration,
                                    contact us at partnerships@polaroid.com
                                </p>
                                <p class="text-gray-900  py-2 text-sm leading-tight"></p>
                                <p class="text-gray-900  py-2 text-sm leading-tight"></p>
                                <h2 class="text-lg md:text-2xl font-semibold text-gray-900">
                                    Affiliate Program
                                </h2>
                                <p class="text-gray-900  py-2 text-sm leading-tight">
                                    The Polaroid Affiliate Program can help you gain
                                    commission on sales referred from your site.&nbsp;Find out
                                    more about&nbsp;the Affiliate Program and how to sign
                                    up&nbsp;
                                    <a href="https://polaroid.com/polaroid-affiliate-program" target="_blank" rel="noreferrer" class="underline break-all md:break-normal">
                                        here
                                    </a>
                                    .
                                </p>

                                <h2 class="text-lg md:text-2xl font-semibold text-gray-900">
                                    Wholesale
                                </h2>
                                <p class="text-gray-900  py-2 text-sm leading-tight">
                                    If you’re a retailer looking to add Polaroid to your
                                    line-up, drop us a line at one of the email addresses
                                    below:
                                    <br />
                                    USA/Canada: uswholesale@polaroid.com
                                    <br />
                                    Asia: asiawholesale@polaroid.com
                                    <br />
                                    Europe/Rest of World: wholesale@polaroid.com
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="h-[1px] w-auto md:w-[1px] md:h-auto bg-slate-400/50"></div>

                    <div class="md:max-w-[50%] md:w-[50%] md:pl-[72px] pt-[48px] md:pt-0 ">
                        <div class="flex flex-col justify-start space-y-4 md:space-y-5">
                            <div class="flex flex-col space-y-1 md:space-y-2">
                                <h2 class="text-lg md:text-3xl tracking-tight font-semibold text-black">
                                    Send us a Message
                                </h2>
                            </div>
                            <form method="POST" action="{{ route('contact.submit') }}">
                            @csrf
                            <div class="flex flex-col max-w-md space-y-4 md:space-y-5">
                                <div class="relative w-full">
                                    <p class="text-black text-[11px] font-semibold uppercase tracking-tight">
                                        NAME
                                    </p>
                                    <div class="relative items-center">
                                        <input class="flex w-full px-2 py-2 md:px-2 md:py-2 border bg-white border-gray-300 rounded font-medium placeholder:font-normal" type="text" id="name" name="name" required />
                                    </div>
                                </div>
                                <div class="relative w-full">
                                    <p class="text-black text-[11px] font-semibold uppercase tracking-tight">
                                        Email Address
                                    </p>
                                    <input type="email" id="email" name="email" required class="flex w-full px-2 py-2 md:px-2 md:py-2 border bg-white border-gray-300 rounded font-medium placeholder:font-normal" />
                                </div>
                                <div class="relative w-full">
                                    <p class="text-black text-[11px] font-semibold uppercase tracking-tight">
                                        subject
                                    </p>
                                    <input type="text" id="subject" name="subject" required class="flex w-full px-2 py-2 md:px-2 md:py-2 border border-gray-300 rounded font-medium placeholder:font-normal" />
                                </div>
                                <div class="relative w-full">
                                    <p class="text-black text-[11px] font-semibold uppercase tracking-tight">
                                        message
                                    </p>
                                    <textarea rows="4" cols="50" id="message" name="message" required class="flex w-full px-2 py-2 md:px-2 md:py-2 border bg-white border-gray-300 rounded font-medium placeholder:font-normal"></textarea>
                                </div>

                                <button type="submit" class="text-md font-bold rounded-full transition-[all] duration-300 ease-out cursor-pointer bg-black text-white border-2 border-black hover:bg-white hover:text-black hover:border-solid py-3 px-7 w-full">
                                    Submit
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<livewire:newsletter-form />

@endsection