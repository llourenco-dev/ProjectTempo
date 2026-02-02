<template>
    <div class="container">
        <h1>Calendar</h1>
        <h3>Your monthly calendar overview.</h3>

        <div class="calendar-content">
            <div class="calendar-header">
                <h2>{{ monthName }} {{ year }}</h2>

                <div>
                    <button @click="prevMonth">‹</button>
                    <button>Today</button>
                    <button @click="nextMonth">›</button>
                </div>
            </div>

            <div class="calendar">
                <div v-for="day in weekdays" :key="day" class="weekday">
                    {{ day }}
                </div>

                <div
                    v-for="day in calendarDays"
                    :key="day.key"
                    class="day"
                    :class="{ 
                        outside: !day.isCurrentMonth,
                        today: day.isToday
                    }"
                >
                    <span class="date">{{ day.day }}</span>

                    <div
                        v-for="event in eventsForDate(day.fullDate)"
                        :key="event.title"
                        class="event"
                        :class="event.type"
                    >
                        {{ event.title }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref, computed } from "vue"

const weekdays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"]
const currentDate = ref(new Date())

const year = computed(() => currentDate.value.getFullYear())
const month = computed(() => currentDate.value.getMonth())

const today = new Date()
today.setHours(0, 0, 0, 0)

const monthName = computed(() =>
  currentDate.value.toLocaleString("default", { month: "long" })
)

const firstDayOfMonth = computed(() =>
  new Date(year.value, month.value, 1).getDay()
)

const daysInMonth = computed(() =>
  new Date(year.value, month.value + 1, 0).getDate()
)

const daysInPrevMonth = computed(() =>
  new Date(year.value, month.value, 0).getDate()
)

const calendarDays = computed(() => {
  const days = []

  for (let i = firstDayOfMonth.value - 1; i >= 0; i--) {
    const day = daysInPrevMonth.value - i
    const date = new Date(year.value, month.value - 1, day)
    date.setHours(0, 0, 0, 0)

    days.push({
      key: `prev-${day}`,
      day,
      isCurrentMonth: false,
      fullDate: date,
      isToday: date.getTime() === today.getTime()
    })
  }

  for (let day = 1; day <= daysInMonth.value; day++) {
    const date = new Date(year.value, month.value, day)
    date.setHours(0, 0, 0, 0)

    days.push({
      key: `current-${day}`,
      day,
      isCurrentMonth: true,
      fullDate: date,
      isToday: date.getTime() === today.getTime()
    })
  }

  const remaining = days.length % 7
  if (remaining !== 0) {
    const toAdd = 7 - remaining
    for (let i = 1; i <= toAdd; i++) {
      const date = new Date(year.value, month.value + 1, i)
      date.setHours(0, 0, 0, 0)

      days.push({
        key: `next-${i}`,
        day: i,
        isCurrentMonth: false,
        fullDate: date,
        isToday: date.getTime() === today.getTime()
      })
    }
  }

  return days
})

function prevMonth() {
  currentDate.value = new Date(year.value, month.value - 1, 1)
}

function nextMonth() {
  currentDate.value = new Date(year.value, month.value + 1, 1)
}

const events = {
  "2025-12-31": [{ title: "New Year Prep", type: "light" }]
}

function eventsForDate(date) {
  const key = date.toISOString().slice(0, 10)
  return events[key] || []
}
</script>