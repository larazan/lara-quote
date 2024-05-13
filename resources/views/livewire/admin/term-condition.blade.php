<div class="vs jj ttm vl ou uf na">

    <!-- Loading -->
    <x-loading-indicator />

    <!-- Page header -->
    <div class="rc">

        <!-- Title -->
        <h1 class="gu teu text-slate-800 font-bold">Terms and Conditions ✨</h1>

    </div>

    <div class="bg-white bd rounded-sm rc">
        <div class="flex ak zc qv">
                            
            <!-- Panel -->
            <div class="uw">

                <!-- Panel body -->
                <div class="d_ fd">

                    <section>
                       
                        <div class="je jc fg jm jb rw">
                        @if (!empty($body))
                                <div x-data="{ trix: @entangle($body).defer }">
                                    <input value="{{ $body }}" id="{{ $body }}" name="{{ $body }}" type="hidden" />
                                    <div wire:ignore x-on:trix-change.debounce.500ms=" trix=$refs.trixInput.value">
                                        <trix-editor x-ref="trixInput" input="{{ $body }}" class="overflow-y-scroll" style="height: 20rem;"></trix-editor>
                                    </div>
                                </div>
                            @else
                                <div wire:ignore>
                                    <input id="{{ $trixId }}" type="hidden" name="content" value="{{ $body }}" />
                                    <trix-editor wire:ignore input="{{ $trixId }}" class="overflow-y-scroll" style="height: 10rem;"></trix-editor>
                                </div>
                            @endif
                           
                        </div>
                       
                    </section>

                </div>

                <!-- Panel footer -->
                <footer>
                    <div class="flex ak vm vg co border-slate-200">
                        <div class="flex ls">
                            <button class="btn ho xi ye ml-3" wire:click="updateTermsConditions">Submit</button>
                        </div>
                    </div>
                </footer>

            </div>

        </div>
    </div>

</div>


@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
<script>
    var trixEditor = document.getElementById("{{ $trixId }}")

    addEventListener("trix-blur", function(event) {
        @this.set('body', trixEditor.getAttribute('value'))
    })
</script>
@endpush