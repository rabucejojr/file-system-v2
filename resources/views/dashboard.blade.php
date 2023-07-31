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
            <div class="container-fluid p-20">
                <div class="row justify-center">
                    <!-- Pie Chart -->
                    <div class="col-xl-8 col-lg-8">
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
            </div>

            {{-- Carousel --}}
            <div class="row p-20">
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
            </div>

            {{-- CARD display for FB Press Release --}}
            <div class="font-sans text-lg text-center">
                {{-- SETUP --}}
                <h1 class="font-bold pt-2 text-xl"> Small Enterprise Technology Upgrading Program </h1>
                <p class="p-2">Boosting SMEs with Tech Innovation: DOST's SETUP for Productivity & Competitiveness</p>
                <div class="flex items-center justify-center p-2 gap-8">
                    {{-- first setup feature --}}
                    @component('components.card', [
                        'location' => '/img/setup1.jpg',
                        'link' => 'https://bit.ly/3rE8Gm9',
                        'title' => '𝐓𝐨𝐧𝐲𝐭𝐬 𝐅𝐨𝐨𝐝 𝐏𝐫𝐨𝐝𝐮𝐜𝐭𝐬 𝐬𝐢𝐠𝐧𝐬 𝐌𝐎𝐀 𝐰𝐢𝐭𝐡 𝐃𝐎𝐒𝐓 𝐟𝐨𝐫 𝐭𝐞𝐜𝐡𝐧𝐨𝐥𝐨𝐠𝐲 𝐭𝐫𝐚𝐧𝐬𝐟𝐨𝐫𝐦𝐚𝐭𝐢𝐨𝐧 𝐚𝐧𝐝 𝐞𝐧𝐡𝐚𝐧𝐜𝐞𝐝 𝐩𝐫𝐨𝐝𝐮𝐜𝐭𝐢𝐯𝐢𝐭𝐲',
                        'program' => '#SETUP',
                    ])
                    @endcomponent
                    {{-- second setup feature --}}
                    @component('components.card', [
                        'location' => '/img/setup2.jpg',
                        'link' => 'https://tinyurl.com/msz2sfx2',
                        'title' => '𝐅𝐄𝐋 𝐁𝐚𝐤𝐞𝐬𝐡𝐨𝐩: 𝐀 𝐒𝐄𝐓𝐔𝐏 𝐒𝐮𝐜𝐜𝐞𝐬𝐬 𝐒𝐭𝐨𝐫𝐲',
                        'program' => '#SETUP',
                    ])
                    @endcomponent
                    {{-- third setup feature --}}
                    @component('components.card', [
                        'location' => '/img/setup3.jpg',
                        'link' => 'https://tinyurl.com/2afm7c7w',
                        'title' => '𝐄𝐱𝐩𝐞𝐫𝐢𝐞𝐧𝐜𝐞 𝐞𝐱𝐜𝐞𝐥𝐥𝐞𝐧𝐜𝐞 𝐢𝐧 𝐜𝐨𝐧𝐬𝐭𝐫𝐮𝐜𝐭𝐢𝐨𝐧 𝐰𝐢𝐭𝐡 𝐆𝐮𝐢𝐧𝐝𝐮𝐥𝐦𝐚𝐧 𝐇𝐨𝐥𝐥𝐨𝐰 𝐁𝐥𝐨𝐜𝐤𝐬 𝐌𝐚𝐧𝐮𝐟𝐚𝐜𝐭𝐮𝐫𝐢𝐧𝐠',
                        'program' => '#SETUP',
                    ])
                    @endcomponent
                </div>
                {{-- End of SETUP --}}
                {{-- GIA --}}
                <h1 class="font-bold pt-10">Grants-in-Aid</h1>
                <p class="p-2">Empowering Filipinos Through Technology: Advancing Productivity and Quality of Life with
                    Innovative Research and Development</p>
                <div class="flex items-center justify-center p-2 gap-8">
                    <div class="flex flex-cols gap-8">
                        {{-- first gia featured --}}
                        @component('components.card', [
                            'location' => '/img/gia1.jpg',
                            'link' => 'https://bit.ly/44VPcb5',
                            'title' => '𝐃𝐎𝐒𝐓 𝐭𝐮𝐫𝐧𝐬
                                                                𝐨𝐯𝐞𝐫 𝐂𝐚𝐬𝐬𝐚𝐯𝐚 𝐏𝐫𝐨𝐜𝐞𝐬𝐬𝐢𝐧𝐠 𝐅𝐚𝐜𝐢𝐥𝐢𝐭𝐲, 𝐬𝐩𝐚𝐫𝐤𝐬
                                                                𝐬𝐨𝐜𝐢𝐨𝐞𝐜𝐨𝐧𝐨𝐦𝐢𝐜 𝐠𝐫𝐨𝐰𝐭𝐡 𝐢𝐧 𝐜𝐨𝐧𝐟𝐥𝐢𝐜𝐭-𝐚𝐟𝐟𝐞𝐜𝐭𝐞𝐝
                                                                𝐜𝐨𝐦𝐦𝐮𝐧𝐢𝐭𝐲',
                            'program' => '#GIA',
                        ])
                        @endcomponent
                        {{-- second gia featured --}}
                        @component('components.card', [
                            'location' => '/img/gia2.jpg',
                            'link' => 'https://bit.ly/44VPcb5',
                            'title' => '𝐃𝐎𝐒𝐓-𝐒𝐃𝐍
                                                                𝐟𝐨𝐫𝐠𝐞𝐬 𝐌𝐎𝐀 𝐰𝐢𝐭𝐡 𝐋𝐆𝐔-𝐌𝐚𝐢𝐧𝐢𝐭 𝐭𝐨 𝐩𝐫𝐨𝐦𝐨𝐭𝐞
                                                                𝐢𝐧𝐝𝐢𝐠𝐞𝐧𝐨𝐮𝐬 𝐝𝐞𝐥𝐢𝐜𝐚𝐜𝐢𝐞𝐬 𝐭𝐡𝐫𝐨𝐮𝐠𝐡 𝐢𝐧𝐧𝐨𝐯𝐚𝐭𝐢𝐯𝐞
                                                                𝐭𝐞𝐜𝐡𝐧𝐨𝐥𝐨𝐠𝐢𝐞𝐬',
                            'program' => '#GIA',
                        ])
                        @endcomponent
                        {{-- third gia featured --}}
                        {{-- vacant entry --}}
                    </div>
                </div>
                {{-- End of GIA --}}
                {{-- Start of RND --}}
                <h1 class="font-bold pt-10">Research, Development and Extension</h1>
                <p class="p-2">Fostering Growth Through Research, Development, and Extension: DOST's Commitment to
                    Advancement</p>
                <div class="flex items-center justify-center p-2 gap-8">
                    {{-- first rnd --}}
                    @component('components.card', [
                        'location' => '/img/dost3.jpg',
                        'link' => 'https://bit.ly/3q2QPF7',
                        'title' => '𝐃𝐎𝐒𝐓 𝐨𝐫𝐠𝐚𝐧𝐢𝐳𝐞𝐬 𝐑𝐞𝐬𝐞𝐚𝐫𝐜𝐡, 𝐃𝐞𝐯𝐞𝐥𝐨𝐩𝐦𝐞𝐧𝐭, 𝐚𝐧𝐝 𝐄𝐱𝐭𝐞𝐧𝐬𝐢𝐨𝐧 𝐂𝐨𝐧𝐬𝐮𝐥𝐭𝐚𝐭𝐢𝐨𝐧 𝐂𝐚𝐫𝐚𝐯𝐚𝐧 𝐚𝐭 𝐒𝐮𝐫𝐢𝐠𝐚𝐨 𝐝𝐞𝐥 𝐍𝐨𝐫𝐭𝐞 𝐒𝐭𝐚𝐭𝐞 𝐔𝐧𝐢𝐯𝐞𝐫𝐬𝐢𝐭𝐲',
                        'program' => '#R%D',
                    ])
                    @endcomponent
                    {{-- second rnd --}}
                    @component('components.card', [
                        'location' => '/img/rnd1.jpg',
                        'link' => 'https://tinyurl.com/yc3byxek',
                        'title' => '𝐃𝐎𝐒𝐓-𝐒𝐃𝐍 𝐣𝐨𝐢𝐧𝐬 𝐭𝐡𝐞 𝐈𝐧𝐭𝐞𝐫𝐧𝐚𝐭𝐢𝐨𝐧𝐚𝐥 𝐒𝐦𝐚𝐫𝐭 𝐂𝐢𝐭𝐲 𝐄𝐱𝐩𝐨𝐬𝐢𝐭𝐢𝐨𝐧 𝐚𝐧𝐝 𝐍𝐞𝐭𝐰𝐨𝐫𝐤𝐢𝐧𝐠 𝐄𝐧𝐠𝐚𝐠𝐞𝐦𝐞𝐧𝐭 𝟐𝟎𝟐𝟑 (𝐢𝐒𝐂𝐄𝐍𝐄)',
                        'program' => '#R%D',
                    ])
                    @endcomponent
                </div>
                {{-- End of RND --}}
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
    </div>
@endsection
