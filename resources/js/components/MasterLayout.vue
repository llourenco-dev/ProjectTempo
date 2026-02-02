<template>
    <header>
        <nav>
            <router-link 
                to="/dashboard"
                class="title no-margin">
                Tempo
            </router-link>
            <ul>
                <router-link to="/dashboard">
                    <li>
                        <img src="/public/storage/images/home_icon.png" alt="Home" class="icon">
                        <span>Home</span>
                    </li>
                </router-link>
                <router-link to="/calendar">
                    <li to="/calendar">
                        <img src="/public/storage/images/calendar_icon.png" alt="Home" class="icon">
                        <span>Calendar</span>
                    </li>
                </router-link>
                    <li>
                        <img src="/public/storage/images/settings_icon.png" alt="Home" class="icon">
                        <span>Settings</span>
                    </li>
            </ul>
            <button>
                <img src="/public/storage/images/user_icon.png" alt="User Icon" class="icon" style="margin: 0;"/>
            </button>
        </nav>
    </header>

    <main>
        <router-view></router-view>
    </main>
</template>
