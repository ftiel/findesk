
if (location.pathname == '/reports') {
   
    $(document).ready( function() {
        loadChart()
    })
    
    $('#btn-report').click(loadChart)
    function loadChart(e) {
        // e.preventDefault()
        let dateFromX = $('#reportDateFrom').val()
        let dateToX = $('#reportDateTo').val()
        let CategoryX = $('#reportCategory').val()
        let PriorityX = $('#reportPriority').val()
        let StatusX = $('#reportStatus').val()
    
        axios.get('/generate_report', {
            params: {
                Category: CategoryX, 
                Status: StatusX,
                Priority: PriorityX,
                DateFrom: dateFromX,
                DateTo: dateToX
            }
        }).then(res => {
            data = res.data
            chartSetup(res.data)
        })
    }
    
    // let repChart = null

    function chartSetup(data) {
        $('#main-chart').remove()
        $('#chartContainer').append('<canvas id="main-chart"></canvas>')

        let source = $('#main-chart')[0]
        let ctx = source.getContext('2d')

        ctx.clearRect(0, 0, source.width, source.height)
        let xValues = new Array()
        let yValues = new Array()
        let fillColor = new Array()
        let bgColor = new Array()
        let ChartTypeX = $('#reportChartType').val()

        $.each(data, function(index, val) {
            xValues.push(val.CategoryDescription)
            yValues.push(val.Qty)
            let tempFill = getRandomColor().replace(')', ', 0.75').replace('rgb', 'rgba')
            let tempBG = tempFill.replace('0.75)', ')').replace('rgba', 'rgb')
            fillColor.push(tempFill)
            bgColor.push(tempBG)
        })

        repChart = new Chart(source, {
            type: ChartTypeX,
            data: {
                labels: xValues,
                datasets: [{	
                    label: 'Number of Tickets per Category',
                    data: yValues,
                    backgroundColor: fillColor,
                    borderColor: bgColor,
                    borderWidth: 2,
                    minBarThickness:20,
                    maxBarThickness: 60,
                }]
            },
            options: {
                devicePixelRatio: 2,
                title: {
                    display: true,
                    text: 'Ticket Summary'
                },
                animation: {
                    duration: 2000
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: 'rgb(255, 99, 132)'
                    }
                }
            }
        })
    }

    let getRandomColor = function() {
        var r = Math.floor(Math.random() * 255)
        var g = Math.floor(Math.random() * 255)
        var b = Math.floor(Math.random() * 255)
        return "rgb(" + r + "," + g + "," + b + ")"
    }

    // Export Report
    $('#btn-export').click(exportData)

    function exportData(e) {
        // e.preventDefault()
        let dateFromX = $('#reportDateFrom').val()
        let dateToX = $('#reportDateTo').val()
        let CategoryX = $('#reportCategory').val()
        let PriorityX = $('#reportPriority').val()
        let StatusX = $('#reportStatus').val()
    
        axios.get('/export_report', {
            params: {
                Category: CategoryX, 
                Status: StatusX,
                Priority: PriorityX,
                DateFrom: dateFromX,
                DateTo: dateToX
            }
        }).then(res => {
            data = res.data
            console.log(data)
            makeExcel(data)
        })
    }

    function makeExcel(data) {
        const worksheet = XLSX.utils.json_to_sheet(data)
        const workbook = {
            Sheets: {
                'data': worksheet
            },
            SheetNames:['data']
        }
        const excelBuffer = XLSX.write(workbook, {bookType:'xlsx', type:'array'})
        console.log(excelBuffer)
        saveAsExcel(excelBuffer, 'helpdesk-export-')
    }

    function saveAsExcel(buffer, filename) {
        const EXCEL_TYPE = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8'
        const EXCEL_EXTENSION = '.xlsx'
        const data = new Blob([buffer], {type: EXCEL_TYPE})
        var d = new Date()
        // var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate() + "-" + d.toLocaleString('en-GB')
        saveAs(data, filename + d.toLocaleString('en-GB') + EXCEL_EXTENSION)
    }
}
