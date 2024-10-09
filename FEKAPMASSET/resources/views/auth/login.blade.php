@extends('layouts.root')

@section('content')
<div class="relative flex flex-col w-full h-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border justify-center items-center">
  <div class="p-6 pb-8 mb-4 bg-white rounded-t-2xl justify-center">
      <h2 class="text-center text-3xl">Login</h2>
  </div>

  <!-- Error message for failed login -->
  @if (session('login_error'))
      <div class="bg-red-500 text-white p-4 mb-4 rounded-md">
          {{ session('login_error') }}
      </div>
  @endif

  <div class="flex-auto px-0 pt-0 pb-2 w-full max-w-lg">
      <div class="p-4">
          <!-- Form submission to the loginCheck route -->
          <form class="w-full" action="{{ route('login.check') }}" method="POST">
              @csrf
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="nipp">
                          NIPP
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                             id="nipp" name="nipp" type="text" placeholder="2107412040" required>
                  </div>
              </div>

              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="password">
                          Password
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                             id="password" name="password" type="password" placeholder="******************" required>
                  </div>
              </div>
              <div class="md:flex md:items-center">
                  <div class="md:w-full">
                      <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-3 px-4 rounded w-full" type="submit">
                          Login
                      </button>
                  </div>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection
