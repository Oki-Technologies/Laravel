<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
        <meta content="{{ csrf_token() }}" name="csrf-token" />

        <title>
            {!! empty($title) ? '' : $title . ' &middot; ' !!}{!! tenant('name') ?? config('app.name', 'Laravel') !!}
        </title>

        <!-- SEO Meta Tags-->
        <meta content="{{ $description ?? '' }}" name="description" />
        <meta content="{{ $keywords ?? '' }}" name="keywords" />
        <meta content="{{ $author ?? '' }}" name="author" />

        <link href="{{ $canonical ?? request()->fullUrl() }}" rel="canonical" />

        <!-- Favicon & Touch Icons-->
        <link href="{{ asset('favicon.png') }}" rel="shortcut icon" />
        <link href="{{ asset('apple-touch-icon.png') }}" rel="apple-touch-icon" sizes="180x180" />
        <link href="{{ asset('favicon-32x32.png') }}" rel="icon" sizes="32x32" type="image/png" />
        <link href="{{ asset('favicon-16x16.png') }}" rel="icon" sizes="16x16" type="image/png" />
        <link href="{{ asset('site.webmanifest') }}" rel="manifest" />
        <link color="#fe6a6a" href="{{ asset('safari-pinned-tab.svg') }}" rel="mask-icon" />
        <meta content="#ffffff" name="msapplication-TileColor" />
        <meta content="#ffffff" name="theme-color" />

        @stack('css.top')

        <!-- Styles -->
        {{-- @vite('resources/css/app.css') --}}

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link href="{{ asset('assets/office') }}/css/vendor.min.css" rel="stylesheet">

        <!-- CSS Front Template -->
        <link href="{{ asset('assets/office') }}/css/theme.minc619.css?v=1.0" rel="stylesheet">

        <link as="style" data-hs-appearance="default" href="{{ asset('assets/office') }}/css/theme.min.css"
            rel="preload">
        <link as="style" data-hs-appearance="dark" href="{{ asset('assets/office') }}/css/theme-dark.min.css"
            rel="preload">

        <style data-hs-appearance-onload-styles>
            /*
        * {
            transition: unset !important;
        }

        body {
            opacity: 0;
        }
        */
        </style>

        {{-- dev --}}
        <style>
            /*
        body {
            opacity: 0;
        }
        */
        </style>

        @stack('css')

        <!-- Google Tag Manager -->
        <script>
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-WK4XGX2W');
        </script>
        <!-- End Google Tag Manager -->

        <script>
            window.hs_config = {
                "autopath": "@@autopath",
                "deleteLine": "hs-builder:delete",
                "deleteLine:build": "hs-builder:build-delete",
                "deleteLine:dist": "hs-builder:dist-delete",
                "previewMode": false,
                "startPath": "/",
                "vars": {
                    "themeFont": "https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap",
                    "version": "?v=1.0"
                },
                "layoutBuilder": {
                    "extend": {
                        "switcherSupport": true
                    },
                    "header": {
                        "layoutMode": "default",
                        "containerMode": "container-fluid"
                    },
                    "sidebarLayout": "default"
                },
                "themeAppearance": {
                    "layoutSkin": "default",
                    "sidebarSkin": "default",
                    "styles": {
                        "colors": {
                            "primary": "#377dff",
                            "transparent": "transparent",
                            "white": "#fff",
                            "dark": "132144",
                            "gray": {
                                "100": "#f9fafc",
                                "900": "#1e2022"
                            }
                        },
                        "font": "Inter"
                    }
                },
                "languageDirection": {
                    "lang": "en"
                },
                "skipFilesFromBundle": {
                    "dist": ["assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js",
                        "assets/js/demo.js"
                    ],
                    "build": ["assets/css/theme.css",
                        "assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js",
                        "assets/js/demo.js", "assets/css/theme-dark.html", "assets/css/docs.css",
                        "assets/vendor/icon-set/style.html", "assets/js/hs.theme-appearance.js",
                        "assets/js/hs.theme-appearance-charts.js",
                        "node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.html",
                        "assets/js/demo.js"
                    ]
                },
                "minifyCSSFiles": ["assets/css/theme.css", "assets/css/theme-dark.css"],
                "copyDependencies": {
                    "dist": {
                        "*assets/js/theme-custom.js": ""
                    },
                    "build": {
                        "*assets/js/theme-custom.js": "",
                        "node_modules/bootstrap-icons/font/*fonts/**": "assets/css"
                    }
                },
                "buildFolder": "",
                "replacePathsToCDN": {},
                "directoryNames": {
                    "src": "./src",
                    "dist": "./dist",
                    "build": "./build"
                },
                "fileNames": {
                    "dist": {
                        "js": "theme.min.js",
                        "css": "theme.min.css"
                    },
                    "build": {
                        "css": "theme.min.css",
                        "js": "theme.min.js",
                        "vendorCSS": "vendor.min.css",
                        "vendorJS": "vendor.min.js"
                    }
                },
                "fileTypes": "jpg|png|svg|mp4|webm|ogv|json"
            }
            window.hs_config.gulpRGBA = (p1) => {
                const options = p1.split(',')
                const hex = options[0].toString()
                const transparent = options[1].toString()

                var c;
                if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
                    c = hex.substring(1).split('');
                    if (c.length == 3) {
                        c = [c[0], c[0], c[1], c[1], c[2], c[2]];
                    }
                    c = '0x' + c.join('');
                    return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + ',' + transparent + ')';
                }
                throw new Error('Bad Hex');
            }
            window.hs_config.gulpDarken = (p1) => {
                const options = p1.split(',')

                let col = options[0].toString()
                let amt = -parseInt(options[1])
                var usePound = false

                if (col[0] == "#") {
                    col = col.slice(1)
                    usePound = true
                }
                var num = parseInt(col, 16)
                var r = (num >> 16) + amt
                if (r > 255) {
                    r = 255
                } else if (r < 0) {
                    r = 0
                }
                var b = ((num >> 8) & 0x00FF) + amt
                if (b > 255) {
                    b = 255
                } else if (b < 0) {
                    b = 0
                }
                var g = (num & 0x0000FF) + amt
                if (g > 255) {
                    g = 255
                } else if (g < 0) {
                    g = 0
                }
                return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
            }
            window.hs_config.gulpLighten = (p1) => {
                const options = p1.split(',')

                let col = options[0].toString()
                let amt = parseInt(options[1])
                var usePound = false

                if (col[0] == "#") {
                    col = col.slice(1)
                    usePound = true
                }
                var num = parseInt(col, 16)
                var r = (num >> 16) + amt
                if (r > 255) {
                    r = 255
                } else if (r < 0) {
                    r = 0
                }
                var b = ((num >> 8) & 0x00FF) + amt
                if (b > 255) {
                    b = 255
                } else if (b < 0) {
                    b = 0
                }
                var g = (num & 0x0000FF) + amt
                if (g > 255) {
                    g = 255
                } else if (g < 0) {
                    g = 0
                }
                return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
            }
        </script>

        @stack('head.js')
    </head>

    <body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl footer-offset">
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe height="0" src="https://www.googletagmanager.com/ns.html?id=GTM-WK4XGX2W"
                style="display:none;visibility:hidden" width="0"></iframe>
        </noscript>

        <script src="{{ asset('assets/office') }}/js/hs.theme-appearance.js"></script>
        <script src="{{ asset('assets/office') }}/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js">
        </script>

        <x-office.header />

        <x-office.sidebar />

        <main class="main" id="content" role="main">
            <div class="content container-fluid">
                @if (isset($header) or isset($submenu))
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h1 class="page-header-title">{{ $header ?? '' }}</h1>
                            </div>

                            <div class="col-auto">
                                {!! $submenu ?? '' !!}
                            </div>
                        </div>
                    </div>
                @endif

                {{ $slot }}
            </div>
        </main>

        <!-- Modals -->
        @stack('modals')
        <x-office.activities />

        <!-- Scripts -->
        @vite('resources/js/app.js')

        <!-- JS Implementing Plugins -->
        <script src="{{ asset('assets/office') }}/js/vendor.min.js"></script>
        <script src="{{ asset('assets/office') }}/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js">
        </script>

        <!-- JS Front -->
        <script src="{{ asset('assets/office') }}/js/theme.min.js"></script>
        <script src="{{ asset('assets/office') }}/js/hs.theme-appearance-charts.js"></script>

        <!-- JS Plugins Init. -->
        <script>
            $(document).on('ready', function() {
                // INITIALIZATION OF DATERANGEPICKER
                // =======================================================
                $('.js-daterangepicker').daterangepicker();

                $('.js-daterangepicker-times').daterangepicker({
                    timePicker: true,
                    startDate: moment().startOf('hour'),
                    endDate: moment().startOf('hour').add(32, 'hour'),
                    locale: {
                        format: 'M/DD hh:mm A'
                    }
                });

                var start = moment();
                var end = moment();

                function cb(start, end) {
                    $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format(
                        'MMM D') + ' - ' + end.format('MMM D, YYYY'));
                }

                $('#js-daterangepicker-predefined').daterangepicker({
                    startDate: start,
                    endDate: end,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    }
                }, cb);

                cb(start, end);
            });


            // INITIALIZATION OF DATATABLES
            // =======================================================
            HSCore.components.HSDatatables.init($('#datatable'), {
                select: {
                    style: 'multi',
                    selector: 'td:first-child input[type="checkbox"]',
                    classMap: {
                        checkAll: '#datatableCheckAll',
                        counter: '#datatableCounter',
                        counterInfo: '#datatableCounterInfo'
                    }
                },
                language: {
                    zeroRecords: `<div class="text-center p-4">
              <img class="mb-3" src="./assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="./assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
            <p class="mb-0">No data to show</p>
            </div>`
                }
            });

            const datatable = HSCore.components.HSDatatables.getItem(0)

            document.querySelectorAll('.js-datatable-filter').forEach(function(item) {
                item.addEventListener('change', function(e) {
                    const elVal = e.target.value,
                        targetColumnIndex = e.target.getAttribute('data-target-column-index'),
                        targetTable = e.target.getAttribute('data-target-table');

                    HSCore.components.HSDatatables.getItem(targetTable).column(targetColumnIndex).search(
                        elVal !== 'null' ? elVal : '').draw()
                })
            })
        </script>

        <!-- JS Plugins Init. -->
        <script>
            (function() {
                localStorage.removeItem('hs_theme')

                window.onload = function() {


                    // INITIALIZATION OF NAVBAR VERTICAL ASIDE
                    // =======================================================
                    new HSSideNav('.js-navbar-vertical-aside').init()


                    // INITIALIZATION OF FORM SEARCH
                    // =======================================================
                    const HSFormSearchInstance = new HSFormSearch('.js-form-search')

                    if (HSFormSearchInstance.collection.length) {
                        HSFormSearchInstance.getItem(1).on('close', function(el) {
                            el.classList.remove('top-0')
                        })

                        document.querySelector('.js-form-search-mobile-toggle').addEventListener('click', e => {
                            let dataOptions = JSON.parse(e.currentTarget.getAttribute(
                                    'data-hs-form-search-options')),
                                $menu = document.querySelector(dataOptions.dropMenuElement)

                            $menu.classList.add('top-0')
                            $menu.style.left = 0
                        })
                    }


                    // INITIALIZATION OF BOOTSTRAP DROPDOWN
                    // =======================================================
                    HSBsDropdown.init()


                    // INITIALIZATION OF CHARTJS
                    // =======================================================
                    HSCore.components.HSChartJS.init('.js-chart')


                    // INITIALIZATION OF CHARTJS
                    // =======================================================
                    HSCore.components.HSChartJS.init('#updatingBarChart')
                    const updatingBarChart = HSCore.components.HSChartJS.getItem('updatingBarChart')

                    // Call when tab is clicked
                    document.querySelectorAll('[data-bs-toggle="chart-bar"]').forEach(item => {
                        item.addEventListener('click', e => {
                            let keyDataset = e.currentTarget.getAttribute('data-datasets')

                            const styles = HSCore.components.HSChartJS.getTheme('updatingBarChart',
                                HSThemeAppearance.getAppearance())

                            if (keyDataset === 'lastWeek') {
                                updatingBarChart.data.labels = ["Apr 22", "Apr 23", "Apr 24", "Apr 25",
                                    "Apr 26", "Apr 27", "Apr 28", "Apr 29", "Apr 30", "Apr 31"
                                ];
                                updatingBarChart.data.datasets = [{
                                        "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320],
                                        "backgroundColor": styles.data.datasets[0].backgroundColor,
                                        "hoverBackgroundColor": styles.data.datasets[0]
                                            .hoverBackgroundColor,
                                        "borderColor": styles.data.datasets[0].borderColor,
                                        "maxBarThickness": 10
                                    },
                                    {
                                        "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245,
                                            110
                                        ],
                                        "backgroundColor": styles.data.datasets[1].backgroundColor,
                                        "borderColor": styles.data.datasets[1].borderColor,
                                        "maxBarThickness": 10
                                    }
                                ];
                                updatingBarChart.update();
                            } else {
                                updatingBarChart.data.labels = ["May 1", "May 2", "May 3", "May 4",
                                    "May 5", "May 6", "May 7", "May 8", "May 9", "May 10"
                                ];
                                updatingBarChart.data.datasets = [{
                                        "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
                                        "backgroundColor": styles.data.datasets[0].backgroundColor,
                                        "hoverBackgroundColor": styles.data.datasets[0]
                                            .hoverBackgroundColor,
                                        "borderColor": styles.data.datasets[0].borderColor,
                                        "maxBarThickness": 10
                                    },
                                    {
                                        "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225,
                                            120
                                        ],
                                        "backgroundColor": styles.data.datasets[1].backgroundColor,
                                        "borderColor": styles.data.datasets[1].borderColor,
                                        "maxBarThickness": 10
                                    }
                                ]
                                updatingBarChart.update();
                            }
                        })
                    })


                    // INITIALIZATION OF CHARTJS
                    // =======================================================
                    HSCore.components.HSChartJS.init('.js-chart-datalabels', {
                        plugins: [ChartDataLabels],
                        options: {
                            plugins: {
                                datalabels: {
                                    anchor: function(context) {
                                        var value = context.dataset.data[context.dataIndex];
                                        return value.r < 20 ? 'end' : 'center';
                                    },
                                    align: function(context) {
                                        var value = context.dataset.data[context.dataIndex];
                                        return value.r < 20 ? 'end' : 'center';
                                    },
                                    color: function(context) {
                                        var value = context.dataset.data[context.dataIndex];
                                        return value.r < 20 ? context.dataset.backgroundColor : context
                                            .dataset.color;
                                    },
                                    font: function(context) {
                                        var value = context.dataset.data[context.dataIndex],
                                            fontSize = 25;

                                        if (value.r > 50) {
                                            fontSize = 35;
                                        }

                                        if (value.r > 70) {
                                            fontSize = 55;
                                        }

                                        return {
                                            weight: 'lighter',
                                            size: fontSize
                                        };
                                    },
                                    formatter: function(value) {
                                        return value.r
                                    },
                                    offset: 2,
                                    padding: 0
                                }
                            },
                        }
                    })

                    // INITIALIZATION OF SELECT
                    // =======================================================
                    HSCore.components.HSTomSelect.init('.js-select')


                    // INITIALIZATION OF CLIPBOARD
                    // =======================================================
                    HSCore.components.HSClipboard.init('.js-clipboard')
                }
            })()
        </script>

        <!-- Style Switcher JS -->
        <script>
            (function() {
                // STYLE SWITCHER
                // =======================================================
                const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
                const $variants = document.querySelectorAll(
                    `[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

                // Function to set active style in the dorpdown menu and set icon for dropdown trigger
                const setActiveStyle = function() {
                    $variants.forEach($item => {
                        if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
                            $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
                            return $item.classList.add('active')
                        }

                        $item.classList.remove('active')
                    })
                }

                // Add a click event to all items of the dropdown to set the style
                $variants.forEach(function($item) {
                    $item.addEventListener('click', function() {
                        HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
                    })
                })

                // Call the setActiveStyle on load page
                setActiveStyle()

                // Add event listener on change style to call the setActiveStyle function
                window.addEventListener('on-hs-appearance-change', function() {
                    setActiveStyle()
                })
            })()
        </script>

        <!-- Pushed Scripts -->
        @stack('js')
    </body>

</html>
