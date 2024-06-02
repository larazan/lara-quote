@extends('frontend.layout')

@section('content')

<div class="flex bg-white min-h-screen pt-16 md:pt-[100px]">
    <div class="flex flex-row w-full">
        <div class="flex flex-1 flex-col items-center justify-center relative">
            <div class="flex flex-1 flex-col pb-18 max-w-md md:max-w-2xl ">
                <section class="w-full mx-auto  mt-10 md:mt-10 px-5 ">
                    <h5 class="font-semibold md:font-bold text-2xl text-black md:text-3xl text-center ">Frequently asked questions</h5>
                    <p class="mt-3 font-normal text-lg text-gray-700 text-center ">Browse through the most frequently asked questions.</p>
                    <dl class="w-full mt-6 space-y-6 divide-y divide-gray-200">
                        <div class="w-full pt-6">
                            <dt class="w-full text-lg">
                                <button class="flex items-start justify-between w-full text-left text-gray-400" id="headlessui-disclosure-button-11" type="button" aria-expanded="true" aria-controls="headlessui-disclosure-panel-12">
                                    <span class="font-medium text-gray-900">What is Now&amp;Me?</span><span class="flex items-center ml-6 h-7"><span class="text-primary font-normal text-2xl">+</span></span>
                                </button>
                            </dt>
                        </div>
                        <div class="w-full pt-6">
                            <dt class="w-full text-lg">
                                <button class="flex items-start justify-between w-full text-left text-gray-400" id="headlessui-disclosure-button-11" type="button" aria-expanded="true" aria-controls="headlessui-disclosure-panel-12">
                                    <span class="font-medium text-gray-900">How can Now&amp;Me help me?</span><span class="flex items-center ml-6 h-7"><span class="text-primary font-normal text-2xl">+</span></span>
                                </button>
                            </dt>
                        </div>
                        <div class="w-full pt-6">
                            <dt class="w-full text-lg">
                                <button class="flex items-start justify-between w-full text-left text-gray-400" id="headlessui-disclosure-button-11" type="button" aria-expanded="true" aria-controls="headlessui-disclosure-panel-12">
                                    <span class="font-medium text-gray-900">What is Now&amp;Me Experts?</span><span class="flex items-center ml-6 h-7"><span class="text-primary font-normal text-2xl">+</span></span>
                                </button>
                            </dt>
                        </div>
                        <div class="w-full pt-6">
                            <dt class="w-full text-lg">
                                <button class="flex items-start justify-between w-full text-left text-gray-400" id="headlessui-disclosure-button-11" type="button" aria-expanded="true" aria-controls="headlessui-disclosure-panel-12">
                                    <span class="font-medium text-gray-900">Who are Now&amp;Me Experts?</span><span class="flex items-center ml-6 h-7"><span class="text-primary font-normal text-2xl">+</span></span>
                                </button>
                            </dt>
                        </div>
                        <div class="w-full pt-6">
                            <dt class="w-full text-lg">
                                <button class="flex items-start justify-between w-full text-left text-gray-400" id="headlessui-disclosure-button-11" type="button" aria-expanded="true" aria-controls="headlessui-disclosure-panel-12">
                                    <span class="font-medium text-gray-900">Is Now&amp;Me free?</span><span class="flex items-center ml-6 h-7"><span class="text-primary font-normal text-2xl">+</span></span>
                                </button>
                            </dt>
                        </div>
                        <div class="w-full pt-6">
                            <dt class="w-full text-lg">
                                <button class="flex items-start justify-between w-full text-left text-gray-400" id="headlessui-disclosure-button-11" type="button" aria-expanded="true" aria-controls="headlessui-disclosure-panel-12">
                                    <span class="font-medium text-gray-900">What can I do on Now&amp;Me?</span><span class="flex items-center ml-6 h-7"><span class="text-primary font-normal text-2xl">+</span></span>
                                </button>
                            </dt>
                        </div>
                        <div class="w-full pt-6">
                            <dt class="w-full text-lg">
                                <button class="flex items-start justify-between w-full text-left text-gray-400" id="headlessui-disclosure-button-11" type="button" aria-expanded="true" aria-controls="headlessui-disclosure-panel-12">
                                    <span class="font-medium text-gray-900">Who can I meet on Now&amp;Me?</span><span class="flex items-center ml-6 h-7"><span class="text-primary font-normal text-2xl">+</span></span>
                                </button>
                            </dt>
                        </div>
                        <div class="w-full pt-6">
                            <dt class="w-full text-lg">
                                <button class="flex items-start justify-between w-full text-left text-gray-400" id="headlessui-disclosure-button-11" type="button" aria-expanded="true" aria-controls="headlessui-disclosure-panel-12">
                                    <span class="font-medium text-gray-900">Is Now&amp;Me a suicide helpline?</span><span class="flex items-center ml-6 h-7"><span class="text-primary font-normal text-2xl">+</span></span>
                                </button>
                            </dt>
                        </div>
                        <div class="w-full pt-6">
                            <dt class="w-full text-lg">
                                <button class="flex items-start justify-between w-full text-left text-gray-400" id="headlessui-disclosure-button-11" type="button" aria-expanded="true" aria-controls="headlessui-disclosure-panel-12">
                                    <span class="font-medium text-gray-900">Is Now&amp;Me confidential?</span><span class="flex items-center ml-6 h-7"><span class="text-primary font-normal text-2xl">+</span></span>
                                </button>
                            </dt>
                        </div>
                        <div class="w-full pt-6">
                            <dt class="w-full text-lg">
                                <button class="flex items-start justify-between w-full text-left text-gray-400" id="headlessui-disclosure-button-11" type="button" aria-expanded="true" aria-controls="headlessui-disclosure-panel-12">
                                    <span class="font-medium text-gray-900">Is Now&amp;Me anonymous?</span><span class="flex items-center ml-6 h-7"><span class="text-primary font-normal text-2xl">+</span></span>
                                </button>
                            </dt>
                        </div>
                    </dl>

                </section>
                
                @include('frontend.components._random_quote')

            </div>

            @include('frontend.components._subscribe_form')

        </div>
    </div>
</div>

@endsection