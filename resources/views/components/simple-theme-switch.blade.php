<button id="theme-toggle" type="button" class="text-gray-300 underline text-sm">
    Switch Theme
</button>

<script>
    (function() {
        const darkToggle = document.querySelector('#theme-toggle');

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
