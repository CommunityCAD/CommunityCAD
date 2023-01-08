<button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none" @click="open = !open"
    @keydown.escape="open = false" aria-label="Account" aria-haspopup="true">
    <div class="discord-link">
        @if (auth()->user()->avatar)
            <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{ auth()->user()->avatar }}"
                alt="{{ auth()->user()->discord_name }}#{{ auth()->user()->discriminator }}" />
        @endif

        <div>
            {{ auth()->user()->discord_name }}#{{ auth()->user()->discriminator }}
        </div>

        <div class="ml-1">
            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </div>
    </div>
</button>
