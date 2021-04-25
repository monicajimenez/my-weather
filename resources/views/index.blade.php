<!DOCTYPE html>
<html>
@include('common.head')
<body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <!-- Start: Icon -->
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg width="152px" height="114px" viewBox="0 0 152 114" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>Cloud_Moon</title>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <path d="M114.048,104.227 L34.272,104.227 C20.337,104.227 9,92.891 9,78.956 C9,65.021 20.337,53.684 34.272,53.684 C38.987,53.684 43.585,54.99 47.568,57.461 C49.679,58.77 52.455,58.121 53.765,56.009 C55.074,53.897 54.425,51.123 52.313,49.812 C47.579,46.877 42.212,45.153 36.662,44.767 C43.655,34.792 55.159,28.626 67.62,28.626 C88.464,28.626 105.421,45.583 105.421,66.427 C105.421,67.493 105.375,68.577 105.285,69.647 C105.055,72.376 104.529,75.075 103.722,77.668 C102.984,80.041 104.309,82.563 106.682,83.302 C107.126,83.441 107.577,83.507 108.02,83.507 C109.938,83.507 111.715,82.27 112.316,80.343 C113.317,77.127 113.969,73.783 114.254,70.402 C114.364,69.081 114.421,67.744 114.421,66.427 C114.421,64.836 114.339,63.265 114.184,61.715 C125.843,61.79 135.308,71.291 135.308,82.968 C135.308,94.69 125.771,104.227 114.048,104.227 M107.199,9.084 C106.89,10.805 106.735,12.56 106.735,14.34 C106.735,30.551 119.923,43.74 136.134,43.74 C138.172,43.74 140.175,43.536 142.129,43.129 C141.821,49.886 139.472,56.245 135.374,61.524 C129.9,56.079 122.361,52.708 114.048,52.708 C113.491,52.708 112.935,52.727 112.379,52.758 C108.046,38.596 97.161,27.273 83.275,22.328 C88.897,14.628 97.569,9.769 107.199,9.084 M151.164,41.6 C151.164,39.844 151.058,38.116 150.848,36.463 C150.668,35.045 149.824,33.796 148.575,33.1 C147.327,32.403 145.821,32.342 144.52,32.935 C141.887,34.132 139.066,34.74 136.134,34.74 C124.886,34.74 115.735,25.589 115.735,14.34 C115.735,11.584 116.269,8.918 117.321,6.415 C117.878,5.094 117.771,3.586 117.033,2.356 C116.296,1.126 115.016,0.321 113.588,0.189 C112.23,0.063 110.876,0 109.564,0 C94.831,0 81.488,7.614 73.973,20.069 C71.894,19.785 69.776,19.626 67.62,19.626 C49.751,19.626 33.443,29.843 25.6,45.798 C10.888,49.649 0,63.053 0,78.956 C0,97.853 15.374,113.227 34.272,113.227 L114.048,113.227 C130.734,113.227 144.308,99.653 144.308,82.968 C144.308,77.925 143.061,73.17 140.869,68.984 C147.526,61.405 151.164,51.811 151.164,41.6" id="Cloud_Moon" fill="#404040"></path>
                        </g>
                    </svg>
                    My Weather
                </div>
                <!-- End: Icon -->

                <!-- Start: Forms -->
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm"> 
                                    <form action="weather/check" method="POST">
                                        @csrf
                                        @method('POST')
                                        <label for="country">Country</label>
                                        <input id="country" type="text" class="@error('country') is-invalid @enderror">
                                        <label for="city">City</label>
                                        <input id="city" type="text" class="@error('city') is-invalid @enderror">
                                        <button>Check Weather</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    DISPLAY WEATHER HERE
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End: Forms -->
            </div>
        </div>
    </body>
</html>