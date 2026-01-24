<template>
  <div class="content">
    <div class="card">
      <div class="column left-login">
        <img
          src="/storage/app/public/images/register_img.png"
          alt="Register Image"
        />
      </div>
        
      <div class="column right-login">
        <h1 class="title">Tempo</h1>

        <input type="email" placeholder="Email" />
        <input type="password" placeholder="Password" />
        
        <router-link
          to="/register"
          class="link" style="align-self: flex-end; font-size: 14px;"
        >
          Forgot your password?
        </router-link>

        <button class="btn-primary">Login</button>
        <div style="display: flex; justify-content: center;">
          <div class="or-line">
            <span></span>
            <span class="or">or</span>
            <span></span>
          </div>
        </div>
        <div class="social-buttons">
          <div class="social-btn">
            <img 
              src="/storage/app/public/images/google_icon.png"
              alt="Google Icon"
            />
          </div>
          <div class="social-btn">
            <img 
              src="/storage/app/public/images/facebook_icon.png"
              alt="Google Icon"
            />
          </div>
          <div class="social-btn">
            <img style="width: 23px;"
              src="/storage/app/public/images/apple_icon.png"
              alt="Google Icon"
            />
          </div>
        </div>
        <router-link
          to="/register"
          class="link"
        >
          Don't have an account? Register here!
        </router-link>
      </div>
    </div>
  </div>
</template> 