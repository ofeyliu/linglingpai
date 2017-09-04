
(function (bidDiv,datapath){
$.get(datapath).done(function (data) {
    data = JSON.parse(data)
    option = {
    title : {
        text: '年龄分布图',
        subtext: '数据来源：LC'
    },
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['年龄']
    },
    toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {show: true, type: ['line', 'bar']},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            data : data["keys"]//['1月','2月','3月']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'年龄',
            type:'bar',
            data:data["values"],
            markPoint : {
                data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                ]
            },
            markLine : {
                data : [
                    {type : 'average', name: '平均值'}
                ]
            }
        }
    ]
};
                    
                    
var myChart = echarts.init(document.getElementById(bidDiv) );
myChart.setOption(option);
});
})("P2_user_stat_province","http://diting.tech/ppd/php/userstat.php");


(function (bidDiv){
    option = {
    title : {
        text: '借款金额分布图',
        subtext: '数据来源：LC'
    },
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['数量']
    },
    toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {show: true, type: ['line', 'bar']},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            // data : data["keys"]//['1月','2月','3月']
            data : ["<1000","1k~2k","2k~3k","3k~5k","5k~10k","1w~5w","5w~10w",">10w"]
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'数量',
            type:'bar',
            // data:data["values"],
            data: [31950,25698,58648,102167,88619,10766,226,479],
            markPoint : {
                data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                ]
            },
            markLine : {
                data : [
                    {type : 'average', name: '平均值'}
                ]
            }
        }
    ]
};
                    
                    
var myChart = echarts.init(document.getElementById(bidDiv) );
myChart.setOption(option);
})("money_amount");


