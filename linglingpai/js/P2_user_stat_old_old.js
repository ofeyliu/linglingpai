
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


