@extends('frontend.layout')

@section('content')

<main class="pb-20  pt-20 md:pt-[100px] mx-auto w-full px-5 bg-gray-100 text-gray-800">
	<div class="container px-4 mx-auto" >
		<div class="max-w-2xl mx-auto mb-7 md:mb-16 text-center" >
			<span class="font-bold tracking-wider uppercase text-slate-900">Pricing</span>
			<h2 class="text-2xl font-bold md:text-4xl text-slate-900">Save 25 percent! The discount also applies to renewals.</h2>
		</div>
		<div class="flex flex-wrap pt-8 items-stretch2 items-center -mx-4" >
			
			<div class="flex w-full mb-8 sm:px-4 md:w-1/2 lg:w-1/3 lg:mb-0" >
				<div class="flex flex-grow flex-col p-6 space-y-3 border rounded shadow sm:p-8 bg-white" >
					<div class="space-y-1" >
						<h4 class="text-lg font-bold text-slate-900">Beginner</h4>
						<span class="text-3xl font-bold text-slate-900">Free</span>
					</div>
					<p class="mt-3 leading-tight text-slate-900">Etiam ac convallis enim, eget euismod dolor.</p>
					<ul class="flex-1 mb-6 text-slate-900">
						<li class="flex mb-1 space-x-2 text-blue-600">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="flex-shrink-0 w-6 h-6">
								<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
							</svg>
							<span class="text-slate-800">Aenean quis</span>
						</li>
						<li class="flex mb-1 space-x-2 text-blue-600">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="flex-shrink-0 w-6 h-6 dark:text-violet-600">
								<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
							</svg>
							<span class="text-slate-800">Morbi semper</span>
						</li>
						<li class="flex mb-1 space-x-2 text-blue-600">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="flex-shrink-0 w-6 h-6 dark:text-violet-600">
								<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
							</svg>
							<span class="text-slate-800">Tristique enim nec</span>
						</li>
					</ul>
					<button type="button" class="inline-block px-5 py-2 font-semibold tracking-wider text-center rounded border-2 border-blue-600 bg-blue-600 hover:bg-white text-white hover:text-blue-600">Signup</button>
				</div>
			</div>
			@foreach ($plans as $plan)
			<div class="flex w-full mb-8 sm:px-4 md:w-1/2 lg:w-1/3 lg:mb-0" >
				<div class="flex flex-grow flex-col p-6 space-y-3 rounded border shadow sm:p-8 bg-blue-600 text-white" >
					<div class="space-y-1" >
						<h4 class="text-lg font-bold text-white">{{ $plan->name }}</h4>
						<span class="text-3xl font-bold text-white">$ {{ $plan->price }}
							<span class="text-sm tracking-wide text-white">/{{ $plan->abbreviation }}</span>
						</span>
					</div>
					<p class=" leading-tight text-white">Morbi cursus ut sapien sit amet consectetur.</p>
					<ul class="flex-1 mb-6 space-y-1 text-white">
						<li class="flex items-center space-x-2">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="flex-shrink-0 w-6 h-6">
								<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
							</svg>
							<span >Everything in Free</span>
						</li>
						<li class="flex items-center space-x-2">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="flex-shrink-0 w-6 h-6">
								<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
							</svg>
							<span>Phasellus tellus</span>
						</li>
						<li class="flex items-center space-x-2">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="flex-shrink-0 w-6 h-6">
								<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
							</svg>
							<span>Praesent faucibus</span>
						</li>
						<li class="flex items-center space-x-2">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="flex-shrink-0 w-6 h-6">
								<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
							</svg>
							<span>Aenean et lectus blandit</span>
						</li>
					</ul>
					@subscribedToProduct(auth()->user(), $plan->stripeProductId(), $plan->stripeName())
					<div class="flex text-base text-white font-semibold rounded bg-yellow-700 px-2 py-1">You are currently subscribed this plan</div>
					@else
					<a rel="noopener noreferrer" href="{{ route('payments', ['plan' => $plan->stripeName()]) }}" class="inline-block w-full px-5 py-2 font-bold tracking-wider text-center rounded border border-[#fdfc3b] bg-white hover:bg-blue-700 text-blue-600 hover:text-white">Signup</a>
					@endsubscribedToProduct
				</div>
			</div>
			@endforeach
		</div>
	</div>
</main>

<livewire:newsletter-form />

@endsection