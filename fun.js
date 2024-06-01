document.addEventListener("DOMContentLoaded", function() {
  const facts = [
    "Only about 10% of the worlds currency is physical money, the rest only exists on computers.",

    "Linux leads the industry as it is used by Google, Facebook, Twitter, and Amazon.",

    "The worst computer breach that ever happened was experienced by the U.S. military. Here, foreign intelligence hackers used a random memory stick found on a parking lot by an employee to execute their operations.",

    " Microsoft, H.P., and Apple started building their computers from a garage before they were able to advance.",

    " About 5000 new computer viruses are created every month.",


    " It is hard to find a new and straightforward domain because   millions of domain names are registered daily by different people.",

    "Fugaku supercomputer is the worlds fastest computer",

    "The first mouse was made from wood!",

    "NASA computers were hijacked by a 15-year-old, resulting in a 21-day halt."

  ];

  const factText = document.getElementById("factText");
  const factButton = document.getElementById("factButton");

  factButton.addEventListener("click", function() {
    const randomFact = facts[Math.floor(Math.random() * facts.length)];
    factText.textContent = randomFact;
  });
});
