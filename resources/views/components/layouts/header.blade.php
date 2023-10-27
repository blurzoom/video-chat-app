<nav>
    <header class="bg-white shadow">
        <div
            class="relative mx-auto max-w-7xl px-4 py-2 sm:px-6 lg:px-8 lg:py-5"
        >
            {{-- {{ $header }} --}}
            <ul class="hidden flex-row space-x-4 sm:visible sm:flex">
                <li
                    class="mx-2 flex h-10 items-center justify-center rounded bg-gray-100 px-2 transition duration-300 hover:bg-gray-400"
                >
                    <a href="">header1</a>
                </li>
            </ul>
            <div class="flex justify-between sm:hidden">
                <div class="flex items-center justify-center">Application</div>
                <label for="mobile-menu-button" class="text-sm">
                    <button
                        id="mobile-menu-button"
                        title="Menu"
                        class="flex h-10 w-10 items-center justify-center rounded-lg border bg-gray-100 transition-all hover:text-white"
                    >
                        <span class="material-icons">reorder</span>
                    </button>
                    menu
                </label>
            </div>
        </div>
    </header>
    <div
        class="mobile-menu invisible hidden min-h-screen w-0 bg-gray-100 transition-all duration-300 ease-linear"
    >
        <ul class="min-h-screen bg-gray-300">
            <li class="active">
                <a
                    href="#"
                    class="block bg-green-500 px-2 py-4 text-sm font-semibold text-white"
                >
                    Home
                </a>
            </li>
            <li>
                <a
                    href="#services"
                    class="block px-2 py-4 text-sm transition duration-300 hover:bg-green-500"
                >
                    Services
                </a>
            </li>
            <li>
                <a
                    href="#about"
                    class="block px-2 py-4 text-sm transition duration-300 hover:bg-green-500"
                >
                    About
                </a>
            </li>
            <li>
                <a
                    href="#contact"
                    class="block px-2 py-4 text-sm transition duration-300 hover:bg-green-500"
                >
                    Contact Us
                </a>
            </li>
        </ul>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const btn = document.getElementById("mobile-menu-button");
            const menu = document.querySelector(".mobile-menu");
            const main_content = document.getElementById("content");

            btn.addEventListener("click", () => {
                if (menu.classList.contains("hidden")) {
                    hide(0);
                    animation(100);
                } else {
                    animation(0);
                    hide(300);
                }

                function hide(timer) {
                    setTimeout(() => {
                        menu.classList.toggle("hidden");
                    }, timer);
                }

                function animation(timer) {
                    setTimeout(() => {
                        menu.classList.toggle("invisible");
                        menu.classList.toggle("visible");
                        menu.classList.toggle("w-0");
                        menu.classList.toggle("w-full");
                        main_content.classList.toggle("visible");
                        main_content.classList.toggle("invisible");
                    }, timer);
                }
            });
        });
    </script>
</nav>
