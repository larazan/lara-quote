
<div class="rounded-md bg-pink-100 px-4 py-3" x-data="bg()"  x-cloak {{$attributes->wire('model')}}>
    <div class="flex flex-wrap -mx-2">
        <template x-for="(color, index) in colors" :key="index">
            <div class="px-1.5 ">
                <template x-if="colorSelected === color">
                    <div
                        class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white"
                        :style="`background: ${color}; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);`"></div>
                </template>

                <template x-if="colorSelected != color">
                    <div
                        @click="colorSelected = color"
                        @keydown.enter="colorSelected = color"
                        role="checkbox"
                        tabindex="0"
                        :aria-checked="colorSelected"
                        class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white focus:outline-none focus:shadow-outline"
                        :style="`background: ${color};`"></div>
                </template>
            </div>
        </template>
    </div>
</div>

<script>
    function bg() {
        return {
            isOpen: false,
            colors: @json($options) ? @json($options) : [],
            colorSelected: @entangle($attributes->wire('model')),
        }
    }
</script>

