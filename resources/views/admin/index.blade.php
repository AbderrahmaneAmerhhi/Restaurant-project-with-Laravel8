@extends('layout.sidebar')

@section('content')
<!-- Page Content -->
            <!-- Cardsfor statistics -->
            <div class="CardBox">
                <div class="Card">
                    <div>
                        <div class="numbers">{{$usersCount}}</div>
                        <div class="CardName">Customers</div>
                    </div>
                    <div class="iconBox"><ion-icon name="person"></ion-icon></div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">{{$sales}}</div>
                        <div class="CardName">Sales</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="basket"></ion-icon>
                    </div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">{{$reviews}}</div>
                        <div class="CardName">Reviews</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="chatbubbles"></ion-icon>
                    </div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">{{$Earning}}DH</div>
                        <div class="CardName">Earning</div>
                    </div>
                    <div class="iconBox">
                          <ion-icon name="cash"></ion-icon>
                    </div>
                </div>
            </div>
            {{-- Page content  --}}
            {{-- Google charts script  --}}
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <div class="statistics-container">
                <div class="row">
                    <div class="Pie-Chart ">
                        {{-- char 3D Pie Chart fih menu ototal bach tba3o --}}
                        <script  type="text/javascript">
                            let SalesByMenus =  {{ Js::from($SalesByMenus) }};
                                    google.charts.load("current", {packages:["corechart"]});
                                google.charts.setOnLoadCallback(drawChart);
                                function drawChart() {

                            var data = new google.visualization.DataTable();
                            data.addColumn('string', 'Task');
                            data.addColumn('number', 'Hours per Day');
                            for(var i=0;i<SalesByMenus.length;i++){
                                //         [SalesByMenus[i]['menu_name'],SalesByMenus[i]['total_quantity']],
                             data.addRows([
                            [SalesByMenus[i]['menu_name'], Number(SalesByMenus[i]['total_quantity'])],
                            ]);
                            }
                            var options = {
                            title: 'Total sales by Menus',
                                is3D: true,
                                };

                                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                            chart.draw(data, options);
                              }

                        </script>

                            <div id="piechart_3d" ></div>
                    </div>
                    <div class="table-responsive">
                    <div class="Top-X-charts">
                        <script type="text/javascript">
                        // data dyal chhal mn order kan f kola date
                            let OrdersCountByDate =  {{ Js::from($OrdersCountByDate) }};
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawStuff);

                        function drawStuff() {


                            var data = new google.visualization.DataTable();
                            data.addColumn('string', 'date');
                            data.addColumn('number', 'Number of sales');
                            for(var i=0;i<OrdersCountByDate.length;i++){
                             data.addRows([
                             [OrdersCountByDate[i]['month_year'], Number(OrdersCountByDate[i]['CountOrder'])],
                            ]);
                            }

                            var options = {
                            width: 800,
                            legend: { position: 'none' },
                            chart: {
                                title: 'Sales development chart',
                                subtitle: 'The number of sales by Date' },
                            axes: {
                                x: {
                                0: { side: 'top', label: 'Orders By Date'} // Top x-axis.
                                }
                            },
                            bar: { groupWidth: "90%" }
                            };

                            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                            // Convert the Classic options to Material options.
                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        };

                        </script>

                            <div id="top_x_div" ></div>


                    </div>
                    </div>
                </div>
            </div>
{{-- {{$OrdersCountByDate}} --}}

@endsection

@section('script')


@endsection
