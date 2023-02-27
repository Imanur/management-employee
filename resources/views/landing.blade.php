<x-guest-layout>
    <x-auth-session-status :success="session('success')" />
    <x-auth-validation-error class="text-sm" :errors="session('errors')"/>
      <x-auth-card>
          <x-slot name="logos">
              <a href="/" class="h2">
                  <b>{{ __('Employees') }}</b>
              </a>
            </x-slot>
            <p class="login-box-msg">Check Employees Now!</p>
            <x-hyperlink class="btn btn-primary" href="{{ route('employee.index') }}">{{ __('Go') }}</x-hyperlink>
      </x-auth-card>    
  </x-guest-layout>    