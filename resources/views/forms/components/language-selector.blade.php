<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div x-data="{ state: $wire.entangle('{{ $getStatePath() }}') }">
        <div>
            @foreach($getAvailableLanguages() as $key => $language)
                <button @click.prevent="state = '{{$key}}'" class="{{$key == $getState() ? 'bg-main' : ''}}">{{$language}}</button>
            @endforeach
        </div>
    </div>
</x-dynamic-component>
