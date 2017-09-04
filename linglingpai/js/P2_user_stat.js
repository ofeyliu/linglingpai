
(function (bidDiv){
// $.get(datapath).done(function (data) {
//     data = JSON.parse(data)
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
            // data : data["keys"]//['1月','2月','3月']
            data : ['17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56']
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
            // data:data["values"],
            data: [2,726,4067,7553,11640,18457,22163,22613,22761,24929,24396,21671,19843,17271,14361,12893,11385,10910,8950,7056,6334,5366,4495,4135,3754,3384,3042,2800,2508,2291,1740,1420,976,811,536,469,424,256,109,56],
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

})("user_age");


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


(function (bidDiv){
    option = {
        title : {
        text: '借款数量金额随时间变化图'
    },
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'cross',
            crossStyle: {
                color: '#666'
            }
        }
    },
    toolbox: {
        feature: {
            dataView: {show: true, readOnly: false},
            magicType: {show: true, type: ['line', 'bar']},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    legend: {
        data:['蒸发量','降水量','平均温度']
    },
    xAxis: [
        {
            type: 'category',
            data: ['15-1~15-3月','15-3~15-5月','15-5~15-7月','15-7~15-9月','15-9~15-11月','15-11~16-1月','16-1~16-3月','16-3~16-5月','16-5~16-7月','16-7~16-9月','16-9~16-11月','16-11~17-1月'],
            axisPointer: {
                type: 'shadow'
            }
        }
    ],
    yAxis: [
        {
            type: 'value',
            name: '金额/百万元',
            // min: 0,
            // max: 250,
            // interval: 50,
            axisLabel: {
                formatter: '{value} M'
            }
        },
        {
            type: 'value',
            name: '标数',
            // min: 0,
            // max: 25,
            // interval: 5,
            axisLabel: {
                formatter: '{value}'
            }
        }
    ],
    series: [
        // {
        //     name:'蒸发量',
        //     type:'bar',
        //     data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
        // },
        {
            name:'金额/百万元',
            type:'bar',
            data:[8.47, 16.7, 18.5, 38.6, 58.0, 82.7, 91.7, 135.4, 140.6, 183.7, 238.1, 440.9]
        },
        {
            name:'数量',
            type:'line',
            yAxisIndex: 1,
            data:[952, 1782, 1988, 4367, 8171, 12861, 17764, 30328, 32921, 44249, 55918, 117252]
        }
    ]
};
                    
                    
var myChart = echarts.init(document.getElementById(bidDiv) );
myChart.setOption(option);
})("year_amount");