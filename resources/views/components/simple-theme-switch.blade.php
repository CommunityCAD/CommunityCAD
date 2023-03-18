<button id="simple-theme-toggle" type="button" class="{{ $attributes->get('class') }}">
    {{ $slot }}
</button>

<script>
    (function() {
        const darkToggle = document.querySelector('#simple-theme-toggle');

        darkToggle.addEventListener('click', (event) => {
            event.preventDefault();
            document.documentElement.classList.toggle('dark');
            updateLocalStorage();
        })
    })();

    function updateLocalStorage() {
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            localStorage.theme = 'light';
        } else {
            localStorage.theme = 'dark'
        }
    }
</script>
