@php
	$formTitle = !empty($article) ? 'Update' : 'New'    
@endphp

<x-app-layout>

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <div class="container max-w-screen-lg mx-auto cl border-slate-200">
            <div>
                <h2 class="gu tef text-slate-800 font-bold">{{ $formTitle }} News</h2>
                <!-- <p class="text-gray-500 mb-6">Form is mobile responsive. Give it a try.</p> -->

                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="flex w-full text-sm grid-cols-1 space-x-3">
                        <div class="w-1/4 text-gray-600">
                            <p class="font-medium text-lg">News Details</p>
                            <p>Please fill out all the fields.</p>
                        </div>

                        <div class="w-3/4 lg:col-span-2">
                            @if (!empty($article))
                                {!! Form::model($article, ['url' => ['admin/articles/edit', $article->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                                {!! Form::hidden('id') !!}
                            @else
                                {!! Form::open(['url' => 'admin/articles/store', 'enctype' => 'multipart/form-data']) !!}
                            @endif
                            <div class="flex flex-col space-y-4">
                           
                                <div class="col-span-6 sm:col-span-3">
                                    {!! Form::label('categoryId', 'Category', ['class' => 'block text-sm font-medium text-gray-700' ]) !!}
                                    <select name="categoryId" class="h-full mt-1 rounded-r border-t border-r border-b block appearance-none w-full bg-white border-gray-300 text-gray-700 py-2 px-4 pr-8 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-start-1 sm:col-span-3">
                                    {!! Form::label('title', 'Title', ['class' => 'block text-sm font-medium text-gray-700' ]) !!}
                                    {!! Form::text('title', null, ['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                                </div>

                                <div wire:ignore class="col-start-1 sm:col-span-3">
                                    {!! Form::label('body', 'Body', ['class' => 'block text-sm font-medium text-gray-700' ]) !!}
                                    {!! Form::textarea('body', null, ['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 ', 'rows' => 4, 'cols' => 10]) !!}
                                </div>

                                <div class="col-start-1 sm:col-span-3">
                                    {!! Form::label('meta_title', 'Meta Title', ['class' => 'block text-sm font-medium text-gray-700' ]) !!}
                                    {!! Form::text('meta_title', null, ['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                                </div>

                                <div wire:ignore class="col-start-1 sm:col-span-3">
                                    {!! Form::label('meta_description', 'Meta Description', ['class' => 'block text-sm font-medium text-gray-700' ]) !!}
                                    {!! Form::textarea('meta_description', null, ['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 ', 'rows' => 4, 'cols' => 10]) !!}
                                </div>

                                <div class="col-start-1 sm:col-span-3">
                                    <label for="title" class="block text-sm font-medium text-gray-700">
                                        Tags
                                    </label>
                                    <input name="articleTags" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm"  style="appearance: none;
                                                    background-color: #fff;
                                                    border-color: #000;
                                                    border-width: 1px;
                                                    border-radius: 0;
                                                    padding-top: 0.5rem;
                                                    padding-right: 0.75rem;
                                                    padding-bottom: 0.5rem;
                                                    padding-left: 0.75rem;
                                                    font-size: 1rem;
                                                    line-height: 1.5rem;" autofocus wire:model="articleTags" />
                                </div>

                                <div class="flex flex-row justify-between space-x-2">
                                    <div class="col-start-1 sm:col-span-3">
                                        {!! Form::label('url', 'Url', ['class' => 'block text-sm font-medium text-gray-700' ]) !!}
                                        {!! Form::text('url', null, ['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                                    </div>
                                    <div class="col-start-1 sm:col-span-3">
                                        {!! Form::label('embed', 'Embed Url', ['class' => 'block text-sm font-medium text-gray-700' ]) !!}
                                        {!! Form::text('embedUrl', null, ['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                                    </div>
                                </div>
                                <div class="flex flex-row justify-between space-x-2">
                                    <div class="col-start-1 sm:col-span-3">
                                        {!! Form::label('published_at', 'Published At', ['class' => 'block text-sm font-medium text-gray-700' ]) !!}
                                        {!! Form::text('published_at', null, ['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md', 'id' => 'published_at']) !!}
                                    </div>
                                    <div class="col-start-1 sm:col-span-3">
                                        {!! Form::label('author', 'Author', ['class' => 'block text-sm font-medium text-gray-700' ]) !!}
                                        {!! Form::text('author', null, ['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    {!! Form::label('featured_image', 'Image', ['class' => 'block text-sm font-medium text-gray-700' ]) !!}
                                    @if (!empty($article))
                                    <div style="width:fit-content; border: 1px solid grey; padding: 5px; margin: 10px 10px 10px 0;">
                                        <img src="{{ asset('storage/articles/'. $article->small) }}" />
                                    </div>
                                    @endif
                                    {!! Form::file('featured_image', ['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md', 'placeholder' => 'post image', 'id' => 'image', 'onchange' => 'previewImage();']) !!}
                                    <div class="mt-3">
                                        <img class="img-preview img-fluid col-sm-5" id="img-preview" style="display: block;">
                                    </div>
                                    <!-- <input wire:model="file" type="file" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" /> -->

                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    {!! Form::label('status', 'Status', ['class' => 'block text-sm font-medium text-gray-700' ]) !!}
                                    {!! Form::select('articleStatus', $statuses , null, ['class' => 'h-full rounded-r border-t border-r border-b block appearance-none w-full bg-white border-gray-300 text-gray-700 py-2 px-4 pr-8 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none', 'placeholder' => '-- Set Status --']) !!}
                                    <!-- <select name="articleStatus" class="h-full rounded-r border-t border-r border-b block appearance-none w-full bg-white border-gray-300 text-gray-700 py-2 px-4 pr-8 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Option</option>
                                        @foreach($statuses as $status)
                                        <option value="{{ $status }}">{{ $status }}</option>
                                        @endforeach
                                    </select> -->
                                </div>

                                <!-- <div class="md:col-span-5">
                                    <div class="inline-flex items-center">
                                        <input type="checkbox" name="billing_same" id="billing_same" class="form-checkbox" />
                                        <label for="billing_same" class="ml-2">My billing address is different than above.</label>
                                    </div>
                                </div> -->


                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end space-x-2">
                                        <a href="{{ url('admin/articles') }}" class="btn border-slate-200 hover--border-slate-300 text-indigo-500">Back</a>
                                        <button type="submit" class="btn ho xi ye">Submit</button>
                                    </div>
                                </div>
                                
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



@push('js')
<script src="https://unpkg.com/@yaireo/tagify"></script>
<script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<script>
    // The DOM element you wish to replace with Tagify
    var input = document.querySelector('input[name=articleTags]');
    // initialize Tagify on the above input node reference
    new Tagify(input);
</script>


<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('body', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#published_at', {
        enableTime: false
    })
</script>

<script>
    function previewImage() {
        console.log('image preview');
        const image = document.querySelector('#image');
        const imagePreview = document.querySelector('.img-preview');

        imagePreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imagePreview.src = oFREvent.target.result;
        }
    }
</script>
@endpush

@push('styles')
<link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

</x-app-layout>