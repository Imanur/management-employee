<x-guest-layout>
    <x-auth-session-status :success="session('success')" />
    <x-auth-validation-error class="text-sm" :errors="session('errors')"/>
      <x-auth-card>
          <x-slot name="logos">
              <a href="/" class="h2">
                  <b>{{ __('Employees') }}</b>
              </a>
          </x-slot>
          <p class="register-box-msg">Register a new membership</p>
          <form method="post" action="{{ route('register') }}">
              @csrf
              <div class="input-group mb-3">
                <x-input type="text" name="name" placeholder="Fullname" autofocus/>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <x-input type="email" name="email" placeholder="Email"/>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
  
              <div class="input-group mb-3">
                <x-input type="password" name="password" placeholder="Password" />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
  
              <div class="input-group mb-3">
                <x-input type="password" name="password_confirmation" placeholder="Retype Password" />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
  
              <div class="row">
                <div class="col-12">
                  <x-button class="btn btn-primary">{{ __('Register') }}</x-button>
                  <x-hyperlink class="btn btn-secondary" href="{{ route('login') }}">{{ __('Sign In') }}</x-hyperlink>
                </div>
              </div>
            </form>
  
      </x-auth-card>    
  </x-guest-layout>    