document.addEventListener("DOMContentLoaded", function () {
    fetch("http://127.0.0.1:8000/chart_data")
        .then((response) => response.json())
        .then((data) => {
            const historyData = data.history_data;
            const modules = data.modules;

            console.log(historyData);

            const moduleNames = modules.map((module) => module.module_name);

            const moduleDataSend = new Array(moduleNames.length).fill(0);
            const moduleDataValue = new Array(moduleNames.length).fill(0);

            historyData.forEach((history) => {
                const index = modules.findIndex(
                    (module) => module.id === history.module_id
                );
                if (index !== -1) {
                    moduleDataSend[index] += history.data_sent;
                    moduleDataValue[index] += history.history_measurement_value;
                }
            });
            console.log(moduleDataSend);
            const barCanvas = document.getElementById("barCanvas");
            const barChart = new Chart(barCanvas, {
                type: "bar",
                data: {
                    labels: moduleNames,
                    datasets: [
                        {
                            label: "Data send IOT module",
                            data: moduleDataSend,
                            backgroundColor: `rgb(${Math.random() * 255}, ${
                                Math.random() * 255
                            }, ${Math.random() * 255})`,
                        },
                    ],
                },
                options: {
                    scales: {
                        xAxes: [
                            {
                                scaleLabel: {
                                    display: true,
                                    labelString: "Module name",
                                },
                            },
                        ],
                        yAxes: [
                            {
                                scaleLabel: {
                                    display: true,
                                    labelString: "Data send",
                                },
                            },
                        ],
                    },
                },
            });
        })
        .catch((error) => console.error("Error fetching data:", error));
});

document.addEventListener("DOMContentLoaded", function () {
    fetch("http://127.0.0.1:8000/chart_data")
        .then((response) => response.json())
        .then((data) => {
            const historyData = data.history_data;
            const modules = data.modules;

            console.log(historyData);

            const moduleNames = modules.map((module) => module.module_name);

            const moduleDataValue = new Array(moduleNames.length).fill(0);

            historyData.forEach((history) => {
                const index = modules.findIndex(
                    (module) => module.id === history.module_id
                );
                if (index !== -1) {
                    moduleDataValue[index] += history.history_measurement_value;
                }
            });
            console.log(moduleDataValue);
            const lineCanvas = document.getElementById("lineCanvas");
            const lineChart = new Chart(lineCanvas, {
                type: "line",
                data: {
                    labels: moduleNames,
                    datasets: [
                        {
                            label: "Data send IOT module",
                            data: moduleDataValue,
                            backgroundColor: `rgb(${Math.random() * 255}, ${
                                Math.random() * 255
                            }, ${Math.random() * 255})`,
                        },
                    ],
                },
                options: {
                    scales: {
                        xAxes: [
                            {
                                scaleLabel: {
                                    display: true,
                                    labelString: "Module name",
                                },
                            },
                        ],
                        yAxes: [
                            {
                                scaleLabel: {
                                    display: true,
                                    labelString: "Data send",
                                },
                            },
                        ],
                    },
                },
            });
        })
        .catch((error) => console.error("Error fetching data:", error));
});

document.addEventListener("DOMContentLoaded", function () {
    fetch("http://127.0.0.1:8000/chart_data")
        .then((response) => response.json())
        .then((data) => {
            const historyData = data.history_data;
            const modules = data.modules;
            const uniqueStates = [
                ...new Set(historyData.map((history) => history.history_state)),
            ];

            const modulesCountByState = new Array(uniqueStates.length).fill(0);

            historyData.forEach((history) => {
                const stateIndex = uniqueStates.indexOf(history.history_state);
                if (stateIndex !== -1) {
                    modulesCountByState[stateIndex]++;
                }
            });
            const pieCanvas = document.getElementById("pieCanvas");
            const pieChart = new Chart(pieCanvas, {
                type: "doughnut",
                data: {
                    labels: uniqueStates,
                    datasets: [
                        {
                            label: "State IOT module",
                            data: modulesCountByState,
                            backgroundColor: [
                                "rgb(255, 99, 132)",
                                "rgb(54, 162, 235)",
                                "rgb(255, 205, 86)",
                            ],
                        },
                    ],
                },
            });
        })
        .catch((error) => console.error("Error fetching data:", error));
});



document.addEventListener("DOMContentLoaded", function() {
  fetch('http://127.0.0.1:8000/chart_data')
    .then(response => response.json())
    .then(data => {
      const historyData = data.history_data;
      const modules = data.modules;

      const moduleNames = modules.map(module => module.module_name);

      const measurementValues = new Array(moduleNames.length).fill(0);
      const operatingTimes = new Array(moduleNames.length).fill(0);
      const dataSentCounts = new Array(moduleNames.length).fill(0);

      historyData.forEach(history => {
        const index = modules.findIndex(module => module.id === history.module_id);
        if (index !== -1) {
          measurementValues[index] += history.history_measurement_value;
          operatingTimes[index] += history.operating_time;
          dataSentCounts[index] += history.data_sent;
        }
      });

      const radarCanvas = document.getElementById('radarCanvas');
      const radarChart = new Chart(radarCanvas, {
        type: 'radar',
        data: {
          labels: moduleNames,
          datasets: [{
            label: 'Measurement Value',
            data: measurementValues,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
          }, {
            label: 'Operating Time',
            data: operatingTimes,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }, {
            label: 'Data Sent',
            data: dataSentCounts,
            backgroundColor: 'rgba(255, 205, 86, 0.2)',
            borderColor: 'rgba(255, 205, 86, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scale: {
            ticks: { beginAtZero: true }
          }
        }
      });
    })
    .catch(error => console.error('Error fetching data:', error));
});