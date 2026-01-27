<template>
    <div class="container">
        <h1>
            {{ dayOfWeek }}
        </h1>
        <h3>
            {{ day }}
        </h3>
        <div class="current-task">
            <div class="task-header">
                <img src="/public/storage/images/clock_icon.png" alt="Clock">
                <h2>
                    Right Now
                </h2>
            </div>
            <div class="task-content" v-if="false" style="text-align: center; margin-bottom: 30px;">
                <p style="font-size: 30px; color: #778873; margin-bottom: 20px;">
                    Nothing scheduled for now.
                </p>
                <p style="font-size: 18px; color: #778873;">
                    Take a moment to relax or plan your days!
                </p>
            </div>
            <div class="task-content" v-else>
                <p class="content-title">
                    Task Title
                </p>
                <p class="content-category">
                    Category Name
                </p>
                <p class="content-time">
                    Start Time - End Time
                </p>
            </div>
        </div>
        <div class="today-content">
            <div class="task-header">
                <img src="/public/storage/images/calendar_icon2.png" alt="Calendar">
                <h2>
                    Today's Schedule
                </h2>
            </div>
            <div class="task-content" v-if="true">
                <div class="task-item">
                    <div class="content-time">
                        <p class="time" style="padding-top: 4px;">
                            10:00
                        </p>
                        <p class="time">
                            AM
                        </p>
                    </div>
                    <div>
                        <p class="content-title">
                            Task 1 Title
                        </p>
                        <p class="content-category">
                            Category Name
                        </p>
                    </div>
                    <div>
                        <p>
                            11:00 PM
                        </p>
                    </div>
                </div>
            </div>
            <div class="task-content" v-else>
                
            </div>
        </div>
    </div>
</template>

<script setup>
    const today = new Date()
    const day = today.toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric'
    })
    const dayOfWeek = today.toLocaleDateString('en-US', {
        weekday: 'long'
    })
</script>