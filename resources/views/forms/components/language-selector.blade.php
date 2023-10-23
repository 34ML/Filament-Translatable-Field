<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.{{ $applyStateBindingModifiers("\$entangle('{$getStatePath()}')") }} }">
        <div>
            @foreach($getAvailableLanguages() as $key => $language)
                <button @click="state = '{{$key}}'" class="{{$key == $getState() ? 'bg-main' : ''}}">{{$language}}</button>
            @endforeach
        </div>
    </div>
</x-dynamic-component>
