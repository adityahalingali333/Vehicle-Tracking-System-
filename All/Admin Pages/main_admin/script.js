fetch("https://api.example.com/routes")
  .then((response) => response.json())
  .then((data) => {
    // Prepare data for the graph
    const stops = data.reduce((acc, { StopName }) => {
      if (!acc[StopName]) {
        acc[StopName] = 0;
      }
      acc[StopName]++;
      return acc;
    }, {});

    const labels = Object.keys(stops);
    const dataValues = Object.values(stops);

    const ctx = document.getElementById("graph-container").getContext("2d");
    const chart = new Chart(ctx, {
      type: "pie",
      data: {
        labels,
        datasets: [
          {
            label: "Routes count per stop",
            data: dataValues,
            backgroundColor: [
              "rgba(255, 99, 132, 0.2)",
              "rgba(54, 162, 235, 0.2)",
              "rgba(255, 206, 86, 0.2)",
              "rgba(75, 192, 192, 0.2)",
              "rgba(153, 102, 255, 0.2)",
              "rgba(255, 159, 64, 0.2)",
            ],
            borderColor: [
              "rgba(255, 99, 132, 1)",
              "rgba(54, 162, 235, 1)",
              "rgba(255, 206, 86, 1)",
              "rgba(75, 192, 192, 1)",
              "rgba(153, 102, 255, 1)",
              "rgba(255, 159, 64, 1)",
            ],
            borderWidth: 1,
          },
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: "top",
          },
        },
      },
    });
  })
  .catch((error) => console.error("Error fetching data:", error));
