{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>





     <!-- Scripts -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100  overflow-scroll flex ">
    <!-- Sidebar -->
    <div class=" bg-gray-900 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
        <!-- Logo and name -->
        <a href="#" class="text-white  flex items-center space-x-2 px-4">
            <span class="text-2xl font-bold">Vuexy</span>
        </a>
        <!-- Nav -->
        <nav class="">
            <a href="#" class=" py-2.5 px-4 rounded transition duration-200 hover:bg-white hover:text-gray-700 font-bold flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
                Dashboard
            </a>
            <a href="#" class=" py-2.5 px-4 rounded transition duration-200 hover:bg-white hover:text-gray-700 font-bold flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/></svg>
                Academy
            </a>
            <a href="#" class=" py-2.5 px-4 rounded transition duration-200 hover:bg-white hover:text-gray-700 font-bold flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                Email
            </a>

            <hr class=" mx-6 mt-6">
            <!-- more links -->
        </nav>
    </div>

    <!-- Content -->
    <div class="flex flex-col flex-1 ">
        <!-- Header -->
        <div class="bg-white shadow p-4 flex gap-4 items-center">
            <div class="min-w-0">
                <h1 class="text-lg text-gray-900 font-bold">Dashboard</h1>
            </div>
            <label class=" flex gap-2 items-center flex-1 shadow-lg rounded-lg p-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                <input type="text" placeholder="search" class="flex-1 border-0 focus:outline-none focus:ring-0">
            </label>
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

        </div>

        <!-- Main content -->
        <div class="p-4 h-full">
            <div class="grid grid-cols-2 gap-4 ">
                <!-- Cards for statistics -->
                <div id="areachart" class="bg-white p-4 shadow rounded-lg">
                </div>

                <div class="bg-white p-4 shadow rounded-lg">
                    <h2 class="font-bold text-lg">Sales</h2>
                    <p class="text-xl">42.5k</p>
                    <span class="text-green-500">+18.2%</span>
                    <div id="radilchart"></div>
                </div>
                <div class="bg-white p-4 shadow rounded-lg" id="chartjs">
                </div>

                <div class="bg-white p-4 shadow rounded-lg" id="chart33">
                </div>

                <!-- More cards -->
            </div>
        </div>
    </div>
    <script>
        var options = {
        series: [{
            name: 'Sales',
            data: [31, 40, 28, 51, 42, 109, 100]
        }],
        chart: {
            type: 'area',
            height: 350,
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        title: {
            text: 'Product Sales by Month',
            align: 'left'
        },
        grid: {
            show: false,
            row: {
                show: false, // highlights the x-axis grid lines
                colors: ['#f3f3f3', 'transparent'], // alternates grid row color
                opacity: 0.5
            },
            column: {
                colors: ['#fbfbfb', 'transparent'], // alternates grid column color
            },
            borderColor: '#e7e7e7', // grid border color
            xaxis: {
                lines: {
                    show: false // highlights the x-axis grid lines
                }
            },
            yaxis: {
                lines: {
                    show: false // highlights the y-axis grid lines
                }
            }
        },
        xaxis: {
            show: false,
            categories:[] ,
            axisBorder: {
                show: false,
                color: '#78909C',
                height: 1,
                width: '100%',
                offsetX: 0,
                offsetY: 0
            },
            axisTicks: {
                show: false,
                borderType: 'solid',
                color: '#78909C',
                width: 6,
                offsetX: 0,
                offsetY: 0
            },
            labels:{
                show: false
            }
        },
        yaxis: {
            // opposite: true
            label: {
                show: false
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        }
    };
    console.log(document.getElementById("areachart"));
    var chart = new ApexCharts(document.getElementById("areachart") , options);
    chart.render();





var options = {
    chart: {
    height: 280,
    type: "radialBar"
  },

  series: [67],

  plotOptions: {
    radialBar: {
      hollow: {
        margin: 15,
        size: "70%"
      },

      dataLabels: {
        showOn: "always",
        name: {
          offsetY: -10,
          show: true,
          color: "#888",
          fontSize: "13px"
        },
        value: {
          color: "#111",
          fontSize: "30px",
          show: true
        }
      }
    }
  },

  stroke: {
    lineCap: "round",
  },
  labels: ["Progress"]
};

var chart = new ApexCharts(document.querySelector("#radilchart"), options);
chart.render();







var options = {
          series: [{
          name: 'TEAM A',
          type: 'column',
          data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
        }, {
          name: 'TEAM B',
          type: 'area',
          data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
        }, {
          name: 'TEAM C',
          type: 'line',
          data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
        }],
          chart: {
          height: 350,
          type: 'line',
          stacked: false,
        },
        stroke: {
          width: [0, 2, 5],
          curve: 'smooth'
        },
        plotOptions: {
          bar: {
            columnWidth: '50%'
          }
        },

        fill: {
          opacity: [0.85, 0.25, 1],
          gradient: {
            inverseColors: false,
            shade: 'light',
            type: "vertical",
            opacityFrom: 0.85,
            opacityTo: 0.55,
            stops: [0, 100, 100, 100]
          }
        },
        labels: ['01/01/2003', '02/01/2003', '03/01/2003', '04/01/2003', '05/01/2003', '06/01/2003', '07/01/2003',
          '08/01/2003', '09/01/2003', '10/01/2003', '11/01/2003'
        ],
        markers: {
          size: 0
        },
        xaxis: {
          type: 'datetime'
        },
        yaxis: {
          title: {
            text: 'Points',
          },
          min: 0
        },
        tooltip: {
          shared: true,
          intersect: false,
          y: {
            formatter: function (y) {
              if (typeof y !== "undefined") {
                return y.toFixed(0) + " points";
              }
              return y;

            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart33"), options);
        chart.render();


        var options = {
          series: [
          {
            data: [
              {
                x: 'Code',
                y: [
                  new Date('2019-03-02').getTime(),
                  new Date('2019-03-04').getTime()
                ]
              },
              {
                x: 'Test',
                y: [
                  new Date('2019-03-04').getTime(),
                  new Date('2019-03-08').getTime()
                ]
              },
              {
                x: 'Validation',
                y: [
                  new Date('2019-03-08').getTime(),
                  new Date('2019-03-12').getTime()
                ]
              },
              {
                x: 'Deployment',
                y: [
                  new Date('2019-03-12').getTime(),
                  new Date('2019-03-18').getTime()
                ]
              }
            ]
          }
        ],
          chart: {
          height: 350,
          type: 'rangeBar'
        },
        plotOptions: {
          bar: {
            horizontal: true
          }
        },
        xaxis: {
          type: 'datetime'
        }
        };

        var chart = new ApexCharts(document.querySelector("#chartjs"), options);
        chart.render();

    </script>
</body>
</html>
