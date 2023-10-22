/* globals Chart:false, feather:false */


const RodCompleted = parseInt(document.getElementById("RodCompleted").value);
const RodUncompleted = parseInt(document.getElementById("RodUncompleted").value);
const KhalfCompleted = parseInt(document.getElementById("KhalfCompleted").value);
const KhalfUncompleted = parseInt(document.getElementById("KhalfUncompleted").value);
const total = RodUncompleted + RodUncompleted + KhalfUncompleted + KhalfCompleted;
const uncompleted = KhalfUncompleted + RodUncompleted;
const completed = RodCompleted + KhalfCompleted;



let counts2 = setInterval(updated2, 75);
let upto2 = 0;

function updated2() {
    var count = document.getElementById("counter2");
    count.innerHTML = ++upto2;
    if (upto2 === completed) {
        clearInterval(counts2);
    }
}

let counts3 = setInterval(updated3, 75);
let upto3 = 0;

function updated3() {
    var count = document.getElementById("counter3");
    count.innerHTML = ++upto3;
    if (upto3 === uncompleted) {
        clearInterval(counts3);
    }
}

(() => {
    'use strict'
    feather.replace({'aria-hidden': 'true'})

    // Graphs
    const ctx = document.getElementById('myChart')
    // eslint-disable-next-line no-unused-vars
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                'السبت',
                'الأحد',
                'الإثنين',
                'الثلاثاء',
                'الأربعاء',
                'الخميس',
                'الجمعة'
            ],
            datasets: [{
                data: [
                    15339,
                    21345,
                    18483,
                    24003,
                    23489,
                    24092,
                    12034
                ],
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                borderWidth: 4,
                pointBackgroundColor: '#007bff'
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    })
})()

// Rod Request Status
const data = {
    labels: [
        'Unsolved',
        'Solved',
    ],
    datasets: [{
        label: 'My First Dataset',
        data: [RodUncompleted, RodCompleted],
        backgroundColor: [
            'rgb(244 ,67, 54)',
            'rgb(54, 162, 235)',
        ],
        hoverOffset: 4
    }]
};
new Chart("rodRequestStatus", {
    type: 'doughnut',
    data: data,
    options: {
        title: {
            display: true,
            text: "الطلبات في فرع روض الفرج"
        }
    }
});

// Khalafawi Request Status
const dataKh = {
    labels: [
        'Unsolved',
        'Solved',
    ],
    datasets: [{
        label: 'My First Dataset',
        data: [KhalfUncompleted, KhalfCompleted],
        backgroundColor: [
            'rgb(244 ,67, 54)',
            'rgb(54, 162, 235)',
        ],
        hoverOffset: 4
    }]
};
new Chart("khalRequestStatus", {
    type: "pie",
    data: dataKh,
    options: {
        title: {
            display: true,
            text: "الطلبات في فرع الخلفاوي"
        }
    }
});


const labels = ["الاحد", "الاتنين", "الثلاثاء", "الاربع", "الخميس", "الجمعه", "السبت"];

const dataWeekly = {
    labels: labels,
    datasets: [
        {
            label: "Solved",
            backgroundColor: "rgb(54, 162, 235)",
            data: weekDaysSolved
        },
        {
            label: "Unsolved",
            backgroundColor: "rgb(244 ,67, 54)",
            data: weekDaysUnSolved
        },

    ]
};
new Chart("weekly", {
    type: 'bar',
    data: dataWeekly,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});





