@extends('layouts.app')

@section('content')
<div class="relative flex flex-col w-full h-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border justify-center items-center">
  <div class="p-6 pb-8 mb-4 bg-white rounded-t-2xl justify-center">
      <h2 class="text-center text-3xl">Hardware Specifications</h2>
  </div>
  <div class="flex-auto px-0 pt-0 pb-2 w-full max-w-lg">
      <div class="p-4">                    
          <form class="w-full">
              <div class="md:flex md:justify-between mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-Asset-Specs">
                          ID Asset Specifications
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" placeholder="2" aria-readonly="true"">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          ID Asset
                      </label>
                  </div>
                  <div class="md:w-2/3">
                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Processor Brand</option>
                        {{-- @foreach($hardwareData as $hardware)
                        <option value="{{ $hardware ['-> id']}}">{{ $master ['Processor Brand']}}</option>
                        @endforeach --}}
                    </select>
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label for="countries" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">Select an option</label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Processor Model
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Processor Series
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Memory Type
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Memory Brand
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Memory Model
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Memory Series
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Memory Capacity
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Storage Type
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Storage Brand
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Storage Model
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Storage Capacity
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Graphics Type
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Graphics Brand
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Graphics Model
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Graphics Series
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Graphics Capcity
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Screen Resolution
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Touchscreen
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Backlight Keyboard
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Convertible
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Web Camera
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Speaker
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Microphone
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          WiFi
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-ID-Asset">
                          Bluetooth
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="1">
                  </div>
              </div>
              <div class="md:flex md:items-center">
                  <div class="md:w-full">
                      <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-3 px-4 rounded w-full" type="button">
                          Add Hardware Specifications
                      </button>
                  </div>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection