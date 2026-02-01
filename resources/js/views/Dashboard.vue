<template>
    <div class="container">
        <h1>
            {{ dayOfWeek }}
        </h1>
        <h3>
            {{ day }}
        </h3>
        
        <!-- This is the current task the user have, details, etc... -->
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
        
        <!-- Tasks that the user will have as the day goes on -->
        <div class="today-content">
            <div class="task-header">
                <img src="/public/storage/images/calendar_icon2.png" alt="Calendar">
                <h2>
                    Today's Schedule
                </h2>
            </div>
            <div class="task-content" v-if="true">
                <div class="task-item" @click="openTask({
                    title: 'Task 1 Title',
                    category: 'Category Name',
                    start: '10:00 AM',
                    end: '11:00 AM',
                    date: 'Sunday, February 1, 2026'
                })">
                    <div class="content-time">
                        <p class="start-time" style="padding-top: 4px;">
                            10:00
                        </p>
                        <p class="start-time">
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
                    <div class="end-time">
                        <p>
                            11:00 AM
                        </p>
                    </div>
                </div>
                <div class="task-item" @click="openTask({
                    title: 'Task 2 Title',
                    category: 'Category Name',
                    start: '12:00 PM',
                    end: '1:00 PM',
                    date: 'Sunday, February 1, 2026'
                })">
                    <div class="content-time">
                        <p class="start-time" style="padding-top: 4px;">
                            12:00
                        </p>
                        <p class="start-time">
                            PM
                        </p>
                    </div>
                    <div>
                        <p class="content-title">
                            Task 2 Title
                        </p>
                        <p class="content-category">
                            Category Name
                        </p>
                    </div>
                    <div class="end-time">
                        <p>
                            1:00 PM
                        </p>
                    </div>
                </div>
            </div>
            <!-- TO DO: Adicionar um else if, caso houve tarefas no dia, aparecer algo de "tarefas diárias acabaram, podes descansar" -->
            <!--        Caso não houvessem tarefas de todo dar trigger do else statement. -->
            <div class="task-content" v-else style="text-align: center; margin-bottom: 30px;">
                <p style="font-size: 30px; color: #778873; margin-bottom: 20px;">
                    Your day looks empty.
                </p>
                <p style="font-size: 18px; color: #778873;">
                    Set up your tasks to stay productive!
                </p>
            </div>
        </div>

        <transition name="modal-fade">
            <div
                v-if="showModal"
                class="modal-backdrop"
                @click.self="closeModal"
            >
                <div class="modal" @click.stop>
                    <div class="modal-header"> 
                        <img
                            src="/storage/app/public/images/close_icon.png"
                            alt="Close"
                            style="float: right; cursor: pointer;"
                            @click="closeModal"
                        />
                        <h2 class="modal-title">{{ selectedTask.title }}</h2> 
                        <p style="color: var(--primary-color); margin-bottom: 1.5rem;">Activity Details</p> 
                        
                        <div class="modal-category"> 
                            <img src="/storage/app/public/images/label_icon.png" alt="Label" style="cursor: default;"> 
                            <span>{{ selectedTask.category }}</span> 
                        </div> 
                    </div> 
                    
                    <div class="modal-time"> 
                        <img src="/storage/app/public/images/clock_icon.png" alt="Clock" style="cursor: default;"> 
                        <span>Start Time:</span> <span style="font-weight: normal; color: var(--primary-color);">{{ selectedTask.start }}</span> 
                    </div> 

                    <br> 

                    <div class="modal-time"> 
                        <img src="/storage/app/public/images/clock_icon.png" alt="Clock" style="cursor: default;"> 
                        <span>End Time:</span> <span style="font-weight: normal; color: var(--primary-color);">{{ selectedTask.end }}</span> 
                    </div> 
                    
                    <hr> 
                    
                    <div class="modal-time"> 
                        <img src="/storage/app/public/images/calendar_icon2.png" alt="Clock" style="cursor: default;"> 
                        <span>Date:</span> <span style="font-weight: normal; color: var(--primary-color);">{{ selectedTask.date }}</span> 
                    </div> 
                    
                    <div class="modal-duration"> 
                        <span>Duration: 60 minutes</span> 
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script setup>
    import { ref } from 'vue';

    const today = new Date()
    const day = today.toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric'
    })
    const dayOfWeek = today.toLocaleDateString('en-US', {
        weekday: 'long'
    })

    const showModal = ref(false);
    const selectedTask = ref(null);

    function openTask(task) {
        selectedTask.value = task;
        showModal.value = true;
    }

    function closeModal(){
        showModal.value = false;
        selectedTask.value = null
    }
</script>