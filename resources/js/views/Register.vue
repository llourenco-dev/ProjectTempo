<template>
  <div class="content">
    <div class="card">
      <div class="column left-register">
        <h1 class="title">Tempo</h1>

        <input type="text" placeholder="Name" />
        <input type="email" placeholder="Email" />
        <input type="password" placeholder="Password" />

        <button class="btn-primary">Register</button>
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
          to="/login"
          class="link"
        >
          Have an account? Login
        </router-link>
      </div>
      <div class="column right-register">
        <img
          src="/storage/app/public/images/register_img.png"
          alt="Register Image"
        />
      </div>
    </div>
  </div>
</template> 