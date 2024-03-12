<div class="vs jj ttm vl ou uf na">

    <!-- Loading -->
    <x-loading-indicator />

    <!-- Page header -->
    <div class="rc">

        <!-- Title -->
        <h1 class="gu teu text-slate-800 font-bold">About Us ✨</h1>

    </div>

    <div class="bg-white bd rounded-sm rc">
        <div class="flex ak zc qv">
                            
            <!-- Panel -->
            <div class="uw">

                <!-- Panel body -->
                <div class="d_ fd">

                    <section>
                       
                        <div class="je jc fg jm jb rw">
                            <div class="jr2 w-full" wire:ignore>
                                <textarea class=" s ou" colspan="50" wire:model="about" name="about" id="about" style="height: 10rem;"></textarea>
                            </div>
                           
                        </div>
                       
                    </section>

                </div>

                <!-- Panel footer -->
                <footer>
                    <div class="flex ak vm vg co border-slate-200">
                        <div class="flex ls">
                            <button class="btn ho xi ye ml-3" wire:click="updateAbout">Submit</button>
                        </div>
                    </div>
                </footer>

            </div>

        </div>
    </div>

</div>

@push('styles')
<style>
.ck-editor__editable {
    min-height: 10rem;
}
</style>
@endpush

@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script type="text/javascript">
    ClassicEditor
            .create(document.querySelector('#about'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                @this.set('about', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
</script>
@endpush