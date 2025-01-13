<nav class="bg-white dark:bg-gray-900 fixed w-full z-50 top-0 start-0 border-b border-gray-200 dark:border-gray-600 z-50">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- Logo and Title -->
        <a href="index.php?modul=landing" class="mr-auto flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/assets/ocafe-logo.png" class="h-8" alt="ocafe Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">OTAKU CAFE ID</span>
        </a>
        
        <!-- Right section: Logout button and Menu Toggle -->
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            
            <button id="menu-toggle" 
                    type="button" 
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" 
                    aria-controls="navbar-sticky" 
                    aria-expanded="false">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        
        <!-- Navigation Links -->
        <div id="navbar-sticky" class="hidden items-center justify-between w-full md:flex md:w-auto md:order-1">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="index.php?modul=landing&show=ShowE" 
                       class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        Event
                    </a>
                </li>
                <li>
                    <a href="index.php?modul=landing&show=ShowN" 
                       class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        News
                    </a>
                </li>
                <li>
                    <a href="index.php?modul=landing&show=ShowP" 
                       class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        Partners
                    </a>
                </li>
                <li>
                    <a href="index.php?modul=landing&show=ShowA" 
                       class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        About
                    </a>
                </li>
                <li>
                    <a href="index.php?modul=login" 
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Logout
                </a>
                </li>
            </ul>
        </div>
    </div>    
</nav>
