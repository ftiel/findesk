@extends('layouts.admin-layout')

@section('admin-content')
    <form action="">
        {{ csrf_field() }}
        <div class="reports-container">
            <div class="form-group">
                <div class="left">
                    <label for="">Service Category</label>
                    <select name="reportCategory" id="reportCategory" required>
                        <option value="all">All</option>
                        @foreach($categories as $key => $category)
                            <option value="{{ $category->id }}">{{ $category->CategoryDescription }}</option>
                        @endforeach
                    </select>
                    <label for="">Ticket Status</label>
                    <select name="reportStatus" id="reportStatus" required>
                        <option value="all">All</option>
                        @foreach($status as $key => $stat)
                            <option value="{{ $stat->StatusName }}">{{ $stat->StatusName }}</option>
                        @endforeach
                    </select>
                    <label for="">Priority Level</label>
                    <select name="reportPriority" id="reportPriority" required>
                        <option  value="all">All</option>
                        @foreach($priority as $key => $prio)
                            <option value="{{ $prio->id }}">{{ $prio->PriorityDescription }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="right">
                    <label for="">CHART/GRAPH TYPE</label>
                    <select name="reportChartType" id="reportChartType" required>
                        @foreach($charts as $key => $chart)
                            <option value="{{ $chart->ChartType }}">{{ $chart->ChartName }}</option>
                        @endforeach
                    </select>
                    <label for="">DATE FROM</label>
                    <input type="date" name="reportDateFrom" id="reportDateFrom" class="form-control">
                    <label for="">DATE TO</label>
                    <input type="date" name="reportDateTo" id="reportDateTo" class="form-control">
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="left">
                    <button class="btn-accept" type="button" id="btn-report">GENERATE</button>
                </div>
                <div class="right">
                    <button class="btn-accept" type="button" id="btn-export">EXPORT</button>
                </div>
            </div>
            <br>
            
            <div id="chartContainer">
                <canvas id="main-chart" width="400px"></canvas>
                <div id="report-json"></div>
            </div>
        </div>
    </form>
@endsection
