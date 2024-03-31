<?php 

$data = array($title , $nav_active);

$this->extend("layout/template.php", $data);

$this->section('content');

?><div class="mt-5">
    <!-- < !-- inner section -->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="row m-auto">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize fw-bold">Jumlah SPK Aktif</p>
                                <h5 class="text-dark poppins-bold mb-0">50 </h5>
                            </div>
                        </div>
                        <div class="col-4 d-lg-block d-flex my-auto justify-content-end text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md"><i
                                    class='fs-4 bx bxs-briefcase-alt-2'></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="row m-auto">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah SPK Selesai</p>
                                <h5 class="text-dark poppins-bold mb-0">20</h5>
                            </div>
                        </div>
                        <div class="col-4 d-lg-block d-flex my-auto justify-content-end text-end">
                            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md"><i
                                    class='fs-4 bx bxs-badge-check'></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="row m-auto">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Progress <br>Order</p>
                                <h5 class="text-dark poppins-bold mb-0">30</h5>
                            </div>
                        </div>
                        <div class="col-4 d-lg-block d-flex my-auto justify-content-end text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"><i
                                    class='fs-4 bx bxs-pie-chart'></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="row m-auto">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Proses Keseluruhan</p>
                                <h5 class="text-dark poppins-bold mb-0">100 </h5>
                            </div>
                        </div>
                        <div class="col-4 d-lg-block d-flex my-auto justify-content-end text-end">
                            <div class="icon icon-shape bg-gradient-secondary shadow text-center border-radius-md">
                                <i class='fs-4 bx bxs-hard-hat'></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-7">
            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <div class="my-auto text-start d-flex">
                        <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                            <i class='fs-4 bx bxs-bar-chart-alt-2'></i>
                        </div>
                        <h6 class="text-dark d-flex ms-3 my-auto poppins-bold">Jumlah Jam Permesinan</h6>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="chart"><canvas id="chart-line" class="chart-canvas" height="300"></canvas></div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 mt-4 mt-lg-0">
            <div class="card h-100 z-index-2">
                <div class="card-header mb-3 pb-0">
                    <div class="my-auto text-start d-flex">
                        <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                        <i class='fs-4 bx bxs-calendar'></i>
                        </div>
                        <h6 class="text-dark d-flex ms-3 my-auto poppins-bold">Calendar</h6>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <iframe
                        src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=Asia%2FJakarta&bgcolor=%23ffffff&title=%20&showTabs=0&src=cmFjaG1hdC5zeWFpZnVsQG1ocy5wb2xtYW4tYmFuZHVuZy5hYy5pZA&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=bWhzLnBvbG1hbi1iYW5kdW5nLmFjLmlkX2NsYXNzcm9vbWZiOThmMDExQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&src=Y19jbGFzc3Jvb203N2ExZjhmY0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb20wYWQ3NjY0ZEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb204Yzk4N2Q2N0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=aWQuaW5kb25lc2lhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&src=Y19jbGFzc3Jvb21kZmIwN2QzNkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb205YTQ2YzAxZEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%23039BE5&color=%2333B679&color=%23007b83&color=%23202124&color=%23c26401&color=%23137333&color=%230B8043&color=%23007b83&color=%23007b83"
                        style="border-width:0" width="100%" height="270px" frameborder="0" scrolling="no"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- < !-- inner section end here -->
</div>
<script src="/assets/js/plugins/chartjs.min.js"></script>
<script>
    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {

            type: "line",
            data: {

                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Jam Permesinan",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#cb0c9f",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6
                    }

                    ,
                ],
            }

            ,
            options: {

                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                }

                ,
                interaction: {
                    intersect: false,
                    mode: 'index',
                }

                ,
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        }

                        ,
                        ticks: {

                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Quicksand",
                                style: 'normal',
                                lineHeight: 2
                            }

                            ,
                        }
                    }

                    ,
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        }

                        ,
                        ticks: {

                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Quicksand",
                                style: 'normal',
                                lineHeight: 2
                            }

                            ,
                        }
                    }

                    ,
                }

                ,
            }

            ,
        }

    );
</script>

<?=$this->endSection();?>