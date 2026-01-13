<template>
  <div class="login-container">
    <div class="login-card">
      <h1>Login</h1>
      
      <form @submit.prevent="handleLogin">
        <div v-if="errorMessage" class="alert alert-danger">
          {{ errorMessage }}
        </div>

        <div class="form-group">
          <label for="email">Email Address</label>
          <input
            id="email"
            v-model="credentials.email"
            type="email"
            class="form-control"
            placeholder="Enter your email"
            required
            :disabled="isLoading"
          />
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input
            id="password"
            v-model="credentials.password"
            type="password"
            class="form-control"
            placeholder="Enter your password"
            required
            :disabled="isLoading"
          />
        </div>

        <button
          type="submit"
          class="btn btn-primary"
          :disabled="isLoading"
        >
          {{ isLoading ? 'Logging in...' : 'Login' }}
        </button>
      </form>

      <p class="register-link">
        Don't have an account? <a href="/register">Register here</a>
      </p>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'

export default {
  name: 'Login',
  setup() {
    const credentials = ref({
      email: '',
      password: '',
    })
    const errorMessage = ref('')
    const isLoading = ref(false)

    const handleLogin = async () => {
      errorMessage.value = ''
      isLoading.value = true

      try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content
        
        if (!csrfToken) {
          errorMessage.value = 'CSRF token not found. Please refresh the page.'
          isLoading.value = false
          return
        }

        const response = await fetch('/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
          },
          credentials: 'same-origin',
          body: JSON.stringify(credentials.value),
        })

        const data = await response.json()

        if (response.ok && data.success) {
          window.location.href = '/dashboard'
        } else {
          errorMessage.value = data.message || 'Invalid credentials'
        }
      } catch (error) {
        console.error('Login error:', error)
        errorMessage.value = 'Network error. Please try again.'
      } finally {
        isLoading.value = false
      }
    }

    return {
      credentials,
      errorMessage,
      isLoading,
      handleLogin,
    }
  },
}
</script>

<style scoped>
.login-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue',
    Arial, sans-serif;
}

.login-card {
  background: white;
  padding: 2.5rem;
  border-radius: 8px;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
  width: 100%;
  max-width: 400px;
}

h1 {
  text-align: center;
  color: #333;
  margin-bottom: 2rem;
  font-size: 1.8rem;
}

.form-group {
  margin-bottom: 1.5rem;
}

label {
  display: block;
  margin-bottom: 0.5rem;
  color: #555;
  font-weight: 600;
  font-size: 0.95rem;
}

.form-control {
  width: 100%;
  padding: 0.75rem;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 1rem;
  transition: border-color 0.3s ease;
  box-sizing: border-box;
}

.form-control:focus {
  outline: none;
  border-color: #667eea;
  box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.form-control:disabled {
  background-color: #f5f5f5;
  cursor: not-allowed;
  opacity: 0.6;
}

.btn {
  width: 100%;
  padding: 0.75rem;
  border: none;
  border-radius: 4px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-primary {
  background-color: #667eea;
  color: white;
}

.btn-primary:hover:not(:disabled) {
  background-color: #5568d3;
  box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
}

.btn-primary:disabled {
  background-color: #ccc;
  cursor: not-allowed;
}

.alert {
  padding: 1rem;
  margin-bottom: 1.5rem;
  border-radius: 4px;
  font-size: 0.95rem;
}

.alert-danger {
  background-color: #f8d7da;
  color: #721c24;
  border: 1px solid #f5c6cb;
}

.register-link {
  text-align: center;
  margin-top: 1.5rem;
  color: #666;
  font-size: 0.95rem;
}

.register-link a {
  color: #667eea;
  text-decoration: none;
  font-weight: 600;
}

.register-link a:hover {
  text-decoration: underline;
}
</style>
