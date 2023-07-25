@extends('partials.app')
@section('content')
    <div id="content-wrapper" class="gradient-custom-3">

        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav
                class="relative flex flex-wrap items-center content-between py-3 px-2 flex-no-wrap content-start text-black bg-white topbar mb-2 static-top shadow flex justify-end">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="h-50 d-flex justify-content-end">
                    <x-app-layout>
                    </x-app-layout>
                </div>
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->

            {{-- Chart --}}
            {{-- <div class="container-fluid">
                <div class="row">
                    <!-- Pie Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">PRIORITY SECTORS</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="myPieChart" width="315" height="220"
                                        style="display: block; height: 245px; width: 351px;"
                                        class="chartjs-render-monitor"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-primary"></i> SETUP
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> GIA
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-info"></i> OTHERS
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- Carousel --}}
            {{-- <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="3000">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExample" data-slide-to="1"></li>
                            <li data-target="#carouselExample" data-slide-to="2"></li>
                            <li data-target="#carouselExample" data-slide-to="3"></li>
                            <li data-target="#carouselExample" data-slide-to="4"></li>
                            <li data-target="#carouselExample" data-slide-to="5"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/img/dost.png" width="450px" class="d-block mx-auto" alt="Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/dost1.jpg" width="450px" class="d-block mx-auto" alt="Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/dost2.jpg" width="450px" class="d-block mx-auto" alt="Image 3">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/dost3.jpg" width="450px" class="d-block mx-auto" alt="Image 4">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/dost4.jpg" width="450px" class="d-block mx-auto" alt="Image 5">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/dost5.jpg" width="450px" class="d-block mx-auto" alt="Image 6">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div> --}}

            {{-- CARD display for FB Press Release --}}

            
            <div class="font-sans text-lg text-center">
                {{-- SETUP --}}
                <h1 class="font-bold p-2"> Small Enterprise Technology Upgrading Program </h1>
                <p class="p-2">Boosting SMEs with Tech Innovation: DOST's SETUP for Productivity & Competitiveness</p>
                <div class="flex items-center justify-center p-2">
                    <div class="flex flex-cols gap-8">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                            <img class="w-auto h-90 object-cover" src="/img/dost2.jpg" alt="Card Image">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">
                                    <a href="https://bit.ly/3rE8Gm9" target="_blank"> 𝐓𝐨𝐧𝐲𝐭𝐬 𝐅𝐨𝐨𝐝 𝐏𝐫𝐨𝐝𝐮𝐜𝐭𝐬
                                        𝐬𝐢𝐠𝐧𝐬 𝐌𝐎𝐀 𝐰𝐢𝐭𝐡 𝐃𝐎𝐒𝐓 𝐟𝐨𝐫 𝐭𝐞𝐜𝐡𝐧𝐨𝐥𝐨𝐠𝐲
                                        𝐭𝐫𝐚𝐧𝐬𝐟𝐨𝐫𝐦𝐚𝐭𝐢𝐨𝐧 𝐚𝐧𝐝 𝐞𝐧𝐡𝐚𝐧𝐜𝐞𝐝 𝐩𝐫𝐨𝐝𝐮𝐜𝐭𝐢𝐯𝐢𝐭𝐲</a>
                                </div>
                                <p
                                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                    #OneDOST4U
                                </p>
                                <p
                                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                    #SETUP
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End of SETUP --}}
                {{-- GIA --}}
                <h1 class="font-bold p-2">Grants-in-Aid</h1>
                <p class="p-2">Empowering Filipinos Through Technology: Advancing Productivity and Quality of Life with
                    Innovative Research and Development</p>
                <div class="flex items-center justify-center p-2">
                    <div class="flex flex-cols gap-8">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                            <img class="w-auto h-90 object-cover" src="/img/dost4.jpg" alt="Card Image">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2"><a href="https://bit.ly/44VPcb5">𝐃𝐎𝐒𝐓-𝐒𝐃𝐍
                                        𝐦𝐨𝐧𝐢𝐭𝐨𝐫𝐬 𝐌𝐏𝐄𝐗 𝐜𝐥𝐢𝐞𝐧𝐭𝐬, 𝐬𝐞𝐞𝐬 𝐬𝐢𝐠𝐧𝐢𝐟𝐢𝐜𝐚𝐧𝐭
                                        𝐢𝐦𝐩𝐫𝐨𝐯𝐞𝐦𝐞𝐧𝐭𝐬</a></div>
                                <p
                                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                    #MPEX
                                </p>
                                <p
                                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                    #ConsultancyService
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End of GIA --}}
                {{-- Consultancy --}}
                <h1 class="font-bold">Research, Development and Extension</h1>
                <p class="p-2">Fostering Growth Through Research, Development, and Extension: DOST's Commitment to
                    Advancement</p>
                <div class="flex items-center justify-center p-2">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                        <img class="w-auto h-90 object-cover" src="/img/dost3.jpg" alt="Card Image">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2"><a href="https://bit.ly/3q2QPF7" target="_blank">𝐃𝐎𝐒𝐓
                                    𝐨𝐫𝐠𝐚𝐧𝐢𝐳𝐞𝐬
                                    𝐑𝐞𝐬𝐞𝐚𝐫𝐜𝐡, 𝐃𝐞𝐯𝐞𝐥𝐨𝐩𝐦𝐞𝐧𝐭, 𝐚𝐧𝐝 𝐄𝐱𝐭𝐞𝐧𝐬𝐢𝐨𝐧
                                    𝐂𝐨𝐧𝐬𝐮𝐥𝐭𝐚𝐭𝐢𝐨𝐧 𝐂𝐚𝐫𝐚𝐯𝐚𝐧 𝐚𝐭 𝐒𝐮𝐫𝐢𝐠𝐚𝐨 𝐝𝐞𝐥 𝐍𝐨𝐫𝐭𝐞
                                    𝐒𝐭𝐚𝐭𝐞
                                    𝐔𝐧𝐢𝐯𝐞𝐫𝐬𝐢𝐭𝐲</a></div>
                            <p
                                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                #DOSTCaraga</p>
                            <p
                                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                #SNSU</p>
                        </div>
                    </div>
                </div>
                {{-- End of Consultancy --}}
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
    </div>
@endsection
