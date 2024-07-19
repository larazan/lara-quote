<div class="">
    <div id="persons-select" wire:ignore></div>
</div>

<livewire:tags />

@push('js')
<script>
        let myOptions = [
                    @foreach($persons as $person)
                        { label: "{{ $person->name }}", value: "{{ $person->id }}" };
                    @endforeach
                ];
            VirtualSelect.init({
                ele: '#persons-select',
                options: myOptions,
                multiple: true,
                search: true,
                placeholder: "{{__('Select Picked Orders')}}",
                noOptionsText: "{{__('No results found')}}",
            });
            let selectedUsers = document.querySelector('#persons-select')
            selectedUsers.addEventListener('change', () => {
                let data = selectedUsers.value
                @this.set('selectedUsers', data)
            })
    </script>
@endpush