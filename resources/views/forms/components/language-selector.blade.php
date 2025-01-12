<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <style>
        .page-wrapper {
            background-color: white;
            border: solid 1px #EAEAEA;
            border-radius: 1rem;
            padding: 2rem;
            width: 100%;
        }

        .tabs-wrapper {
            margin-bottom: 1rem;
            width: 100%;
        }

        .tabs-header {
            display: flex;
            width: 100%;
            align-items: center;
            padding: 0.25rem 0px;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            text-align: center;
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity));
        }

        .tabs-header li {
            cursor: pointer;
            margin-right: 0.5rem;
            width: 50%;
        }

        .tabs-header li>div {
            display: flex;
            justify-content: center;
            align-items: center;
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity));
            font-weight: 600;
        }

        .tabs-header li>div>span {
            margin-right: 0.5rem;
        }

        .tab-icon {
            min-height: 0px;
            min-width: 0px;
            width: 1.25rem;
            flex-shrink: 0;
        }


        .selected-tab {
            background-color: white;
            margin: 0px 0.5rem;
            padding: 0.5rem 0px;
            border-radius: 0.5rem;
            border: 1px solid transparent;
        }

    /*   Dark Mode */
        .dark .tabs-header
        {
           background-color : rgba(var(--gray-200), 1);
        }

        .dark .selected-tab
        {
            background-color: white;
            border: 1px solid rgba(var(--primary-400), var(--tw-text-opacity));
        }
        .dark .tabs-header .selected-tab>div
        {
            color:  rgba(var(--primary-400) , var(--tw-text-opacity));
        }

        .check-icon {
            color:  rgba(var(--primary-400) , var(--tw-text-opacity));
            width: 18px;  /* Adjust size */
            height: 18px;
        }

    </style>
    <div x-data="{ state: $wire.{{ $applyStateBindingModifiers("\$entangle('{$getStatePath()}')") }} }">
        <div class="tabs-wrapper">
            <ul class="tabs-header" role="tablist">

                @foreach ($getAvailableLanguages() as $key => $language)
                    <li @click="state = '{{ $key }}'" class="{{ $key == $getState() ? 'selected-tab' : '' }}">
                        <div>
                            <span>
                                @if ($key == $getState())
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="check-icon" width="24" height="24">
  <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor"></circle>
  <path d="M16 8L10 14L8 12" />
</svg>

                                @else
                                    <img src="https://file.rendit.io/n/N28BuU8d9SOttoDgtF2d.svg" class="tab-icon" />
                                @endif
                            </span>{{ $language }}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-dynamic-component>
