<div class="vs jj ttm vl ou uf na">

    <!-- Loading -->
    <x-loading-indicator />

    <!-- Page header -->
    <div class="je jd jc ii">

        <!-- Left: Title -->
        <div class="ri _y">
            <h1 class="gu teu text-slate-800 font-bold">Article</h1>
        </div>

        <!-- Right: Actions -->
        <div class="sn am jo az jp ft">

            <!-- Search form -->
            <form class="y">
                <label for="action-search" class="d">Search</label>
                <input wire:model="search" id="action-search" class="s me xq" type="search" placeholder="Search by name">
                <button class="g w j kk" type="submit" aria-article="Search">
                    <svg class="oo sl ub du gq kj ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                        <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                    </svg>
                </button>
            </form>

            <!-- Create article button -->
            <button class="btn ho xi ye" wire:click="showCreateModal">
                <svg class="oo sl du bf ub" viewBox="0 0 16 16">
                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                </svg>
                <span class="hidden trm nq">Create Article</span>
            </button>
            <!-- <a href="{{ url('admin/articles/create') }}" class="btn ho xi ye">
                <svg class="oo sl du bf ub" viewBox="0 0 16 16">
                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                </svg>
                <span class="hidden trm nq">Create Article</span>
            </a> -->
        </div>

    </div>

    <!-- More actions -->
    <div class="je jd jc ii">

        <!-- Left side -->
        <div class="ri _y">

        </div>

        <!-- Right side -->
        <div class="sn am jo az jp ft">

            <!-- Delete button -->
            <div class="table-items-action hidden">
                <div class="flex items-center">
                    <div class="hidden tnh text-sm gm mr-2 lm"><span class="table-items-count"></span> items selected</div>
                    <button class="btn bg-white border-slate-200 hover--border-slate-300 yl xy">Delete</button>
                </div>
            </div>

            <!-- Dropdown -->
            <!-- <div class="y" x-data="{ open: false, selected: 2 }">
                <button class="btn fe un bg-white border-slate-200 hover--border-slate-300 text-slate-500 hover--text-slate-600" aria-article="Select date range" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open" aria-expanded="false">
                    <span class="flex items-center">
                        <svg class="oo sl du text-slate-500 ub mr-2" viewBox="0 0 16 16">
                            <path d="M15 2h-2V0h-2v2H9V0H7v2H5V0H3v2H1a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1zm-1 12H2V6h12v8z"></path>
                        </svg>
                        <span x-text="$refs.options.children[selected].children[1].innerHTML">Last Month</span>
                    </span>
                    <svg class="ub nz du gq" width="11" height="7" viewBox="0 0 11 7">
                        <path d="M5.4 6.8L0 1.4 1.4 0l4 4 4-4 1.4 1.4z"></path>
                    </svg>
                </button>
                <div class="tk g z q ou bg-white border border-slate-200 va rounded bd la re" @click.outside="open = false" @keydown.escape.window="open = false" x-show="open" x-transition:enter="wt wa ws au" x-transition:enter-start="opacity-0 uq" x-transition:enter-end="ba uj" x-transition:leave="wt wa ws" x-transition:leave-start="ba" x-transition:leave-end="opacity-0" style="display: none;">
                    <div class="gp text-sm g_" x-ref="options">
                        <button tabindex="0" class="flex items-center ou xr vf vn al" :class="selected === 0 &amp;&amp; 'text-indigo-500'" @click="selected = 0;open = false" @focus="open = true" @focusout="open = false">
                            <svg class="ub mr-2 du text-indigo-500 invisible" :class="selected !== 0 &amp;&amp; 'invisible'" width="12" height="9" viewBox="0 0 12 9">
                                <path d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z"></path>
                            </svg>
                            <span>Today</span>
                        </button>

                        <button tabindex="0" class="flex items-center ou xr vf vn al text-indigo-500" :class="selected === 2 &amp;&amp; 'text-indigo-500'" @click="selected = 2;open = false" @focus="open = true" @focusout="open = false">
                            <svg class="ub mr-2 du text-indigo-500" :class="selected !== 2 &amp;&amp; 'invisible'" width="12" height="9" viewBox="0 0 12 9">
                                <path d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z"></path>
                            </svg>
                            <span>Last Month</span>
                        </button>

                    </div>
                </div>
            </div> -->

            <!-- Filter button -->
            <select wire:model="sort" id="sort" class="a">
                <option value="asc">Asc</option>
                <option value="desc">Desc</option>
            </select>

            <select wire:model="perPage" id="filter" class="a">
                <option value="5">5 Per Page</option>
                <option value="10">10 Per Page</option>
                <option value="15">15 Per Page</option>
            </select>
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white bd rounded-sm border border-slate-200 rc">
        <header class="vc vu">
            <h2 class="gh text-slate-800">Articles <span class="gq gp"></span></h2>
        </header>
        <div x-data="handleSelect">

            <!-- Table -->
            <div class="lf">
                <table class="ux ou">
                    <!-- Table header -->
                    <thead class="go gh gv text-slate-500 hp co cs border-slate-200">
                        <tr>
                            <th class="vi wy w_ vo lm of">
                                <div class="flex items-center">
                                    <label class="inline-flex">
                                        <span class="d">Select all</span>
                                        <input id="parent-checkbox" class="i" type="checkbox" @click="toggleAll">
                                    </label>
                                </div>
                            </th>
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Title</div>
                            </th>
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Image</div>
                            </th>
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Category</div>
                            </th>
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Author</div>
                            </th>
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Publish Date</div>
                            </th>
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Status</div>
                            </th>
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Date</div>
                            </th>
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <!-- Table body -->
                    <tbody class="text-sm le lr">
                        <!-- Row -->

                        @if ($articles->count() > 0)
                        @foreach ($articles as $article)

                        <tr>
                            <td class="vi wy w_ vo lm of">
                                <div class="flex items-center">
                                    <label class="inline-flex">
                                        <span class="d">Select</span>
                                        <input class="table-item i" type="checkbox" @click="uncheckParent">
                                    </label>
                                </div>
                            </td>
                            <td class="vi wy w_ vo lm">
                                <div class="gp text-slate-800">{!! nl2br(General::smart_wordwrap($article->title, 40)) !!}</div>
                            </td>
                            <td class="vi wy w_ vo lm">
                                @if($article->small)
                                <div class="gp ">
                                    <img src="{{ asset('storage/'.$article->small) }}" class="object-scale-down h-48 w-96" alt="{{ $article->title }}">
                                </div>
                                @endif
                            </td>
                            <td class="vi wy w_ vo lm">
                                <div class="gp text-slate-800">{{ $article->category($article->category_id) }}</div>
                            </td>
                            <td class="vi wy w_ vo lm">
                                <div class="gp ">{{ $article->user->first_name }} {{ $article->user->last_name }}</div>
                            </td>
                            <td class="vi wy w_ vo lm">
                                <div class="gp capitalize">{{ $article->published_at }}</div>
                            </td>
                            <td class="vi wy w_ vo lm">
                                @if ($article->status == 'inactive')
                                <div class="inline-flex gp hf yl rounded-full gn vp vd">inactive</div>
                                @endif

                                @if ($article->status == 'active')
                                <div class="inline-flex gp hc ys rounded-full gn vp vd">active</div>
                                @endif
                            </td>

                            <td class="vi wy w_ vo lm">
                                <div>{{ $article->created_at->format('d-m-Y') }}</div>
                            </td>

                            <td class="vi wy w_ vo lm of">
                                <div class="fm">
                                    <button class="gq xv rounded-full" wire:click="showEditModal({{ $article->id }})">
                                        <span class=" d">Edit</span>
                                        <svg class="os sf du" viewBox="0 0 32 32">
                                            <path d="M19.7 8.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM12.6 22H10v-2.6l6-6 2.6 2.6-6 6zm7.4-7.4L17.4 12l1.6-1.6 2.6 2.6-1.6 1.6z"></path>
                                        </svg>
                                    </button>

                                    <button class="yl xy rounded-full" wire:click="deleteId({{ $article->id }})">
                                        <span class=" d">Delete</span>
                                        <svg class="os sf du" viewBox="0 0 32 32">
                                            <path d="M13 15h2v6h-2zM17 15h2v6h-2z"></path>
                                            <path d="M20 9c0-.6-.4-1-1-1h-6c-.6 0-1 .4-1 1v2H8v2h1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V13h1v-2h-4V9zm-6 1h4v1h-4v-1zm7 3v9H11v-9h10z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="vi wy w_ vo lm" colspan="8">No records found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>


    {{ $articles->links() }}

    <x-dialog-modal wire:model="showArticleModal" class="">

        @if ($articleId)
        <x-slot name="title" class="border-b">Update Article</x-slot>
        @else
        <x-slot name="title" class="border-b bg-slate-200">
            <span class="font-semibold">Create Article</span>
        </x-slot>
        @endif

        <x-slot name="content">
            <div class="border-t">
                <div class="vc vu ">
                    <div class="fw">

                        <form wire:submit.prevent="createArticle">
                            <div class="my-3 md:mt-0 md:col-span-2" x-data="{tab: 0}">
                                <div class="mb-5 flex border border-black overflow-hidden">
                                    <button class="px-4 py-2 w-full font-bold" :class="{ 'active bg-gray-800 text-white': tab === 0 }" x-on:click.prevent="tab = 0">General</button>
                                    <button class="px-4 py-2 w-full font-bold" :class="{ 'active bg-gray-800 text-white': tab === 1 }" x-on:click.prevent="tab = 1">Meta</button>
                                    <button class="px-4 py-2 w-full font-bold" :class="{ 'active bg-gray-800 text-white': tab === 2 }" x-on:click.prevent="tab = 2">Image</button>
                                </div>
                                <div>
                                    <div class="mt-6 flex flex-col space-y-3" x-show="tab === 0">
                                        <div class="flex flex-col space-y-3" x-data="{openInput : false}">
                                            <div class="w-full flex flex-row justify-between">
                                                <div class="w-1/2 flex flex-col col-span-6 sm:col-span-3">
                                                    <label for="first-name" class="flex flex-row items-center space-x-2 text-sm font-medium text-gray-700">
                                                        Category
                                                        @if ($showMessage)
                                                        <span class="ml-2 text-xs text-green-700 italic">category added!</span>
                                                        @endif
                                                    </label>
                                                    <select wire:model="categoryId" class="h-full2 w-full capitalize rounded-r border-t border-r border-b block appearance-none w-full bg-white border-gray-300 text-gray-700 py-2 px-4 pr-8 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                                        <option value="">Select Category</option>
                                                        @foreach($categories as $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="flex items-end">
                                                    <div class="btn bg-white cursor-pointer border-slate-200 hover--border-slate-300 yl xy" @click="openInput = ! openInput">Add new Category</div>
                                                </div>
                                            </div>
                                            <div wire:ignore class="w-full flex flex-row pb-4 space-x-2 border-b items-center" x-show="openInput" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                                                <div class="w-1/2">
                                                    <input wire:model="categoryItem" class="w-full s me2 xq2" type="text">
                                                </div>
                                                <div class="flex items-end">
                                                    <div class="btn  cursor-pointer border-slate-200 hover--border-slate-300 ho xi ye" wire:click.prevent="categoryAdd" @click="openInput = ! openInput">Save</div>
                                                    <div class="btn  cursor-pointer border-slate-200 hover--border-slate-300 ha xo ye" @click="openInput = ! openInput">Close</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-start-1 sm:col-span-3">
                                            <label for="title" class="block text-sm font-medium text-gray-700">
                                                Article Title
                                            </label>
                                            <input wire:model="title" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        </div>
                                        <div class="col-start-1 sm:col-span-3">
                                            <label for="title" class="block text-sm font-medium text-gray-700">
                                                Body
                                            </label>
                                            @if ($articleId)
                                            <div x-data="{ trix: @entangle($body).defer }" class="hidden">
                                                <input value="{{ $body }}" id="{{ $body }}" name="{{ $body }}" type="hidden" />
                                                <div wire:ignore x-on:trix-change.debounce.500ms=" trix=$refs.trixInput.value">
                                                    <trix-editor x-ref="trixInput" input="{{ $body }}" class="overflow-y-scroll" style="height: 10rem;"></trix-editor>
                                                </div>
                                            </div>

                                            <div class="mt-2 bg-white" wire:ignore>
                                                <div id="toolbar-container">
                                                    <span class="ql-formats">
                                                        <select class="ql-font"></select>
                                                        <select class="ql-size"></select>
                                                    </span>
                                                    <span class="ql-formats">
                                                        <button class="ql-bold"></button>
                                                        <button class="ql-italic"></button>
                                                        <button class="ql-underline"></button>
                                                        <button class="ql-strike"></button>
                                                    </span>
                                                    <span class="ql-formats">
                                                        <select class="ql-color"></select>
                                                        <select class="ql-background"></select>
                                                    </span>
                                                    <span class="ql-formats">
                                                        <button class="ql-script" value="sub"></button>
                                                        <button class="ql-script" value="super"></button>
                                                    </span>
                                                    <span class="ql-formats">
                                                        <button class="ql-header" value="1"></button>
                                                        <button class="ql-header" value="2"></button>
                                                        <button class="ql-blockquote"></button>
                                                        <button class="ql-code-block"></button>
                                                    </span>
                                                    <span class="ql-formats">
                                                        <button class="ql-list" value="ordered"></button>
                                                        <button class="ql-list" value="bullet"></button>
                                                        <button class="ql-indent" value="-1"></button>
                                                        <button class="ql-indent" value="+1"></button>
                                                    </span>
                                                    <span class="ql-formats">
                                                        <button class="ql-direction" value="rtl"></button>
                                                        <select class="ql-align"></select>
                                                    </span>
                                                    <span class="ql-formats">
                                                        <button class="ql-link"></button>
                                                        <button class="ql-image"></button>
                                                        <button class="ql-video"></button>
                                                        <button class="ql-formula"></button>
                                                    </span>
                                                    <span class="ql-formats">
                                                        <button class="ql-clean"></button>
                                                    </span>
                                                </div>
                                                <div 
                                                    class="h-64" 
                                                    x-data x-ref="quillEditor" 
                                                    x-init="
                                                        quill = new Quill($refs.quillEditor, { 
                                                            theme: 'bubble', 
                                                            modules: { 
                                                                toolbar: '#toolbar-container' 
                                                            } 
                                                        });
                                                        quill.root.innerHTML = '{!! $body !!}';
                                                        quill.on('text-change', function() { 
                                                            $dispatch('quill-input', quill.root.innerHTML); 
                                                        });" 
                                                    x-on:quill-input.debounce.2000ms="@this.set('body', $event.detail)"
                                                >
                                                    {!! $body !!}
                                                </div>
                                            </div>
                                            @else
                                            <div wire:ignore class="hidden">
                                                <input id="{{ $trixId }}" type="hidden" name="content" value="{{ $body }}" />
                                                <trix-editor wire:ignore input="{{ $trixId }}" class="overflow-y-scroll" style="height: 10rem;"></trix-editor>
                                            </div>

                                            <div class="mt-2 bg-white border border-gray-200" wire:ignore>
                                                <div 
                                                    class="h-64" 
                                                    x-data x-ref="quillEditor" 
                                                    x-init="
                                                        quill = new Quill($refs.quillEditor, {
                                                            theme: 'snow',
                                                            modules: {
                                                                toolbar: [
                                                                    [{ header: [1, 2, false] }],
                                                                    ['bold', 'italic', 'underline'],
                                                                    ['image', 'code-block']
                                                                ]
                                                            },
                                                        });
                                                        quill.on('text-change', function() {
                                                            $dispatch('quill-input', quill.root.innerHTML);
                                                        });" 
                                                    x-on:quill-input.debounce.2000ms="@this.set('body', $event.detail)">
                                                    {!! $body !!}
                                                </div>
                                            </div>
                                            @endif
                                        </div>

                                        <div class="col-start-1 sm:col-span-3">
                                            <label for="title" class="block text-sm font-medium text-gray-700">
                                                Tags
                                            </label>
                                            <div>
                                                <div x-data="{tags: @entangle('tags'), newTag: '' }">
                                                    <template x-for="tag in tags">
                                                        <input type="hidden" :value="tag" name="tags">
                                                    </template>

                                                    <div class="max-w-sm w-full ">
                                                        <div class="tags-input">

                                                            <input class="appearance-none border py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-1 focus:ring-indigo-500 focus:border-2 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-600" placeholder="Enter some tags" @keydown.enter.prevent="if (newTag.trim() !== '') tags.push(newTag.trim()); newTag = ''" @keydown.backspace="if (newTag.trim() === '') tags.pop()" x-model="newTag">
                                                            
                                                            <template x-for="tag in tags" :key="tag">
                                                                <div class="bg-gray-200 inline-flex items-center text-sm rounded mt-2 mr-1">
                                                                    <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs" x-text="tag"></span>
                                                                    <button type="button" class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none" @click="tags = tags.filter(i => i !== tag)">
                                                                        <svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                            <path fill-rule="evenodd" d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </template>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-row justify-between">
                                            <div class="col-start-1 sm:col-span-3">
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Url
                                                </label>
                                                <input wire:model="url" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                            </div>
                                            <div class="col-start-1 sm:col-span-3">
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Embed Url
                                                </label>
                                                <input wire:model="embedUrl" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                            </div>
                                        </div>

                                        <div class="flex flex-row justify-between">
                                            <div class="col-start-1 sm:col-span-3">
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Published At
                                                </label>

                                                <x-flatpicker wire:model="publishedAt"></x-flatpicker>
                                            </div>
                                            <div class="col-start-1 sm:col-span-3">
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Author
                                                </label>
                                                <input wire:model="author" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                            </div>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="first-name" class="block text-sm font-medium text-gray-700">Status</label>
                                            <select wire:model="articleStatus" class="h-full rounded-r border-t border-r border-b block appearance-none w-full bg-white border-gray-300 text-gray-700 py-2 px-4 pr-8 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                                <option value="">Select Option</option>
                                                @foreach($statuses as $status)
                                                <option value="{{ $status }}">{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mt-6 flex flex-col space-y-3" x-show="tab === 1">
                                        <div class="col-start-1 sm:col-span-3">
                                            <label for="title" class="block text-sm font-medium text-gray-700">
                                                Meta Title
                                            </label>
                                            <input wire:model="metaTitle" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        </div>
                                        <div class="col-start-1 sm:col-span-3">
                                            <label for="title" class="block text-sm font-medium text-gray-700">
                                                Meta Keyword
                                            </label>
                                            <input wire:model="metaKeyword" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        </div>
                                        <div class="col-start-1 sm:col-span-3">
                                            <label for="title" class="block text-sm font-medium text-gray-700">
                                                Meta Description
                                            </label>
                                            <textarea wire:model="metaDesc" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                        </div>
                                    </div>

                                    <div class="mt-6 flex flex-col space-y-3" x-show="tab === 2">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="photo" class="block text-sm font-medium text-gray-700">
                                                Image
                                            </label>
                                            <input wire:model="file" type="file" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                            @if ($oldImage)
                                            Photo Preview:
                                            <img src="{{ asset('storage/'.$oldImage) }}">
                                            @endif
                                            @if ($file)
                                            Photo Preview:
                                            <img src="{{ $file->temporaryUrl() }}">
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="border-slate-200">
                <div class="flex flex-wrap justify-end fc">
                    <x-button wire:click="closeArticleModal" class="border-slate-200 hover:text-white hover--border-slate-300 g_">Cancel</x-button>
                    @if ($articleId)
                    <x-button wire:click="updateArticle" class=" ho xi ye">Update</x-button>
                    @else
                    <x-button wire:click="createArticle" class=" ho xi ye2">Create</x-button>
                    @endif
                </div>
            </div>

        </x-slot>
    </x-dialog-modal>

    <!-- modal delete confirmation -->
    <x-dialog-modal wire:model="showConfirmModal" class="">


        <x-slot name="title" class="border-b bg-slate-200">
            <span class="font-semibold">Delete Confirm</span>
        </x-slot>


        <x-slot name="content">
            <div class="border-t">
                <div class="vc vu ">
                    <div class="fw">


                        <div class="">
                            <div class="">
                                <div class="flex flex-col space-y-3">
                                    <div class="flex max-w-auto text-center justify-center items-center">
                                        <div class="text-lg font-semibold ">
                                            <p>Are you sure want to delete?</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="border-slate-200">
                <div class="flex flex-wrap justify-end fc">
                    <x-button wire:click="closeConfirmModal" class="border-slate-200 hover:text-white  g_">Cancel</x-button>
                    <x-button wire:click.prevent="delete()" class=" ho xi ye2">Delete</x-button>
                </div>
            </div>

        </x-slot>
    </x-dialog-modal>

</div>

@push('styles')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" /> -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('js')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script> -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    // var trixEditor = document.getElementById("{{ $trixId }}")

    // addEventListener("trix-blur", function(event) {
    //     @this.set('body', trixEditor.getAttribute('value'))
    // })

    var quill = new Quill('#quill-editor-area', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{
                    header: [1, 2, 3, 4, 5, 6, false]
                }],
                [{
                    font: []
                }],
                ["bold", "italic"],
                ["link", "blockquote", "code-block", "image"],
                [{
                    list: "ordered"
                }, {
                    list: "bullet"
                }],
                [{
                    script: "sub"
                }, {
                    script: "super"
                }],
                [{
                    color: []
                }, {
                    background: []
                }],
            ]
        },
    });
</script>
@endpush